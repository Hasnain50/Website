<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:adminlogin.php');
}else{
include '../connection.php';
$query = "SELECT * FROM `employee`";
$result = mysqli_query($conn, $query);
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
                        <div class="title">        
                        <strong class="d-block">Employee</strong><span class="d-block">Employee Detail</span>
                        
                    </div>
                        <div class="block-body">
                        <div style="text-align: center;"><a href="AddEmployee.php" class="btn btn-primary">Add Employee</a></div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>DOB</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['Emp_Id'] ?></td>
                                                <td><?php echo $row['Emp_Name'] ?></td>
                                                <td><?php echo $row['Emp_Email'] ?></td>
                                                <td><?php echo $row['Emp_Password'] ?></td>
                                                <td><?php echo $row['Emp_DOB'] ?></td>
                                                <td><?php echo $row['Emp_Contact'] ?></td>
                                                <td><a href="<?php echo 'editemployee.php?id=' . $row['Emp_Id'] ?>">Edit</a>&nbsp;<a href="<?php echo 'deleteemployee.php?id=' . $row['Emp_Id'] ?>">Delete</a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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