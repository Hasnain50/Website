<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:adminlogin.php');
}else{
    include '../connection.php';
    $id=$_GET['id'];
    $query1="SELECT * FROM competitions WHERE Competition_Id=".$id;
    $result1=mysqli_query($conn,$query1);
    $row1 = mysqli_fetch_array($result1);

    if(isset($_POST['EditCompetition']))
    {
        $compname=$_POST['CompetitonName'];
        $compdescription=$_POST['CompetitonDescription'];
        $compregsdate=$_POST['RegistrationDate'];
        $compstartdate=$_POST['StartingDate'];
        $compenddate=$_POST['EndDate'];
        $compwinner=$_POST['Winnerprize'];
        if(count($_FILES)>0)
        {
            if(is_uploaded_file($_FILES['Image']['tmp_name']))
            {
                $img=addslashes(file_get_contents($_FILES['Image']['tmp_name']));
            }
        }else{
            $img=$_POST['img1'];
        }
        $query="UPDATE `competitions` SET `Competition_Name`='$compname',`Competition_Description`='$compdescription',`Registration_Date`='$compregsdate',`Starting_Date`='$compstartdate',`End_Date`='$compenddate',`Prize`='$compwinner',`Competition_Image`='$img' WHERE Competition_Id='$id'";

        $result=mysqli_query($conn,$query);
        if($result)
        {
           header('Location:Competition.php');
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
                        <div class="title"><strong class="d-block">Competitions</strong><span class="d-block">Add Competition Detail</span></div>
                        <div class="block-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label class="form-control-label">Enter Competiton Name </label>
                                    <input type="text" placeholder="Competiton Name" class="form-control" name="CompetitonName" value="<?php echo $row1['Competition_Name']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Competiton Description</label>
                                    <input type="text" placeholder="Competiton Description" class="form-control" name="CompetitonDescription"value="<?php echo $row1['Competition_Description']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Registration Date</label>
                                    <input type="Date" class="form-control" name="RegistrationDate"value="<?php echo $row1['Registration_Date']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Starting Date</label>
                                    <input type="Date" class="form-control" name="StartingDate"value="<?php echo $row1['Starting_Date']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter End Date</label>
                                    <input type="Date" class="form-control" name="EndDate"value="<?php echo $row1['End_Date']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Winner Prize</label>
                                    <input type="text" class="form-control" name="Winnerprize"value="<?php echo $row1['Prize']?>">
                                </div>
                                <div class="form-group">
                                     <label class="form-control-label">Insert Image</label>
                                     <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row1['Competition_Image']);?>" width="100px" height="100px"/> 
                                    <input type="file" class="form-control" name="Image">
                                    <input type="hidden" value="" name="img1"/>
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" value="Edit Competition" class="btn btn-primary" name="EditCompetition">
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