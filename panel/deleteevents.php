<?php
include '../connection.php';
$id=$_GET['id'];
$query="DELETE from events where Event_Id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('location:Events.php');
}else{
    echo "failed";
}
?>