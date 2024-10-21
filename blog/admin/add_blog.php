<?php
session_start();
// Check if the session is set, otherwise redirect to login
if (!isset($_SESSION['adminloginId'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blog_name = mysqli_real_escape_string($con, $_POST['blog_name']);
    $blog_content = mysqli_real_escape_string($con, $_POST['blog_content']);

    // Handle the uploaded image
    $blog_img = $_FILES['cover_img']['name'];
    $tmp = $_FILES['cover_img']['tmp_name'];
    $folder = "../assets/images/" . $blog_img;
    $img = move_uploaded_file($tmp, $folder);

    // Use a prepared statement to insert the data into the database
    $sql = "INSERT INTO `blog`(`name`, `img`, `content`, `upload`) VALUES(?, ?, ?, current_timestamp())";
    $stmt = mysqli_prepare($con, $sql);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, 'sss', $blog_name, $blog_img, $blog_content);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        header("Location: manage_blog.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
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
                <button type="submit" name="logout" class="bx bx-log-out" id="btn"></button>
            </form>
            <span class="tooltip">Logout</span>
        </li>
    </ul>
</div>

<section class="home-section">
    <div class="form_bg">
        <form action="" enctype="multipart/form-data" id="new-blog" method="POST">
            <h3 class="card-header" style="font-weight:600">New Blog</h3>
            <div class="card-body">
                <div class="form-group">
                    <label class="control-label">Blog Name</label>
                    <input type="text" class="form-control" name="blog_name" required="">
                </div>
                <div class="form-group">
                    <label for="cover_img" class="control-label"> Blog Image</label>
                    <input type="file" class="form-control" name="cover_img" id="cover_img" required="">
                </div>
                <div class="form-group" id="preview">
                    <img src="" alt="" id="img1" style="width:100%; height:100%;object-fit:cover;">
                </div>
                <div class="form-group">
                    <label class="control-label">Blog content</label>
                    <textarea rows="10" cols="50" class="form-control" name="blog_content" required=""></textarea>
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
<script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>
