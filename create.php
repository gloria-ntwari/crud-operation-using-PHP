<?php
include 'conn.php';

if(isset($_POST['submit'])){
    $fName=$_POST['a'];
    $lName=$_POST['b'];
    $email=$_POST['Email'];
    $user_password=$_POST['Password'];


    $hashed_password=md5($user_password);


    $sql="INSERT INTO users (fName,lName,email,user_password) VALUES ('$fName','$lName','$email','$hashed_password')";
    $result=$conn->query($sql);

    if($result==TRUE){
        echo "New record is created";
    }
    else{
        echo "There is the ".$conn->error."eror";
    }

}

?>
<html>
    <a href="read.php">View the data from database</a>
</html>