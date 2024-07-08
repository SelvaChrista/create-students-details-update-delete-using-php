<?php
require "config.php";
if (!empty($_SESSION["id"])){
    header ("Location: index.php");
}
if(isset($_POST["submit"])){
    $Usernameemail= $_POST["usernameemail"];
    $Password=$_POST["password"];
    $result=mysqli_query($conn, "SELECT * FROM user_db WHERE username='$Usernameemail' OR email='$Usernameemail'");
    $row= mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0)
    {
    if($Password == $row['Password'])
    {
        $_SESSION ["login"]= true;
        $_SESSION["id"] = $row["id"];
        header("Location:index.php");
    }
    else{
    echo
    "<script> alert ('Wrong Password'); </script>";

    }
    }
   else
   {
    echo
    "<script> alert ('User Not Register'); </script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h1>login</h1>
    <form  class = "" action="" method="post" autocomplete="off">
    <label for="usernameemail"> Username or Email</label>
    <input type="text" name="usernameemail" id="usernameemail" required value=""><br>
    <label for="password">Password</label>
    <input type="text" name="password" id="pasword" required value=""><br>
    <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="registration.php">Registration</a>
</body>
</html>

