<?php
include_once './dbConfig.php';

if(isset($_POST['register']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    if($password==$cpassword)
    {
        $password=md5($password);
        $insert="INSERT INTO users(fname,lname,email,phNo,userName,password) VALUES('$fname','$lname','$email','$phone','$username','$password')";
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
    <body>
        <form autocomplete="on">
            <h2>Sign Up</h2>
                <table>
                    <tr>
                        <td>
                            <label for="fname">First name:</label><br>
                            <input type="text" name="fname" placeholder="First Name" required>
                        </td>
                        <td>
                            <label for="lname">Last name:</label><br>
                            <input type="text" name="lname" placeholder="Last Name" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email:</label><br>
                            <input type="email" name="email" placeholder="Email address" required>
                        </td>
                        <td>
                            <label for="username">Username</label><br>
                            <input type="text" name="username" placeholder="Username" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">Password</label><br>
                            <input type="password" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br><br>
                            <input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'">Show password<br>
                        <td>
                            <label for="cpassword">Confirm password</label><br>
                            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br><br>
                            <input type="checkbox" onchange="document.getElementById('cpassword').type = this.checked ? 'text' : 'password'">Show password<br>
                        </td>
                    </tr>
                </table>
                <button type="submit" name="register">Sign Up</button>
                <a href="./Login">Already have an account?</a>
        </form>
    </body>
</html>