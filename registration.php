<?php
require 'config.php';
if (!empty($_SESSION["id"])){
    header ("Location: index.php");
}
if(isset($_POST["submit"])){
    $Name  =$_POST["name"];
    $Username =$_POST["username"];
    $Email =$_POST["email"];
    $Password =$_POST["password"];
    $Confirmpassword = $_POST["confirmpassword"];

    $duplicate = mysqli_query($conn, "SELECT * FROM `user_db1` WHERE username='$Username' OR email='$Email'  ");
    
    if ( mysqli_num_rows($duplicate)>0){
        echo
        "<script> alert ('Username or Email Has Already Taken'); </script>";
    }
    else{
        if ($Password == $Confirmpassword)
        {
            $insert= "INSERT INTO `user_db1` VALUES('', '$Name', '$Username', '$Email', '$Password')";
          
      mysqli_query($conn, $insert);
            echo
            "<script> alert ('Registration Sucessfull'); </script>";
        }
        else
        {
           
            echo
            
                "<script> alert ('Password Does Not Match'); </script>";
            
        }
    } 
}   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h1>REGITRATION</h1>
    <form  class ="" action="" method="post" autocomplete="off">
        <label for="name"> Name:</label>
        <input type="text" name="name" id="name" required value=""><br><br>
        <label for="username"> Username:</label>
        <input type="text" name="username" id="username" required value=""><br><br>
        <label for="email"> Email:</label>
        <input type="text" name="email" id="email" required value=""><br><br>
        <label for="password"> Password:</label>
        <input type="text" name="password" id="password" required value=""><br> <br>
        <label for="confirmpassword"> Confirmpassword:</label>
        <input type="text" name="confirmpassword" id="confirmpassword" required value=""><br>       
        <button type="submit" name="submit">Regiter</button><br>
    </form>
    <a href="login.php">login</a>
</body>
</html>