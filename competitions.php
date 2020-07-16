<?php
include 'header.php';
include 'connection.php';
$query="Select * from competitions";
$result=mysqli_query($conn,$query);

?>

<main>

<div class="categories-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-70">
                        <span>Competitions</span>
                        <h2>Register Yourself</h2>
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
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Competition_Image']);?>" width="100px" height="100px"/>
                        </div>
                        <div class="cat-cap">
                            <h5><a href=""><?php echo $row['Competition_Name']?></a></h5>
                            <p>The following are some of the cognitive benefits of playing video games.
Improves coordination
Improves problem-solving skills
Enhances memory
Improves attention and concentration
It is a great source of learning
Improves the brain's speed
Enhances multitasking skills
Improves social skills.</p>
                            <a href="CompetitionRegistration.php?id=<?php echo $row['Competition_Id']?>"><button class="boxed-btn">Register</button></a>
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