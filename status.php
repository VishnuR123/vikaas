<?php

// include the Razorpay PHP library
require_once 'vendor/autoload.php';

// set your razorpay API keys
$apiKey = "YOUR_API_KEY";
$apiSecret = "YOUR_API_SECRET";

// create a new Razorpay client
$client = new Razorpay\Client($apiKey, $apiSecret);

// get the payment details from the form submission
$razorpay_order_id = $_POST['razorpay_order_id'];
$razorpay_payment_id = $_POST['razorpay_payment_id'];
$amount = $_POST['amount'];
$currency = $_POST['currency'];

// fetch the payment details from razorpay
$payment = $client->payment->fetch($razorpay_payment_id);

// check the payment status
if ($payment->status == 'successful') {
  // payment was successful, so insert the transaction into the database
  $status = 'success';
} else {
  // payment failed, so update the status
  $status = 'failure';
}

// connect to the MySQL database
$host = "localhost";
$user = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// create the connection
$conn = new mysqli($host, $user, $password, $dbname);

// check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// insert the transaction into the database
$sql = "INSERT INTO razorpay_transactions (razorpay_order_id, razorpay_payment_id, amount, currency, status, created_at) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->
