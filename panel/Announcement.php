<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:adminlogin.php');
}else{
include '../connection.php';
$query = "SELECT * FROM `competitions` where End_Date <= CURDATE()";
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
                        <strong class="d-block">Competitions</strong><span class="d-block">competiton Detail</span>
                        
                    </div>
                        <div class="block-body">
                        <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Competition Name</th>
                                        <th>Competition Description</th>
                                        <th>Registration Date</th>
                                        <th>Starting Date</th>
                                        <th>End Date</th>
                                        <th>Prize</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($row=mysqli_fetch_array($result)){
                                        if($row['Winner_Id']===null){
                                    ?>
                                    <tr> 
                                    <td><?php echo $row['Competition_Id']?></td>
                                    <td><?php echo $row['Competition_Name']?></td>
                                    <td><?php echo $row['Competition_Description']?></td>
                                    <td><?php echo $row['Registration_Date']?></td>
                                    <td><?php echo $row['Starting_Date']?></td>
                                    <td><?php echo $row['End_Date']?></td>
                                    <td><?php echo $row['Prize']?></td>
                                    <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Event_Image']);?>" width="100px" height="100px"/></td>
                                    <td><a href="<?php echo 'AnnounceWinner.php?id='.$row['Competition_Id'] ?>">AnnounceWinner</a></td>
                                    </tr>
                                <?php
                                }
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