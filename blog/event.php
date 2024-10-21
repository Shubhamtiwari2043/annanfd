<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/teeTime.css">
</head>
<?php
include 'admin/config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM `event` WHERE id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
<body>
    <div class="img_container">
        <img src="assets/images/<?php echo $row['img']?>" alt="">
    </div>
    <div class="main1">
        <h1><?php echo $row['name']?></h1>
        <div class="content"><?php echo $row['content']?></div>
    </div>

       <!--=============================== footer code ================================-->
       <section>
        <footer>
            <div class="footer-container">
                <div class="footer-section">
                    <h3>About Us</h3>
                    <ul>
                        <li>ABC Travell</li>
                        <li>About Our Mission</li>
                        <li>Meet the Team</li>
                        <li>Testimonials</li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3><a href="#">Services</a></h3>
                    <ul>
                        <li>Cruises</li>
                        <li>VISAS </li>
                        <li>Flights</li>
                        <li>Hotels Booking </li>
                        <li>Vacation Packages</li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Address</h3>
                    <ul>
                        <li>
                            <i class="fa fa-map-marker-alt me-3"></i><br>ABC dfvndj, Mumbai 400001.
                        </li>
                        <li>
                            <i class="fa fa-phone-alt me-3"> </i><br>TEL:+91 0000000000
                        </li>
                        <li>
                            <i class="fa fa-envelope me-3"></i><br>info@abcdtravels.com
                        </li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Connect with Us</h3>
                    <ul class="social-media-links">
                        <li><a class="instagram" href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a class="facebook" href="" ><i class="fab fa-facebook-f"></i></a></li>
                        <li><a class="twitter" href=""><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
            <p class="TP">* Terms &amp; Conditions * Privacy Policy</p>
            <p class="rights">All right Reserved &copy 2023 @ ABC TRAVELLS</p>
        </footer>

    </section>
</body>
</html>