<?php 
    Session_start();


    // Check if the session is set, otherwise redirect to login
    if (!isset($_SESSION['adminloginId'])) {
        header("Location: login.php");
        exit();
    }

    // Logout functionality
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: login.php");
        exit();
    }
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <title>Admin Panel</title>
        <link rel="stylesheet" href="panel-1.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
    <div class="sidebar">
            <div class="logo-details">
                <div class="logo_name">Admin Panel</div>
                <i class='bx bx-menu' id="btn"></i>
            </div>
            <ul class="nav-list">
                <li>
                    <a href="admin-panel.php">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="add_event.php">
                        <i class='bx bx-folder-plus'></i>
                        <span class="links_name">New Events</span>
                    </a>
                    <span class="tooltip">New Events</span>
                </li>
                <li>
                    <a href="add_blog.php">
                        <i class='bx bx-folder-plus'></i>
                        <span class="links_name">New Blogs</span>
                    </a>
                    <span class="tooltip">New Blog</span>
                </li>
                <li>
                    <a href="manage_blog.php">
                        <i class='bx bx-folder'></i>
                        <span class="links_name">Manage Blogs</span>
                    </a>
                    <span class="tooltip">Manage Blog</span>
                </li>
                
                
                <li>
                    <a href="manage_event.php">
                        <i class='bx bx-folder'></i>
                        <span class="links_name">Manage Events</span>
                    </a>
                    <span class="tooltip">Manage Events</span>
                </li>


                <li class="profile">
                    <form method="POST">
                        <i class='bx bx-log-out' id="btn"></i>
                    </form>        
                    <span class="tooltip">Logout</span>            
                </li>
            </ul>
        </div>
        <section class="home-section">
            <div class="text">Welcome to the Admin Pannel - <?php echo  $_SESSION['adminloginId'] ?></div>
            <?php
            include 'config.php';
            $sql = "SELECT * FROM `blog`";
            $result = mysqli_query($con, $sql);
            $blog_num = mysqli_num_rows($result);
            $sql1 = "SELECT * FROM `event`";
            $result1 = mysqli_query($con, $sql1);
            $event_num = mysqli_num_rows($result1);
            ?>
            <div class="dashboard">
                <div class="dashcard" id="blog_card">
                    <h3>Total Blogs</h3>
                    <h1><?= $blog_num?></h1>
                </div>
                <div class="dashcard" id="event_card">
                    <h3>Total Events</h3>
                    <h1><?= $event_num?></h1>
                </div>
            </div>
        </section>
 


        <!-- ===========================toggle-sidebar script ===================== -->
        <script>
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");

            closeBtn.addEventListener("click", () => {
                sidebar.classList.toggle("open");
                menuBtnChange();
            });

            function menuBtnChange() {
                if (sidebar.classList.contains("open")) {
                    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else {
                    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
                }
            }
        </script>
    </body>

</html>

