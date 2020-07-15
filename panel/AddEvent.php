<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:adminlogin.php');
}else{
include '../connection.php';
$query1="select * from events";
$result1=mysqli_query($conn,$query1);
$query2="select * from event_category";
$result2=mysqli_query($conn,$query2);
if(isset($_POST['addEvent']))
    {
        $eventname=$_POST['eventName'];
        $ddeventcategory=$_POST['ddeventcategory'];
        $eventdate=$_POST['eventdate'];
        $eventdescription=$_POST['eventdescription'];
        
        if(count($_FILES)>0)
        {
            if(is_uploaded_file($_FILES['Image']['tmp_name']))
            {
                $img=addslashes(file_get_contents($_FILES['Image']['tmp_name']));
            

        $query="INSERT INTO events (Event_Name,Category_Id,Event_Date,Event_Description,Event_Image) 
        values('$eventname','$ddeventcategory','$eventdate','$eventdescription','$img')";

        $result=mysqli_query($conn,$query);
        if($result)
        {

           header('Location:Events.php');
        }else{
            echo "Failed ! ".mysqli_error($conn);
        }
    }
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
                        <div class="title"><strong class="d-block">Event</strong><span class="d-block">Add Event Detail</span></div>
                        <div class="block-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-control-label">Enter Event name </label>
                                    <input type="text" placeholder="Event Name" class="form-control" name="eventName">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Select Event Category </label>
                                    <select class="form-control" name="ddeventcategory">
                                        <?php
                                        if ($result1) {
                                            while ($row2 = mysqli_fetch_array($result2)) {
                                        ?>
                                                <option value="<?php echo $row2['Category_Id']; ?>">
                                                <?php echo $row2['Category_Name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Event Date</label>
                                    <input type="Date" placeholder="Event Date" class="form-control" name="eventdate">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Select Description</label>
                                    <input type="text" class="form-control" name="eventdescription">
                                </div>
                                <div class="form-group">
                                     <label class="form-control-label">Insert Image</label> 
                                    <input type="file" class="form-control" name="Image">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Add Event" class="btn btn-primary" name="addEvent">
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