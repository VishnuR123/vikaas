
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form>
<input type="text" name="name" placeholder="Enter Name" id="name"> 
<br><br>
<input type="text" name="jobcard" placeholder="Enter Job Card" id="jobcard"> 
<br><br>
<input type="text" name="amount" placeholder="Enter Amount" id="amount"> 
<br><br>
<input type="button" name="button" value="Pay Now" onclick="MakePayment()"> 
</form>

<script>
  function MakePayment(){
  var name=$("#name").val();
  var jobcard=$("#jobcard").val();
  var amount=$("#amount").val();
  var options = {
	"key": "rzp_test_H2WA6YeHkZzjV9",
    "jobcard": jobcard,
	"name": name,
    "amount":amount*100,
	"description": "Test Transaction",
	"image": "https://example.com/your_logo",
	"handler": function(response){
		jQuery.ajax({
            type:"POST",
            url:"payment.php",
            data:"&pay_id="+response.razorpay_payment_id+"&jobcard="+jobcard+"&name="+name+"&amount="+amount, 
        });
    }
  };
    var rzp1 = new Razorpay(options);
    rzp1.open();
   } 
</script>
