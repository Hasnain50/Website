<?php
include '../connection.php';
$id=$_GET['id'];
$query="DELETE from department where Dep_Id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:Department.php');
}else{
    echo "failed";
}
?>