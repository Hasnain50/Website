<?php
include '../connection.php';
$id=$_GET['id'];
$query="DELETE from competitions where Competition_Id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:Competition.php');
}else{
    echo "failed";
}
?>