<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("location:login.php");
}
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $gmail=$_POST['gmail'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $duplicate=mysqli_query($con,"select * from tb_user where username='$username' OR gmail='$gmail'");
    if(mysqli_num_rows($duplicate)>0){
        echo
        "<script>
        alert('Username and gmail has alredy taken');
        </script>";
    }

    else{
        if($password==$confirmpassword){
            $query="insert into tb_user VALUES('','$name','$username','$gmail','$password')";
            mysqli_query($con,$query);
            echo
            "<script>
            alert('Registration Successful');
            </script>";
        }
        else{
            echo"
            <script>
            alert('Password does not Match')
            ";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="style/css">
    <title>Registration</title>
</head>
<body>
    <div class="log">
    <h1>Registration</h1>
    <form action="registration.php" method="post"autocomplete="off">
        <label for="name">Name :</label>
        <input type="text" id="" name="name" required value=""></br></br>
        <label for="username">Username :</label>
        <input type="text" id="username" name="username" required value=""></br></br>
        <label for="gmail">Gmail :</label>
        <input type="email" id="gmail" name="gmail" required value=""></br></br>
        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required value=""></br></br>
        <label for="confirmpassword">Confirm Password :</label>
        <input type="password" id="password" name="confirmpassword" required value=""></br></br>
        <button type="submit" name="submit">SUBMIT</button>
    </form>
    </div>
</br>
<label for="">Already Registered</label>
<a href="login.php">LOGIN HERE</a>
</body>
</html>