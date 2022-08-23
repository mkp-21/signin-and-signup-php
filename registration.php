<?php
include('db.php');
if(isset($_POST['save']))
{
  $first_name = $_POST['first_name'];
	 $last_name = $_POST['last_name'];
	 $email_name = $_POST['email_name'];
	 $password = $_POST['password'];
   $conpassword = $_POST['conpassword'];

   if($first_name==''){
    echo "<script>alert('Please enter Name')
    </script>";
   exit();
   }
   if($last_name==''){
    echo "<script>alert('Please enter your last name')
    </script>";
   exit();
   }
   if($email_name==''){
    echo "<script>alert('Please enter your email id')
    </script>";
   exit();
   }
   if($password==''){
    echo "<script>alert('Please enter password')
    </script>";
   exit();
   }
   if($conpassword==''){
    echo "<script>alert('Please enter confirm password')
    </script>";
   exit();
   }
   $check_name="select * from user where email_name='$email_name'";
   $run=mysqli_query($con,$check_name);
   

   if(mysqli_num_rows($run)>0){
    echo "<script>alert('email_name $email_name already exits in our database. Please try with Another!')</script>";
   }
    
    elseif($password != $conpassword){
      echo "<script>alert('passwords doesn't match')</script>";
   }
   else{


	 $sql = "INSERT INTO user (first_name,last_name,email_name,password,conpassword)
	 VALUES ('$first_name','$last_name','$email_name','$password',$conpassword)";
	 if (mysqli_query($con, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($con);
	 } 
	 mysqli_close($con);
}
}

	 

?>
<!doctype html>

<html lang="en">
  <head>
    <title>Sign Up | By Code Info</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
  <div class="signup-box">
  <h1>Signup</h1>
  <form method="post">
  <label>First-Name</label>
  <input type="text" name="first_name" placeholder="Enter your First-Nmae">
  <label>Last-Name</label>
  <input type="text" name="last_name" placeholder="Enter your Last-Nmae">
  <label>Email</label>
  <input type="email" name="email_name" placeholder="Enter your email id">
  <label>Passowrd</label>
  <input type="password" name="password" placeholder="Enter your Password">
  <label>Confirm Password</label>
  <input type="password"  name="conpassword"placeholder="Enter your Confirm password">
  
  <input type="submit" name="save" value="submit">
  </form>
   <p>
        By clicking the Sign Up button,you agree to our <br />
        <a href="#">Terms and Condition</a> and <a href="#">Policy Privacy</a>
      </p>
  </div>
  <p class="para-2">
      Already have an account? <a href="login.php">Login here</a>
    </p>
  </body>
  </html>