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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="panel-1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-icons/bootstrap-icons.min.css">
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
    <h3>Manage Event</h3>
    <table class="manage_table">
        <thead>
            <td>NO.</td>
            <td>Name</td>
            <td>Img</td>
            <td width="50%">Content</td>
            <td>Action</td>
        </thead>
        <?php
        include 'config.php';
        $i = 1;
        $sql = "SELECT * FROM `event` order by upload desc";
        $result = mysqli_query($con, $sql);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                ?>
                <tbody>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><img class="table_img" src='../assets/images/<?php echo $row["img"] ?>' alt=""></td>
                    <td class="content_left" style="padding:7px"><b>Date:</b><?php echo $row['date'].'<br>' ?><b>Venue:</b><?php echo $row['venue'].'<br>' ?><?php echo $row['content'] ?></td>
                    <td>
                        <a class="btn btn-primary" href="edit_event.php?id=<?php echo $row['id'] ?>">Edit</a>
                        <button class="btn btn-danger delete_event" data-id="<?php echo $row['id']; ?>"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tbody>
            <?php
            }
        }
        ; ?>
    </table>
</section>



<!-- ===========================toggle-sidebar script ===================== -->
</body>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/sweetalert.min.js"></script>
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

    $(document).ready(function () {
        $('.delete_event').click(function (e) {
            e.preventDefault();
            var blogId = $(this).data('id');

            swal({
                title: "Are you sure you want to delete this Data?",
                text: "Once deleted, you will not be able to recover this Data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: 'delete_event.php',
                            type: 'POST',
                            data: { id: blogId },
                            success: function (response) {
                                console.log(response); // For debugging
                                if (response.trim() === 'success') {
                                    swal("Data has been deleted!", {
                                        icon: "success",
                                    }).then((result) => {
                                        location.reload();
                                    });
                                } else {
                                    swal("Error deleting Data. Please try again.", {
                                        icon: "error",
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr);
                                swal("An error occurred. Please try again.", {
                                    icon: "error",
                                });
                            }
                        });
                    }
                });
        });
    });
</script>

</html>