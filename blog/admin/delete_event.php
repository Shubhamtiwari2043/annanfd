<?php
include 'config.php';

if (isset($_POST['id'])) {
    $blogId = $_POST['id'];

    $sql = "DELETE FROM event WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $blogId);
    
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $con->close();
}
?>
