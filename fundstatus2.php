
<!-- then encode $my_var to my_var -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
..hh-grayBox {
	background-color: #F8F8F8;
	margin-bottom: 20px;
	padding: 35px;
  margin-top: 20px;
}
.pt45{padding-top:45px;}
.order-tracking{
	text-align: center;
	width: 33.33%;
	position: relative;
	display: block;
}
.order-tracking .is-complete{
	display: block;
	position: relative;
	border-radius: 50%;
	height: 30px;
	width: 30px;
	border: 0px solid #AFAFAF;
	background-color: #f7be16;
	margin: 0 auto;
	transition: background 0.25s linear;
	-webkit-transition: background 0.25s linear;
	z-index: 2;
}
.order-tracking .is-complete:after {
	display: block;
	position: absolute;
	content: '';
	height: 14px;
	width: 7px;
	top: -2px;
	bottom: 0;
	left: 5px;
	margin: auto 0;
	border: 0px solid #AFAFAF;
	border-width: 0px 2px 2px 0;
	transform: rotate(45deg);
	opacity: 0;
}
.order-tracking.completed .is-complete{
	border-color: #27aa80;
	border-width: 0px;
	background-color: #27aa80;
}
.order-tracking.completed .is-complete:after {
	border-color: #fff;
	border-width: 0px 3px 3px 0;
	width: 7px;
	left: 11px;
	opacity: 1;
}
.order-tracking p {
	color: #A4A466;
	font-size: 16px;
	margin-top: 8px;
	margin-bottom: 0;
	line-height: 20px;
}
.order-tracking p span{font-size: 14px;}
.order-tracking.completed p{color: #000;}
.order-tracking::before {
	content: '';
	display: block;
	height: 3px;
	width: calc(100% - 40px);
	background-color: #f7be16;
	top: 13px;
	position: absolute;
	left: calc(-50% + 20px);
	z-index: 0;
}
.order-tracking:first-child:before{display: none;}
.order-tracking.completed:before{background-color: #27aa80;}

</style>
</head>
<body>
	<br><br><br><br>
	<div class="container">
    <div class="row">
    	<div class="col-12 col-md-10 hh-grayBox pt45 pb20">
				<form action="" method="POST">
    		<center><input type="text" name="jobcard" placeholder="Enter Job Card Number">
    		</input>
    		<input type="submit" name="submit">
    	</form></center><br><br><br><br>
				<div class="row justify-content-between">
				<div class="order-tracking completed">
				<span id="one" class="is-complete"></span>
				<p>Entreprenuer<br></p>
				</div>
				<div class="order-tracking completed">
				<span id="two" class="is-complete"></span>
				<p>Agency<br></p>
				</div>
    			<div class="order-tracking">
				<span id="three" class="is-complete"></span>
				<p>Employee<br></p>
				</div>
				</div>
     			</div>
     		</div>
</div>
</body>
</html>

<?php
// connect mysql
$con=mysqli_connect("localhost","root","","sihv1");
// then retireve value
$jobcard = $_POST['jobcard'];
$sql = "select Jobcard,pay_status from razorpay where jobcard='$jobcard'";

// then save it to a $my_var
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$paystatus = $row["pay_status"];
?>
<script type="text/javascript">
    var my_var = <?php echo json_encode($paystatus); ?>;
    (function () { 
    if (my_var == 'Success') {
      document.getElementById("one").style.backgroundColor = '#27aa80';
    }  
    else 
    {
      document.getElementById("one").style.backgroundColor = '#FF6C60';
    }
  })(); 
    
</script>