<?php

session_start();
$username= "";
$email= "";
$errors=array();
//connect to the database
$db = mysqli_connect('localhost','root','','registration');

//if the register button is clicked
if (isset($_POST['register'])){
$username = addslashes($_POST['username']);
$address = addslashes($_POST['address']);
$mobile = addslashes($_POST['mobile']);
$birthdate = addslashes($_POST['birthdate']);
$email= addslashes($_POST['email']);
$password_1= addslashes($_POST['password_1']);
$password_2= addslashes($_POST['password_2']);


//ensure that form field are filled properly
if (empty($username)) {
	array_push($errors, "username is required");
}
if (empty($email)) {
	array_push($errors, "email is required");
}

if (empty($password_1)) {
	array_push($errors, "password is required");
}
if ($password_1 != $password_2) {
	array_push($errors,"The two passwords do not match");
}
//if there are no errors, save user to database
if (count($errors)==0) {
	$password = md5($password_1);

	$sql = "INSERT INTO users (username,address,mobile,birthdate,email,password) VALUES('$username','$address','$mobile','$birthdate','$email','$password')";

	mysqli_query($db,$sql);
	$_SESSION['username']= $username;
	$_SESSION['success']= 'You are now logged in';
    header('location: login.php'); //redirect to home page
}
}

//log user in form login page
if(isset($_POST['login'])){

	$username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

  if (empty($username)){
  	 array_push($errors,"username is required");
  }  
  if(empty($password)){
  	array_push($errors,"password is required");
  }
  if(count($errors)==0){
  	$password= md5($password);//encrypt password before comparing with that from database
  	$query="SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$result=mysqli_query($db,$query);
  	if(mysqli_num_rows($result)==1){

  		//log user in
  		$_SESSION['username']=$username;
  		$_SESSION['success']="You are now logged in";
  		header('location: index.php');
  	}else{
  		array_push($errors,"wrong username/password combination");
  	}
  }
}

//logout
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}




?>