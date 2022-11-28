<?php
include_once './dbConfig.php';

if(isset($_POST['register']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    if($password==$cpassword)
    {
        $password=md5($password);
        $insert="INSERT INTO users(fname,lname,email,userName,password) VALUES('$fname','$lname','$email','$username','$password')";
        mysqli_query($con,$insert);
        echo '<script>window.alert("Registration succesful!")</script>';
        header("Location:Login");
    }
    else
    {
        echo "<script>window.alert('The passwords do not match');</script>";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registration Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./CSS/Register.css">
    <body>
        <div class="form">
        <center>
        <form autocomplete="on" method="POST" action="Register">
            <h2>Sign Up</h2>
            <p>Create your Account.</p>
            <table width="450px"> 
                    <tr> </tr>
                    <tr>
                        <td>
                            <label for="fname">First name</label>
                            <input type="text" name="fname" placeholder="First Name" required autofocus>
                        </td>
                        <td>
                            <label for="lname">Last name</label>
                            <input type="text" name="lname" placeholder="Last Name" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Email address" required>
                        </td>
                        <td>
                            <label for="username">Username</label>
                            <input type="text" name="username" placeholder="Username" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                            <input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'">Show password<br><br>
                        <td>
                            <label for="cpassword">Confirm password</label>
                            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                            <input type="checkbox" onchange="document.getElementById('cpassword').type = this.checked ? 'text' : 'password'">Show password<br><br>
                        </td>
                    </tr>
                </table>
                <button type="submit" name="register">Sign Up</button><br>
                <a href="./Login">Already have an account? Log In</a>
        </form>
    </center>
        </div>
    </body>
</html>