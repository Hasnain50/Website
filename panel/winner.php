<?php
$id=$_GET['id'];
include '../connection.php';

$query="select * from competition_participants where Participant_Id='$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

$query1="update competitions set Winner_Id=".$row['Emp_Id'];
$result1=mysqli_query($conn,$query1);
if($result1)
{
    header('location:AnnounceWinner.php?id='.$row['Competition_Id']);
}else{
    echo "Failed ! ".mysqli_error($conn);
}

?>