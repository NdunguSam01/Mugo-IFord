<?php
include 'dbConfig.php';
session_start();

if (isset($_POST['submit'])) 
{
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $username=$_POST['username'];
   $password=$_POST['password'];
   $confirmP=$_POST['confirmP'];

   $query=mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND email='$email' ");
   if (mysqli_num_rows($query)>0) 
   {
      echo '<script>alert("Username/email already exists")</script>';
      echo '<script>window.location="Login.php"</script>';
   }
   else
   {
    if ($password==$confirmP) 
   {
      $password=md5($password);
      $insert="INSERT INTO users (fname,;name,email,phone,username,password) VALUES ('$fname','$lname','$email','$phone','$username','$password')";
      mysqli_query($con,$insert);
      echo '<script>alert("Information saved succesfully")</script>';
      echo '<script>window.location="Login.php"</script>';

   } 
   else
   {
      echo '<script>alert("Passwords do not match!")</script>';
      echo '<script>window.location="Login.php"</script>';
   } 
   }

}
elseif (isset($_POST['login'])) 
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $password=md5($password);
  $query="SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result=mysqli_query($con,$query);
  $row=mysqli_fetch_array($result);

   if ($row['email']==$email && $row['password']==$password) 
   {
      $_SESSION['user']=$userName;
      $_SESSION['login_time_stamp']=time();
      echo '<script>alert("Welcome!")</script>';
      header("Location:Cart.php");
   }
   else
   {
      $_SESSION["error"]="Wrong username/password combination";
      header("location:UserLogin.php");
      array_push($errors, "wrong username/password combination");
   }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Page</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">

               <!--Login form-->
               <form action="Login.php" class="login">
                  <div class="field">
                     <input type="text" name="email" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                     <a href="index.php">Home</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="login" value="Login">
                  </div>
                  <!--<div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>-->
               </form>
            <!--Login Code ends Here-->

            <!--Sign up form starts here-->
               <form action="Login.php" class="signup">
                  <div class="field">
                     <input type="text" name="fname" placeholder="First Name: " required autocomplete="off">
                  </div>
                  <div class="field">
                     <input type="text" name="lname" placeholder="Last Name: " required autocomplete="off">
                  </div>
                  <div class="field">
                     <input type="text" name="email" placeholder="Email Address" required autocomplete="off">
                  </div>
                  <div class="field">
                     <input type="text" name="phone" placeholder="Phone Number: " required autocomplete="off">
                  </div>
                  <div class="field">
                     <input type="text" name="username" placeholder="Username: " required autocomplete="off">
                  </div>
                  <div class="field">
                     <input type="password" name="password" placeholder="Password" required autocomplete="off">
                  </div>
                  <div class="field">
                     <input type="password" name="confirmP" placeholder="Confirm password" required autocomplete="off">
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="submit" value="Sign up" onclick="return confirm('Register account?')">
                  </div>
               </form>
               <!--sIGN UP ENDS HERE-->

            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>
         {
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>
         {
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>