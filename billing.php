<?php
	include("includes/db.php");
	include("includes/functions.php");
	error_reporting(E_ALL ^ E_NOTICE);
	if($_REQUEST['command']=='update'){
		$name=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$address=$_REQUEST['address'];
		$phone=$_REQUEST['phone'];
		
		$result=mysql_query("insert into customers values('','$name','$email','$address','$phone')");
		$customerid=mysql_insert_id();
		$date=date('Y-m-d');
		$result=mysql_query("insert into orders values('','$date','$customerid')");
		$orderid=mysql_insert_id();
		
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			mysql_query("insert into order_detail values ($orderid,$pid,$q,$price)");
		}
		die('Thank You! your order has been placed!');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {margin:0;}

.topnav {
  overflow: hidden;
  background-color: #f08080;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

}
</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Shopping Website</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="products.php">Products <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="products.php">Products 1-1</a></li>
          <li><a href="products.php">Products 1-2</a></li>
          <li><a href="products.php">Products 1-3</a></li>
        </ul>
      </li>
      <li><a href="shoppingcart.php">Cart</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing Info</title>
<script language="javascript">
	function validate(){
		var f=document.form1;
		if(f.name.value==''){
			alert('Your name is required');
			f.name.focus();
			return false;
		}
		f.command.value='update';
		f.submit();
	}
</script>
</head>


<body>
<form name="form1" onsubmit="return validate()">
    <input type="hidden" name="command" />
	<div align="center">
        <h1 align="center">Your Billing Information</h1>
        <table class="table table-responsive" border="0" cellpadding="2px">
        	<tr><td><strong>Order Total:</strong></td><td><strong><?php echo "$", get_order_total()?></strong></td></tr>
			<tr><td><h4 class="text-danger">Fill in your shipping details:</h4></td><td></td></tr>
			<tr><td><strong>Name:</strong></td><td><input type="text" name="name" /></td></tr>
            <tr><td><strong>Address:</strong></td><td><input type="text" name="address" /></td></tr>
            <tr><td><strong>Email:</strong></td><td><input type="text" name="email" /></td></tr>
            <tr><td><strong>Phone:</strong></td><td><input type="text" name="phone" /></td></tr>
            <tr><td>&nbsp;</td><td><input type="submit" class="btn btn-success" value="Place Order" /></td></tr>
        </table>
	</div>
</form>

<div id="templatemo_footer" style="clear: both;
	width: 1200px;
	padding: 20px 0px 20px 0;
	text-align: center;
	border-top: 1px solid #25211e;
	color: #999;
	background-color: #111110;">
    
	       <a style="color: #fff;font-weight: normal;" href="index.php">Home</a> | <a style="color: #fff;font-weight: normal;" href="subpage.html">Search</a> | <a style="color: #fff;font-weight: normal;" href="products.php">Products</a> | <a style="color: #fff;font-weight: normal;" href="#">New Products</a> | <a style="color: #fff;font-weight: normal;" href="#">FAQs</a> | <a style="color: #fff;font-weight: normal;" href="#">Contact Us</a><br />
        Copyright &#169; 2017 <a style="color: #fff;font-weight: normal;" href="#"><strong>Shopping Website</strong></a> </div> 
    <!-- end of footer -->
</body>
</html>
