<?php
include "db.php";
session_start();


if($_SESSION['emailnum']==true){

echo $_SESSION['emailnum']."---and id number =";

$user_id = $_SESSION['id_num'];

echo $user_id;


}
else{
header("location:login.php");

}


if(isset($_POST['submit'])){
    $name =$_POST['name'];
    $mobile =$_POST['mobile'];
    $sale =$_POST['sale'];

    $in = "INSERT INTO sale_data(name,mobile,sale,user_id) values('$name','$mobile','$sale','$user_id')" ;
    $ex = mysqli_query($connect,$in);

    if($ex){
        echo "information saved to the database";
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
    <h1>Enter Daily Report:</h1> <br>
    <form action="" method="POST">
    Agent Name:    <input type="text" name="name"><br>
    Mobile number: <input type="text" name="mobile"><br>
    Total Sale:    <input type="text" name="sale">
    <br>
    <button type="submit" name="submit">Submit</button>

    </form>
  <table border="2">
    <th>Name:</th>
    <th>Mobile:</th>
    <th>Sale volume:</th>
    <th>Team Leader ID</th>
    <tbody>
        <?php
          $select = "select * from sale_data where user_id=$user_id";
          $ex = mysqli_query($connect,$select);
          
          while($fetch = mysqli_fetch_array($ex)){?>
            <tr>
            <td><?php echo $fetch['name'];?></td>
            <td><?php echo $fetch['mobile'];?></td>
            <td><?php echo $fetch['sale'];?></td>
            <td><?php echo $user_id;?></td>
            
            </tr>
          <?php } ?>
        
    </tbody>
  </table>
   <br><a href="logout.php">Logout</a> 
</body>
</html>