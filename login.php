<?php
require 'config.php';
if(isset($_POST['submit'])){
    $usernameemail=$_POST['usernameemail'];
    $password=$_POST['password'];
    $result=mysqli_query($con,"SELECT *  from tb_user where username='$usernameemail' OR gmail='$usernameemail'");
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        if($password==$row["password"]){
           $_SESSION["login"]=true;
           $_SESSION["id"]=$row["id"];
           header("location: index.php"); 
        }
        else{
            echo
            "<script>
            alert('Wrong Password');
            </script>";
        }
    }
    else{
        echo
        "<script>
        alert('Username  gmail Not Registered');
        </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body >
    <div class="log">
    <h1>LOGIN HERE</h1>
    <form action=""method="POST" autocomplete="off">
        <label for="usernameemail">USERNAME:</label>
        <input type="text" id="usernameemail" name="usernameemail" required value=""></br></br>
        <label for="password">PASSWORD :</label>
        <input type="password" name="password" id="password" required value=""></br></br>
        <button type="submit" name="submit" style="align-item:right;">LOGIN</button>
    </form>
    </div>
</br>
<label for="">If you are Registered </label>
<a href="registration.php">registration</a>
</body>
</html>