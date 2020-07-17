<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:adminlogin.php');
}else{
    include '../connection.php';
    $query1="select * from competitions";
$result1=mysqli_query($conn,$query1);

    if(isset($_POST['addCompetiton']))
    {
        $compname=$_POST['CompetitonName'];
        $compdescription=$_POST['CompetitonDescription'];
        $compregsdate=$_POST['RegistrationDate'];
        $compstartdate=$_POST['StartingDate'];
        $compenddate=$_POST['EndDate'];
        $compwinner=$_POST['Winnerprize'];
        $img = "NULL";
        
        if(count($_FILES)>0)
        {
            if(is_uploaded_file($_FILES['Image']['tmp_name']))
            {
                $img=addslashes(file_get_contents($_FILES['Image']['tmp_name']));
            }
        }
        $query="INSERT INTO competitions (Competition_Name,Competition_Description,Registration_Date,Starting_Date,End_Date,Prize,Competition_Image) 
        values('$compname','$compdescription','$compregsdate','$compstartdate','$compenddate','$compwinner','$img')";

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
                                    <input type="text" placeholder="Competiton Name" class="form-control" name="CompetitonName">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Competiton Description</label>
                                    <input type="text" placeholder="Competiton Description" class="form-control" name="CompetitonDescription">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Registration Date</label>
                                    <input type="Date" class="form-control" name="RegistrationDate">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Starting Date</label>
                                    <input type="Date" class="form-control" name="StartingDate">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter End Date</label>
                                    <input type="Date" class="form-control" name="EndDate">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Enter Winner Prize</label>
                                    <input type="text" class="form-control" name="Winnerprize">
                                </div>
                                <div class="form-group">
                                     <label class="form-control-label">Insert Image</label> 
                                    <input type="file" class="form-control" name="Image">
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" value="Add Competition" class="btn btn-primary" name="addCompetiton">
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