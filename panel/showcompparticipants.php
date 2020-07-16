<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:adminlogin.php');
}else{
include '../connection.php';
$Eid=$_GET['id'];

$Pquery = "select * from competition_participants where Competition_Id=".$Eid;
$Presult = mysqli_query($conn, $Pquery);


$Equery = "select * from competitions where Competition_Id=".$Eid;
$Eresult = mysqli_query($conn, $Equery);
$ERow=mysqli_fetch_array($Eresult);
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
                        <strong class="d-block">Competition Participants</strong><span class="d-block">Participants Detail</span>
                        <h1><?= $ERow['Competition_Name']?></h1>
                    </div>
                        <div class="block-body">
                        <!-- <div style="text-align: center;"><a href="AddEvent.php" class="btn btn-primary">Add Event</a></div> -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Competition Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
    while ($row=mysqli_fetch_array($Presult))
    {
      ?>
    <tr>
     
      <?php $EmpResult=mysqli_query($conn,"Select * from employee where Emp_Id=".$row['Emp_Id']);
      $EmpRow=mysqli_fetch_array($EmpResult);

      ?>
     <td><?php echo $EmpRow['Emp_Name']?></td>
     <td><?php echo $row['Status']?></td>
      <td><a href="<?php echo 'updatecompstatus.php?id='.$row['Participant_Id'] ?>">Approved</a></td>
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