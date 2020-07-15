<?php
session_start();
include '../connection.php';
$id=$_GET['id'];
$query="update Event_Participants set Status='Approved' where EventParticipant_Id=".$id;
$result=mysqli_query($conn,$query);

$query1="select * from Event_Participants where EventParticipant_Id=".$id;
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_array($result1);
if($result)
{
    header('location:showparticipants.php?id='.$row1['Event_Id']);
}
?>