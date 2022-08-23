<?php
session_start();
include('db.php');
include('function.php');
$msg="Please enter valid login details";
if(isset($_POST['save'])){
	$email_name=$_POST['email_name'];
	$password=$_POST['password'];

$sql="SELECT * FROM user WHERE email_name='$email_name' and password='$password' ";
$result=mysqli_query($con,$sql);
$row = mysqli_num_rows($result);  
if($row>0)
{
  $row=mysqli_fetch_assoc($result);
		$_SESSION['IS_LOGIN']='yes';
    $_SESSION['ADMIN_USER']=$row['name'];
		redirect('index.php');
	}else{
		echo $msg;
	}


}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login | By Code Info</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="login-box">
      <h1>Login</h1>
      <form method="post">
        <label>Email</label>
        <input type="email" name="email_name" placeholder="" />
        <label>Password</label>
        <input type="password" name="password" placeholder="" />
        <input type="submit" name="save" value="submit">
      </form>
    </div>
    <p class="para-2">
      Not have an account? <a href="registration.php">Sign Up Here</a>
    </p>
  </body>
</html>