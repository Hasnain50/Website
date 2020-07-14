<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:adminlogin.php');
}else{
    include '../connection.php';
    $id=$_GET['id'];
    $query1="SELECT * FROM event WHERE Event_Id=".$id;
    $result1=mysqli_query($conn,$query1);
    $row1 = mysqli_fetch_array($result1);
    if(isset($_POST['EditEvent']))
        {
            $eventname=$_POST['eventName'];
            $ddeventcategory=$_POST['ddeventcategory'];
            $eventdate=$_POST['eventdate'];
            $eventdescription=$_POST['eventdescription'];
            $img;
            
            if(count($_FILES)>0)
            {
                if(is_uploaded_file($_FILES['Image']['tmp_name']))
                {
                    $img=addslashes(file_get_contents($_FILES['Image']['tmp_name']));    
        }
    }else{
$img=$_POST['img1'];
    }
    $query="UPDATE `event` SET `Category_Id`='$ddeventcategory',`Event_Name`='$eventname',`Event_Date`='$eventdate',`Event_Description`='$eventdescription',`Event_Image`='$img' WHERE Event_Id='$id'";
    
            $result=mysqli_query($conn,$query);
            if($result)
            {
    
               header('Location:Events.php');
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
                        <div class="title"><strong class="d-block">Event</strong><span class="d-block">Add Event Detail</span></div>
                        <div class="block-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-control-label">Enter Event name </label>
                                    <input type="text" placeholder="Event Name" class="form-control" name="eventName" value="<?php echo $row1['Event_Name']?>"">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Select Event Category </label>
                                    <select class="form-control" name="ddeventcategory">
                                        <?php
                                        $q1 = "SELECT * FROM `event_category`";
                                        $r1 = mysqli_query($conn,$q1);
                                        
                                        while ($row2 = mysqli_fetch_array($r1)) {
                                            if($row1[1] == $row2['Category_Id'])
                                            {
                                    ?>        <option value="<?php echo $row2['Category_Id']; ?>" selected>
                                                <?php echo $row2['Category_Name'] ?></option>
                                            <?php 
                                            }
                                            else {

                                            ?>
                                            <option value="<?php echo $row2['Category_Id']; ?>">
                                                <?php echo $row2['Category_Name'] ?></option>
                                        <?php
                                            }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Event Date</label>
                                    <input type="Date" placeholder="Event Date" class="form-control" name="eventdate" value="<?php echo $row1['Event_Date']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Select Description</label>
                                    <input type="text" class="form-control" name="eventdescription"value="<?php echo $row1['Event_Description']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Insert Image</label>
                                    
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['Event_Image']);?>" width="100px" height="100px"/> 
                                    <input type="file" class="form-control" name="Image" >
                                    <input type="hidden" value="<?php echo $row1['Event_Image']?>" name="img1"/>
                                
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Edit Event" class="btn btn-primary" name="EditEvent">
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