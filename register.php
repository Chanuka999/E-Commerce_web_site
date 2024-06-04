<?php
 include 'connection.php';
 
 if(isset($_POST['submit-btn'])){
   $filter_name = filter_var($_POST['name'] , FILTER_SANITIZE_STRING);
   $name=mysqli_real_escape_string($conn, $filter_name);

   $filter_email = filter_var($_POST['email'] , FILTER_SANITIZE_STRING);
   $email=mysqli_real_escape_string($conn, $filter_email);

   $filter_password = filter_var($_POST['password'] , FILTER_SANITIZE_STRING);
   $password=mysqli_real_escape_string($conn, $filter_password);

   $filter_cpassword = filter_var($_POST['cpassword'] , FILTER_SANITIZE_STRING);
   $cpassword=mysqli_real_escape_string($conn, $filter_cpassword);

   $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'" ) or die('query faled');

   if(mysqli_num_rows($select_user)>0){
    $message[] = 'user already exist';
   }else{
    if($password != $cpassword){
        $message[] = 'wrong password';
    }else{
        mysqli_query($cann, "INSERT INTO `users` (`name`, `email`,`password`) VALUE ('$cann','$email','$password')") or die('query failed');
        $message[] = 'registered successfully';
        header('location:login.php');
    }
   }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="form-container">
        <form method="post">
           <h1>Register now</h1>
           <input type="text" name="name" placeholder="enter your name" required>
           <input type="emai" name="email" placeholder="enter you email" required>
           <input type="password" name="password" placeholder="enter your password"required>
           <input type="cpassword" name="number"placeholder="confirm password" required>
           <input type="submit" value="register now" name="submit-btn" class="btn">
           <p>already hava an account ?<a href="login.php">login now</a></p>
        </form>
 
    </section>
    
</body>
</html>