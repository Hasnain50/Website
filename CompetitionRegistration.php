<?php
 if(isset($_POST['btnCRegister']))
 {include 'connection.php';
  $id=$_GET['id'];
  $query1="SELECT * FROM competitions where Competition_Id='$id'";
  $result1=mysqli_query($conn,$query1); 
  $row1=mysqli_fetch_array($result1);  
   $CompetitionId=$id;
   $EmpId=$_POST['EmpId'];
   $query="INSERT INTO competition_participants(Emp_Id, Competition_Id, Status) VALUES ('$EmpId','$CompetitionId','Pending')";
   $result=mysqli_query($conn,$query);
   if($result)
   {
     header('location:index.php');
   }else{
     echo "Failed ";
   }
 } 
include 'header.php';
if(!isset($_SESSION['emp']))
{
  header('location:panel/employeelogin.php');
}else{
include 'connection.php';
    $id=$_GET['id'];
    $query1="SELECT * FROM competitions where Competition_Id='$id'";
    $result1=mysqli_query($conn,$query1); 
    $row1=mysqli_fetch_array($result1);  
   
?>
<main>
<div class="container">
<div class="row">
    <div class="col-lg-6">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['Competition_Image']);?>" width="200px" height="250px"/>
    </div>
    <div class="col-lg-6">
      <h1><?php echo $row1['Competition_Name'];?></h1>
      <h4><?php echo $row1['Competition_Description'];?></h4>
      <h4><?php echo $row1['Registration_Date'];?></h4>
      <form method="POST">
        <input type="hidden" name="EmpId" value="<?php echo $_SESSION['emp'];?>"/>
        <input type="submit" value="Confirm Registration" name="btnCRegister"/>
      </form>
    </div>
 
</div>
<br>
<br>
  
</div>
</main>
<?php
include 'footer.php';
  }
?>