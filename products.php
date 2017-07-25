<?php
	include("includes/db.php");
	include("includes/functions.php");
	error_reporting(E_ALL ^ E_NOTICE);
	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		addtocart($pid,1);
		header("location:shoppingcart.php");
		exit();
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
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
<script language="javascript">
	function addtocart(pid){
		document.form1.productid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}
</script>
</head>



<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>
<div align="center" "col-xs-6 col-md-4">
	<h1 align="center" >Products</h1>
	<div class="col-md-12">
	<table class="table table-responsive" border="0" cellpadding="2px" width="600px">
		<?php
			$result=mysql_query("select * from products") or die("select * from products"."<br/><br/>".mysql_error());
			while($row=mysql_fetch_array($result)){
		?>
    	<tr scope="row">
        	<td><img src="<?php echo $row['picture']?>" /></td>
            <td>   	<b><?php echo $row['name']?></b><br />
            		<?php echo $row['description']?><br />
                    Price:<big style="color:green">
                    	$<?php echo $row['price']?></big><br /><br />
                    <input type="button" value="Add to Cart" onclick="addtocart(<?php echo $row['serial']?>)" />
			</td>
		</tr>
        <tr><td colspan="2"></td>
        <?php } ?>
    </table>
	</div>
</div>

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
