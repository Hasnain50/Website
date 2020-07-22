<?php
include_once 'header.php';
include 'connection.php';

    if(!isset($_SESSION['employee'])){
        header('location:index.php');   
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        header('location:allCompetition.php?PLease select a competition');
    }

    $comp = "SELECT * FROM `competitions` WHERE `Competition_Id`='$id'";
    $compR = mysqli_query($conn,$comp);

    $compList = mysqli_fetch_assoc($compR);

?>
<main>
    
  
    <!--? Testimonial Start -->
    <div class="testimonial-area testimonial-padding" data-background="assets/img/gallery/section_bg04.jpg">
        <div class="container ">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-9">
                    <div class="h1-testimonial-active">
                        <!-- First Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="67px" height="49px">
                                    <path fill-rule="evenodd"  fill="rgb(240, 78, 60)"
                                    d="M57.053,48.209 L42.790,48.209 L52.299,29.242 L38.036,29.242 L38.036,0.790 L66.562,0.790 L66.562,29.242 L57.053,48.209 ZM4.755,48.209 L14.263,29.242 L0.000,29.242 L0.000,0.790 L28.527,0.790 L28.527,29.242 L19.018,48.209 L4.755,48.209 Z"/>
                                    </svg>
                                    <h2 style="color: red;">WINNER</h2>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                    <div class="founder-img">
                                        <img src="assets/img/gallery/Homepage_testi.png" alt="" height="150px">
                                    </div>

                                    <?php 

                                        $emp = "SELECT * FROM `employee` WHERE `Emp_Id`='$compList[Winner_Id]'";
                                        $empR = mysqli_query($conn,$emp);
                                        $empList = mysqli_fetch_assoc($empR);

                                    ?>
                                    <div class="founder-text">
                                        <span style="text-transform: uppercase;"><?php echo $empList['Emp_Name']?></span>
                                        
                                        <?php 
                                            $dep = "SELECT * FROM `department` WHERE `Dep_Id`='$empList[Emp_Dept]'";
                                            $depR = mysqli_query($conn,$dep);
                                            $depList = mysqli_fetch_assoc($depR);
                                        ?>
                                        
                                        <p>From -  <?php echo $depList['Dep_Name']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <!-- Coun Down Start -->

    <?php

            $comp = "SELECT * FROM `competitions` WHERE `Competition_Id`='$id'";
            $compR = mysqli_query($conn,$comp);

            $compList = mysqli_fetch_assoc($compR);
    ?>
    
    <div class="count-down-area pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- Counter Up -->
                    <div class="single-counter text-center">
                        <span><?php echo $compList['Starting_Date']?></span>
                        <p>Starting Date</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- Counter Up -->
                    <div class="single-counter active text-center">
                        <span><?php echo $compList['End_Date']?></span>
                        <p>Ending Date</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- Counter Up -->
                    <div class="single-counter text-center">
                        <span>5</span>
                        <p>Number of participants</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- Counter Up -->
                    <div class="single-counter text-center">
                        <span><?php echo $compList['Registration_Date']?></span>
                        <p>Registration Date</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Coun Down End -->
  
  
</main>
<?php
include 'footer.php';
?>