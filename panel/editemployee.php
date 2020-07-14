<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:adminlogin.php');
}else{
    include '../connection.php';
    $id=$_GET['id'];

    $query1="SELECT * FROM employee where Emp_Id='$id'";
    $result1=mysqli_query($conn,$query1); 
    $row1=mysqli_fetch_array($result1);  

    
    if(isset($_POST['editEmployee']))
    {

        
        $empName=$_POST['empName'];
        $empdepartment=$_POST['dddepartment'];
        $empemail=$_POST['empemail'];
        $emppass=$_POST['emppass'];
        $empdob=$_POST['empdob'];
        $empcontact=$_POST['empcontact'];

      $query="UPDATE `employee` SET `Emp_Name`='$empName',`Emp_Dept`='$empdepartment',
      `Emp_Email`='$empemail',`Emp_Password`='$emppass',`Emp_DOB`='$empdob',`Emp_Contact`='$empcontact' WHERE `Emp_Id`='$id'";

    $result=mysqli_query($conn,$query);
      if($result)
      {
        //echo "Successfull";
        header('location:Employee.php');
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
                        <div class="title"><strong class="d-block">Employee</strong><span class="d-block">Add Employee Detail</span></div>
                        <div class="block-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label class="form-control-label">Enter Employee Name </label>
                                    <input type="text" placeholder="Employee Name" class="form-control" name="empName" value="<?php echo $row1['Emp_Name']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Select Department </label>
                                    <select class="form-control" name="dddepartment">
                                        
                                        <?php

                                            $q1 = "SELECT * FROM `department`";
                                            $r1 = mysqli_query($conn,$q1);
                                            
                                            while ($row2 = mysqli_fetch_array($r1)) {
                                        ?>
                                                <option value="<?php echo $row2['Dep_Id']; ?>"><?php echo $row2['Dep_Name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Email</label>
                                    <input type="email" placeholder="Employee Email" class="form-control" name="empemail" value="<?php echo $row1['Emp_Email']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Password</label>
                                    <input type="password" placeholder="Password" class="form-control" name="emppass" value="<?php echo $row1['Emp_Password']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Select Date of Birth</label>
                                    <input type="date" class="form-control" name="empdob" value="<?php echo $row1['Emp_DOB']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Contact number</label>
                                    <input type="text" class="form-control" name="empcontact" value="<?php echo $row1['Emp_Contact']?>">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Edit Employee" class="btn btn-primary" name="editEmployee">
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

?>