<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" type="text/css" href="assets/css/teeTime.css">
    <title>TeeTime</title>

    <!------------------- page logo------------------ -->
    <link rel="icon" href="#" type="icon">

    <!--------------- font-awsome -icon-webkit link------------------ -->
    <script src="https://kit.fontawesome.com/37d6505749.js" crossorigin="anonymous"></script>

    <!----------------------------- Boxicons CSS--------- -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <script src="assets/js/i.js"></script>
</head>

<body>
    <!-- ================================= Nav-bar  ===================================   -->
    <nav class="navbar">
        <div class="logo">
            <a href="">
                <img src="#" alt="Company Log"></a>
        </div>
        <a href="#" class="toggle-btn">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>

        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">TeeTime</a></li>
            </ul>
        </div>
    </nav>



    <!-- ================================= Articles ===================================   -->
    <section class="homee">
        <div class="homee-text container">
            <h2 class="homee-tittle">Articles</h2>
            <span class="homee-subtittle">Find out leasted updated about our Company </span>
        </div>
    </section>


    <!-- ================================= Articles- card ===================================   -->


    <div class="switch-tab">
        <button class="tab-btn active" onclick="openTab('All')">All</button>
        <button class="tab-btn " onclick="openTab('news')">Latest News</button>
        <button class="tab-btn" onclick="openTab('events')">Upcoming Events</button>
    </div>

    <!-- =============================== All Tab ========================= -->

    <section class="tab-content" id="All-tab">
        <div class="card-container">
        <?php
        include 'admin/config.php';
        $sql = "SELECT id, name, img, content, 'blog' as source FROM blog UNION SELECT id, name, img, content, 'event' as source FROM event ORDER BY 'upload' DESC";
        $result = mysqli_query($con, $sql);
        $row1 = mysqli_num_rows($result);

            while($row = mysqli_fetch_assoc($result)):
        ?>
            <div class="card">
                <figure>
                    <img src="assets/images/<?php echo $row['img']?>" alt="image">
                </figure>
                <div class="card-content">
                    <h3><?php echo $row['name'] ?></h3>
                    <p><?php echo $row['content']?></p>
                    <button class="btn" data-popup-id="popup1" onclick="redirectToPage('<?php echo $row['id']; ?>', '<?php echo $row['source']; ?>')">Read more</button>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </section>

    <!-- =============================== Latest News ========================= -->

    <section class="tab-content" id="news-tab" style="display: none;">
    <div class="card-container">
        <?php
        include 'admin/config.php';
        $sql = "SELECT * FROM `blog` ORDER BY id DESC";
        $result = mysqli_query($con, $sql);
        $row1 = mysqli_num_rows($result);

            while($row = mysqli_fetch_assoc($result)):
        ?>
            <div class="card">
                <figure>
                    <img src="assets/images/<?php echo $row['img']?>" alt="image">
                </figure>
                <div class="card-content">
                    <h3><?php echo $row['name'] ?></h3>
                    <p><?php echo $row['content']?></p>
                    <a href="blog.php?id=<?php echo $row['id']?>" class="btn" data-popup-id="popup1">Read more</a>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </section>

    <!-- ===============================upcoming Events========================= -->

    <section class="tab-content" id="events-tab" style="display: none;">
    <div class="card-container">
        <?php
        include 'admin/config.php';
        $sql = "SELECT * FROM `event` ORDER BY id DESC";
        $result = mysqli_query($con, $sql);
        $row1 = mysqli_num_rows($result);

            while($row = mysqli_fetch_assoc($result)):
        ?>
            <div class="card">
                <figure>
                    <img src="assets/images/<?php echo $row['img']?>" alt="image">
                </figure>
                <div class="card-content">
                    <h3><?php echo $row['name'] ?></h3>
                    <b class="bold_e">Date:</b><?php echo $row['date'].'<br>' ?><b class="bold_e">Venue:</b><?php echo $row['venue'].'<br>' ?>
                    <p><?php echo $row['content']?></p>
                    <a href="event.php?id=<?php echo $row['id']?>" class="btn" data-popup-id="popup1">Read more</a>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </section>

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
<script>
        function redirectToPage(id, source) {
            if (source === 'blog') {
                window.location.href = 'blog.php?id=' + id;
            } else if (source === 'event') {
                window.location.href = 'event.php?id=' + id;
            }
        }
    </script>
</html>