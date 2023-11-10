<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include "db.php";

?>
<body>
    <?php
     if(isset($_POST['submit'])){

      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      $pass_str = password_hash($password,PASSWORD_BCRYPT);
       // validate name
      if (empty($_POST["name"])) {
         $nameErr = "Name is required";
         echo "$nameErr"; 
      } 
   
      // validate email
      else if (empty($_POST["email"])) {
         $emailErr = "Email is required";
         echo "$emailErr";
      } else{
         $in="INSERT INTO login(name,email,password) values('$name','$email','$pass_str')";
         $exc= mysqli_query($connect,$in);
      }
   
      // if no errors, process form data
      // if (empty($nameErr) && empty($emailErr)) {
      //    // process form data
      //    $in="INSERT INTO login(name,email,password) values('$name','$email','$pass_str')";
      // }

   }
   
   // function to sanitize input data
   // function test_input($data) {
   //    $data = trim($data);
   //    $data = stripslashes($data);
   //    $data = htmlspecialchars($data);
   //    return $data;
   //   }


   //  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
   //   }
     

?>

<form method="POST" action="">
   <label for="name">Name:</label>
   <input type="text" id="name" name="name"><br>

   <label for="email">Email:</label>
   <input type="email" id="email" name="email"><br>

   <label for="password">Password:</label>
   <input type="password" id="password" name="password"><br>

   <button type="submit" name="submit">Submit</button><br>

   <a href="login.php">Login</a>
</form>
</body>
</html>