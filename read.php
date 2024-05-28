<html>
<head>
<title>View Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style>
    button{
        display:inline;
    }

    
</style>
</head>
<body>
<div class="container"><h2>users</h2>
<table class="table">
<thead>
<tr>
<th width="250px">ID</th>
<th width="250px">FirstName</th>
<th width="250px">LastName</th>
<th width="300px">Email</th>
<th width="50px">Password</th>
<th width="50px">Action</th>
</tr>
</thead>
<tbody>
<?php
include 'conn.php';

$sql="SELECT * FROM users";
$result=$conn->query($sql);

if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
    ?>
    <tr>
     <td><?php echo $row['id'];?></td>
     <td><?php echo $row['fName'];?></td>
     <td><?php echo $row['lName'];?></td>
     <td><?php echo $row['email'];?></td>
     <td><?php echo $row['user_password'];?></td>
     <td><button ><a href='update.php?id=<?php echo $row['id'];?>'>Update</a></button>
<button><a href='delete.php?id=<?php echo $row['id'];?>'>Delete</a></button>
    </td>
    </tr>
   <?php }
}
else{
echo $conn->error;
}
?>
</tbody>

</body>
</html>
