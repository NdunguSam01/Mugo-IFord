<?php
session_start();
include_once './dbConfig.php';

if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $password=md5($password);
    $query="SELECT * FROM users WHERE userName='$username' AND password='$password' ";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);

    if($row['userName']==$username && $row['password']==$password)
    {
        $_SESSION['user']=$username;
        $_SESSION['login-time']=time();
        header("Location:Checkout");
    }
    else
    {
        echo '<script>window.alert("Login failed!")</script>';
        header("Location:Login2");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./CSS/Login.css">
    <title>Login Form</title>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <div class="login">
                <div class="login-header">
                    <h3>LOG IN</h3>
                    <p>Please enter your credentials to log in.</p>
                </div>
                </div>
            <form class="login-form" method="POST" action="Login" autocomplete="on">
                <input type="text" name="username" placeholder="Username" autofocus required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <button type="submit" name="login">Log In</button>
                <p class="message" style="float: left;"><a href="./">Home</a></p>
                <p class="message" style="float: right;"><a href="./Register">Sign up</a></p>
            </form>
        </div>
    </div>

</body>
</html>