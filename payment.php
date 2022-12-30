<?php
	// include('db.php');
$con=mysqli_connect("localhost","root","","sihv1");

if(isset($_POST['jobcard'])&&($_POST['pay_id'])&&($_POST['amount'])&&($_POST['name'])){
	$name=$_POST['name'];
	$jobcard=$_POST['jobcard'];
	$amount=$_POST['amount'];
	$pay_id=$_POST['pay_id'];

	$query="Insert into razorpay values('$name','$jobcard','$amount','$pay_id','Success')";
	mysqli_query($con,$query);
}
