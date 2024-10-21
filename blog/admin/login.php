
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin.css">
    <script src="https://kit.fontawesome.com/37d6505749.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-form">
        <h2>Admin Login Panel</h2>
        <form method="POST">
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Admin Name" name="adminName" require >
            </div>

            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Admin Password" name="adminPassword" require>
            </div>

            <button type="submit" name="signin">Sign In</button>
            <div class="extra">
                <a href="#">Forgot Password</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
// Include database configuration file
require ("config.php");

// Check if the form is submitted
if (isset($_POST['signin'])) {
    $adminName = $_POST['adminName'];
    $adminPassword = $_POST['adminPassword'];

    // Prepare the SQL query using prepared statements to prevent SQL injection
    $query = $con->prepare("SELECT * FROM `admin_login` WHERE admin_name = ? AND admin_password = ?");
    
    // Bind the parameters to the SQL query
    $query->bind_param("ss", $adminName, $adminPassword);

    // Execute the query
    $query->execute();

    // Store the result
    $result = $query->get_result();

    // Check if the admin login is valid
    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['adminloginId']=$_POST['adminName'];
        header("Location: admin-panel.php");
    } else {
        echo "<script> alert('incorrect password');</script>";
    }
    $query->close();
}
?>





