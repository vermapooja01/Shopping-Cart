<?php
	include("includes/db.php");

  
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];
  $dob = $_POST['dob'];
  $phone = $_POST['phone'];
  $email1 = $_POST['email1'];
  $email2 = $_POST['email2'];
  $username = $_POST['username'];
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];
  
  
  if($firstname == '')
  {
     echo "<script>alert('Please enter your firstname')</script>";
     require 'signup.php';
     exit();
  }
  if($lastname == '')
  {
      echo "<script>alert('Please enter your lastname')</script>";
      require 'signup.php';
      exit();
      
  }
  
  if($username == '')
  {
      echo "<script>alert('Please enter your username')</script>";
      require 'signup.php';
      exit();
  }
  if($email1 == '')
  {
      echo "<script>alert('Please enter your email')</script>";
      require 'signup.php';
      exit();
  }
  if($email2 == '')
  {
      echo "<script>alert('Please enter your email')</script>";
      require 'signup.php';
      exit();
  }
  if($password1 == '')
  {
      echo "<script>alert('Please enter your password')</script>";
      require 'signup.php';
      exit();
  }
  if($password2 == '')
  {
      echo "<script>alert('Please enter your password')</script>";
      require 'signup.php';
      exit();
  }
  if($email1 == $email2 && $password1 == $password2)
 {
      
   //$firstname = mysql_escape_string($_POST['firstname']);
   //$lastname = mysql_escape_string($_POST['lastname']);
   //$username = mysql_escape_string($_POST['username']);
   //$email1 = mysql_escape_string($_POST['email1']);
   //$email2 = mysql_escape_string($_POST['email2']);
   //$password1 = mysql_escape_string($_POST['password1']);
   //$password2 = mysql_escape_string($_POST['password2']);
   
   $salt1 = "qm&h*";
   $password1 = hash('ripemd128', "$salt1$username$password1");
  // $result=mysql_query("insert into customers values('','$name','$email','$address','$phone')");
   //$query = "SELECT * FROM registeredusers WHERE username = '$username'";
   $result = mysql_query("SELECT * FROM registeredusers WHERE username = '$username'");
   //if(!$result) die($connection->error);
   if (mysql_num_rows($result)>= 1)
   {
       //echo "<h5 align = 'left'>The University of Texas<br/>at El Paso</h5>";
      // echo "<h2 align = 'center'>THE CS ALUMNI ASSOCIATION</h2>";
       echo "<script>alert('username already exists. Please try again with a different username.')</script>";
       require 'signup.php'; 
   }
   else
   {
     //$query = "INSERT INTO registeredusers VALUES('$firstname', '$lastname', '$username', '$password1', '$email1')";
     $result = mysql_query("INSERT INTO registeredusers VALUES('$firstname', '$lastname', '$address', '$dob', '$phone', '$email1', '$username', '$password1')");
    // echo "<h5 align = 'left'>The University of Texas<br/>at El Paso</h5>";
    // echo "<h2 align = 'center'>THE CS ALUMNI ASSOCIATION</h2>";
     echo "Registration Successful. Thank You for registering!!!<br/>";
     echo "<a href = 'index.php'>Homepage</a>";
   }
 }
  
 else
     {
     
     echo "<script>alert('Sorry, Your username or passwords do not match')</script>";
     require 'signup.php';
     }
 ?>