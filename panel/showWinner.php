<?php
session_start();
$CompId=$_GET['id'];
include '../connection.php';
$query="select * from competition_participants where Competition_Id='$CompId' AND Status='Approved'";
$result=mysqli_query($conn,$query);

$CompQuery="select * from competitions where Competition_Id='$CompId'";
$CompResult=mysqli_query($conn,$CompQuery);
$CompRow=mysqli_fetch_array($CompResult);

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
                        <strong class="d-block">Winners </strong><span class="d-block">Competition Winner Announcement</span>
                        <h1>Winner of <?= $CompRow['Competition_Name']?></h1>
                    </div>
                        <div class="block-body">
                        <!-- <div style="text-align: center;"><a href="AddEvent.php" class="btn btn-primary">Add Event</a></div> -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
    while ($row=mysqli_fetch_array($result))
    {
      ?>
    <tr>
     
      <?php $EmpResult=mysqli_query($conn,"Select * from employee where Emp_Id=".$row['Emp_Id']);
      $EmpRow=mysqli_fetch_array($EmpResult);

      ?>
     <td><?php echo $EmpRow['Emp_Name']?></td>
     <td><?php echo $EmpRow['Emp_Email']?></td>
     <td><?php echo $EmpRow['Emp_Contact']?></td>
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
                                
?>