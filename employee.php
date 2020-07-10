<?php

include 'connection.php';

if(isset($_POST['login']))
{
    $Emp_Email=$_POST['email'];
    $Emp_Password=$_POST['pass'];
    $query="SELECT * FROM `employee` where Emp_Email='$Emp_Email' AND Emp_Password='$Emp_Password'";
    $result=mysqli_query($conn,$query);
    $row =mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);
    if($count)
    {
          $_SESSION['employee']=$Emp_Email;
        header("Location:index.php");
    }else{
        echo mysqli_error($conn);
        echo "Invalid Credentials";
    }
}

?>