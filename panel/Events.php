<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:adminlogin.php');
}else{
include '../connection.php';
$query = "select * from event";
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
                        <strong class="d-block">Event</strong><span class="d-block">Event Detail</span>
                        
                    </div>
                        <div class="block-body">
                        <div style="text-align: center;"><a href="AddEvent.php" class="btn btn-primary">Add Event</a></div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Event Name</th>
                                            <th>Event Category</th>
                                            <th>Event Date</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
    while ($row=mysqli_fetch_array($result))
    {
      ?>
    <tr>
      <td><?php echo $row['Event_Id']?></td>
      <td><?php echo $row['Event_Name']?></td>
      <td><?php echo $row['Category_Id']?></td>
      <td><?php echo $row['Event_Date']?></td>
      <td><?php echo $row['Event_Description']?></td>
      <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Event_Image']);?>" width="100px" height="100px"/></td>
      <td><a href="<?php echo 'editevent.php?id='.$row['Event_Id'] ?>">Edit</a>&nbsp;<a href="<?php echo 'deleteevent.php?id='.$row['Event_Id'] ?>">Delete</a></td>
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