<?php
session_start();
include '../connection.php';
$id=$_GET['id'];
$query="update competition_participants set Status='Approved' where Participant_Id=".$id;
$result=mysqli_query($conn,$query);

$query1="select * from competition_participants where Participant_Id=".$id;
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_array($result1);
if($result)
{
    header('location:showcompparticipants.php?id='.$row1['Competition_Id']);
}
?>