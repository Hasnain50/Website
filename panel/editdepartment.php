<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:adminlogin.php');
}else{
    include '../connection.php';
$id=$_GET['id'];
$query1="SELECT * FROM department where Dep_Id=".$id;

$result1=mysqli_query($conn,$query1); 
$row1=mysqli_fetch_array($result1);  

if(isset($_POST['addDepartment']))
{
  $Dep_Name=$_POST['DepName'];
  $query="UPDATE department set Dep_Name='$Dep_Name' where Dep_Id='$id'";
  $result=mysqli_query($conn,$query);
  if($result)
  {
    //echo "Successfull";
    header('location:Department.php');
  }else{
    echo "Failed ";
  }
}



 include 'header.php';
?>
<div class="page-content">
    <!-- Page Header-->
    <div class="page-header no-margin-bottom">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Admin Dashboard</h2>
        </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Basic forms </li>
        </ul>
    </div>
    <section class="no-padding-top">
        <div class="container-fluid">
            <div class="row">
                <!-- Basic Form-->
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong class="d-block">Department</strong><span class="d-block">Add Department </span></div>
                        <div class="block-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label class="form-control-label">Enter Department </label>
                                    <input type="text" placeholder="Department" class="form-control" name="DepName" value="<?php echo $row1['Dep_Name']?>">
                                    <input type="submit" value="Add Department" class="btn btn-primary" name="addDepartment">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include 'footer.php';
}
?>