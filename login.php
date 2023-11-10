

<?php
include "db.php";

session_start();
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "select * from login where email ='$email'";
    $ex = mysqli_query($connect,$select);
    $fetc = mysqli_fetch_array($ex);

    $fetc_pass = $fetc['password'];
    $pass_verify = password_verify($password,$fetc_pass);

    if($pass_verify){
        echo "login success";
       $_SESSION['emailnum'] = $fetc['email'];
       $_SESSION['id_num'] = $fetc['id_num'];
      
       header("location:dashboard.php");
        
    }
    else{
        echo "login failed";
    }


}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="email" name="email" placeholder="Enter email"><br>
        <input type="password" name="password" placeholder="Enter password"><br>
        <button type="submit" name="submit">Login</button><br>

        <a href="register.php">Register</a>


    </form>
</body>
</html>