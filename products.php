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

<div class="topnav" id="myTopnav">
  <strong><a href="index.php">Home</a></strong>
  <strong><a href="products.php">Products</a></strong>
  <strong><a href="shoppingcart.php">Cart</a></strong>
  <strong><a href="#news">News</a></strong>
  <strong><a href="#contact">Contact</a></strong>
  <strong><a href="#about">About</a></strong>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div style="padding-left:16px">
  
</div>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>



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
<div align="center">
	<h1 align="center" style="background-color:#f08080;">Products</h1>
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
</body>
</html>
