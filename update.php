<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'conn.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="SELECT * FROM users WHERE id=$id";
    $result=$conn->query($sql);

    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){

?>

<form action="update.php ? id=<?php echo $id; ?>" method="post">
        <h3>Sign up</h3>
        <fieldset>
            <legend>Person information</legend>
            First name:<br>
            <input type="text" name="a" value="<?php echo $row['fName']?>">
            <br>
            Last name:<br>
            <input type="text" name="b" value="<?php echo $row['lName']?>">
            <br>
            Email:<br>
            <input type="text"name="Email" value="<?php echo $row['email']?>">
            <br>
            Password:<br>
            <input type="text"name="Password" value="<?php echo $row['user_password']?>">
            <br>
            <input type="submit"name="update"value="submit">
            
        </fieldset>

    </form> 
    <?php
    }
}
}
    ?>
    <?php
    

if(isset($_POST['update'])){

    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    $first_name= $_POST['a'];
    $last_name= $_POST['b'];
    $email= $_POST['Email'];
    $password=$_POST['Password'];

    $sql="UPDATE users SET `fName`='$first_name', `lName`='$last_name',`email`=' $email',`user_password`='$password'
    where `id`='$id'";


        $result = $conn->query($sql);
        if(!$result){
            die("query Failed".mysqli_error());
        }
        else{
            header('location:read.php?update_msg=You have updated the record successfully');
        
        }
}

 
?>
</body>
</html>
