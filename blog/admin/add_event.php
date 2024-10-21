<?php
Session_start();
// Check if the session is set, otherwise redirect to login
if (!isset($_SESSION['adminloginId'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $event_name = $_POST['event_name'];
    $event_content = $_POST['event_content'];
    $event_date = $_POST['event_date'];
    $event_venue = $_POST['event_venue'];

    $event_img = $_FILES['event_img']['name'];
    $tmp = $_FILES['event_img']['tmp_name'];
    $folder = "../assets/images/" . $event_img;
	$img = move_uploaded_file($tmp, $folder);

    $sql = "INSERT INTO `event` (`name`, `date`, `venue`, `img`, `content`, `upload`) VALUES('$event_name', '$event_date', '$event_venue', '$event_img', '$event_content', current_timestamp())";
    $result = mysqli_query($con, $sql);
    header("Location:manage_event.php");
}

// Logout functionality
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="panel-1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="panel-1.css">
</head>
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
    <div class="form_bg" id="event_form">
        <form action="" enctype="multipart/form-data" id="new-blog" method="POST">
            <h3 class="card-header" style="font-weight:600" >New Event</h3>
            <div class="card-body">
                <div class="form-group">
                    <label class="control-label">Event Name</label>
                    <input type="text" class="form-control" name="event_name" required="">
                </div>
                <div class="form-group">
                    <label class="control-label">Event Date</label>
                    <input type="text" class="form-control" name="event_date" required="">
                </div>
                <div class="form-group">
                    <label class="control-label">Event Venue</label>
                    <input type="text" class="form-control" name="event_venue" required="">
                </div>
                <div class="form-group">
                    <label for="cover_img" class="control-label"> Event Image</label>
                    <input type="file" class="form-control" name="event_img" id="cover_img" required="">
                </div>
                <div class="form-group" id="preview">
                    <img src="" alt="" id="img1" style="width:100%; height:100%;object-fit:cover;">
                </div>
                <div class="form-group">
                    <label class="control-label">Event content</label>
                    <textarea rows="10" cols="50" class="form-control" name="event_content" required=""></textarea>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-sm btn-primary col-sm-3 offset-md-3" type="submit"> Save</button>
                            <button class="btn btn-sm btn-default col-sm-3" type="button" onclick="myFunction()">
                                Reset</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</section>



<!-- ===========================toggle-sidebar script ===================== -->
<script type="text/javascript">
    cover_img.onchange = evt => {
        const [file] = cover_img.files;
        if (file) {
            img1.src = URL.createObjectURL(file);
        }
    }

    function myFunction() {
        document.getElementById("new-blog").reset();
    }

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
<script src="../assets/js/bootstrap.bundle.min.js"></script>

</html>