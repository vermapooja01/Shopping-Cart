<?php
	include("includes/db.php");
	include("includes/functions.php");
	error_reporting(E_ALL ^ E_NOTICE);
	if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg = 'Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
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
<title>Shopping Cart</title>
<script language="javascript">
	function del(pid){
		
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		
		document.form1.command.value='update';
		document.form1.submit();
	}


</script>
</head>

<body>
<form name="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" />
	<div style="margin:0px auto; width:600px;" >
    <div style="padding-bottom:10px">
    	<h1 align="center" style="background-color:#f08080;">Your Shopping Cart</h1>
    <input type="button" class="btn btn-success" value="Continue Shopping" onclick="window.location='products.php'" />
    </div>
    	<div style="color:#F00"><?php echo $msg?></div>
    	<table class="table table-responsive" border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
    	<?php
			if(is_array($_SESSION['cart'])){
            	echo '<tr bgcolor="#FFFFFF" style="font-weight:bold"><td>Serial</td><td>Name</td><td>Price</td><td>Qty</td><td>Amount</td><td>Options</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$pname=get_product_name($pid);
					if($q==0) continue;
			?>
            		<tr bgcolor="#FFFFFF"><td><?php echo $i+1?></td><td><?php echo $pname?></td>
                    <td>$ <?php echo get_price($pid)?></td>
                    <td><input type="text" name="product<?php echo $pid?>" value="<?php echo $q?>" maxlength="3" size="2" /></td>                    
                    <td>$ <?php echo get_price($pid)*$q?></td>
                    <td><a href="javascript:del(<?php echo $pid?>)" class="text-success">Remove</a></td></tr>
            <?php					
				}
			?>
				<tr><td><b>Order Total: $<?php echo get_order_total()?></b></td><td colspan="5" align="right"><input type="button" class="btn btn-success" value="Empty Cart" onclick="clear_cart()"><input type="button" class="btn btn-success" value="Update Cart" onclick="update_cart()"><input type="button" class="btn btn-success" value="Place Order" onclick="window.location='billing.php'"></td></tr>
			<?php
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
			}
		?>
        </table>
    </div>
</form>
</body>
</html>