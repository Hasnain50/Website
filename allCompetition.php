<?php
include 'connection.php';
include_once 'header.php';

    if(!isset($_SESSION['employee'])){
        header('location:index.php');   
    }

    $comp = "SELECT * FROM `competitions` ";
    $compr = mysqli_query($conn,$comp);

?>

<main>
  
    <!-- Blog Area Start -->
    <div class="home-blog-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-100" style="text-align: center;">
                        <span>All Competitions</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($compr)) {?>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="assets/img/gallery/home_blog1.png" alt="">
                                    <ul>
                                        <li>By Admin   -   <?php echo $row['End_Date']?></li>
                                    </ul>
                                </div>
                                <div class="blog-cap">
                                    <h3><a href="blog_details.html"><?php echo $row['Competition_Name']?></a></h3>
                                    <p><?php echo $row['Competition_Description']?></p>
                                    <a href="winner.php?id=<?php echo $row['Competition_Id']?>" class="more-btn">View Results</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->

</main>
<?php
include 'footer.php';
?>