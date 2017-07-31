<?php
include("includes/db.php");
//require_once 'login.php';
 //$connection = new mysqli($hn, $un, $pw, $db);
 //if ($connection->connect_error) die($connection->connect_error);
 
 
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
/*	if($_SESSION['logged_in']){
    echo $_SESSION['username'];
}else{
    echo 'Please login';
}*/
//session_start();
//echo "hello";
  if (isset($_POST['submit']))
  {
    $un_temp = $_POST['username'];
    $pw_temp = $_POST['password'];

    //$query  = "SELECT * FROM registeredusers WHERE username='$un_temp'";
    $result = mysql_query("SELECT * FROM registeredusers WHERE username='$un_temp'");
	
    //if (!$result) die($connection->error);
    
    if (mysql_num_rows($result))
    {
        $row = mysql_fetch_assoc($result);
        $salt1 = "qm&h*";
        $token = hash('ripemd128', "$salt1$un_temp$pw_temp");
       // echo "<h5 align = 'left'>The University of Texas<br/> at El Paso</h5>";
//echo "<h3><div align = 'center'>UTEP ALUMNI</div></h3>";
        if ($token == $row['password']) 
        {
            
            $_SESSION['username'] = $un_temp;
            $_SESSION['password'] = $pw_temp;
           $_SESSION['firstname'] = $row['firstname'];
           $_SESSION['lastname'] = $row['lastname'];
            $username = $_SESSION['username'];
  $password = $_SESSION['password'];
    $firstname = $_SESSION['firstname'];
    $lastname  = $_SESSION['lastname'];
//echo"<script>window.open('index.php','_self')</script>";
echo '<!DOCTYPE html>
<html>
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
	
      <li></li>
      <li></li>
    </ul>
  </div>
</nav>';
    echo "Hi $firstname.<br>
          Your full name is $firstname $lastname.<br>
          Your username is '$username'";
    echo "<br/><a href = 'products.php'>Click to see Products</a>";
      echo '<form method="post">
    <input type="submit" value="Logout" name="Logout" >
      </form>
          ';
		  echo '<footer>
<div id="templatemo_footer" style="clear: both;
	width: 1200px;
	padding: 20px 0px 20px 0;
	text-align: center;
	border-top: 1px solid #25211e;
	margin-top:100px;
	color: #999;
	background-color: #111110;">
    
	       <a style="color: #fff;font-weight: normal;" href="index.php">Home</a> | <a style="color: #fff;font-weight: normal;" href="subpage.html">Search</a> | <a style="color: #fff;font-weight: normal;" href="products.php">Products</a> | <a style="color: #fff;font-weight: normal;" href="#">New Products</a> | <a style="color: #fff;font-weight: normal;" href="#">FAQs</a> | <a style="color: #fff;font-weight: normal;" href="#">Contact Us</a><br />
        Copyright &#169; 2017 <a style="color: #fff;font-weight: normal;" href="#"><strong>Shopping Website</strong></a> </div> 
    <!-- end of footer -->
	</footer>';
           
        }
        
    
      else 
      {
          
          echo "<script>alert('invalid username or password')</script>";
          session_destroy();
          echo"<script>window.open('login.php','_self')</script>";
      }
      
      }
    
    else
    {
    echo "<script>alert('please enter your username and password')</script>";
    session_destroy();
    echo"<script>window.open('login.php','_self')</script>";
    }
  }
 
    if (isset($_POST['Logout'])) {
    session_destroy();
    echo"<script>window.open('login.php','_self')</script>";
}


  ?>




