<?php
include 'header.php';
include 'connection.php';
$query="Select * from event";
$result=mysqli_query($conn,$query);

?>

<main>

<div class="categories-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-70">
                        <span>Our Top Services</span>
                        <h2>Our Best Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
        <?php
            while ($row=mysqli_fetch_array($result))
    {
      ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <!-- <span class="flaticon-development"></span> -->
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Event_Image']);?>" width="100px" height="100px"/>
                        </div>
                        <div class="cat-cap">
                            <h5><a href=""><?php echo $row['Event_Name']?></a></h5>
                            <p>There are many variations of passages of lorem Ipsum available but the new majority have suffered.</p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</main>

<?php
include 'footer.php';
?>