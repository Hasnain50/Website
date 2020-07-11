<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:adminlogin.php');
}else{
include '../connection.php';
$query1="select * from department";
$result1=mysqli_query($conn,$query1);

if(isset($_POST['addEmployee']))
{
    $empName=$_POST['empName'];
    $empdepartment=$_POST['dddepartment'];
    $empemail=$_POST['empemail'];
    $emppass=$_POST['emppass'];
    $empdob=$_POST['empdob'];
    $empcontact=$_POST['empcontact'];

    $query="INSERT INTO employee (Emp_Name,Emp_Dept,Emp_Email,Emp_Password,Emp_DOB,Emp_Contact) 
    values('$empName','$empdepartment','$empemail','$emppass','$empdob','$empcontact')";

    $result=mysqli_query($conn,$query);
    if($result)
    {
       header('Location:Employee.php');
    }else{
        echo "Failed ! ".mysqli_error($conn);
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
                                    <input type="text" placeholder="Employee Name" class="form-control" name="empName">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Select Department </label>
                                    <select class="form-control" name="dddepartment">
                                        <?php
                                        if ($result1) {
                                            while ($row = mysqli_fetch_array($result1)) {
                                        ?>
                                                <option value="<?php echo $row['Dep_Id']; ?>"><?php echo $row['Dep_Name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Email</label>
                                    <input type="email" placeholder="Employee Email" class="form-control" name="empemail">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Password</label>
                                    <input type="password" placeholder="Password" class="form-control" name="emppass">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Select Date of Birth</label>
                                    <input type="date" class="form-control" name="empdob">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Contact number</label>
                                    <input type="text" class="form-control" name="empcontact">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Add Employee" class="btn btn-primary" name="addEmployee">
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