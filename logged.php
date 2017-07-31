<!DOCTYPE html>
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
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h2></h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="images\newarrival.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>

      <div class="item">
        <img src="images\newarrival1.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>
    
      <div class="item">
        <img src="images\newarrival2.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<h2> </h2>

<!--<img src="images/main1.jpg" class="img-fluid" alt="responsive image" style="width:1100px;height:600px;"> -->
<footer>
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
	</footer>
</body>
</html>

