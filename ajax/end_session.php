<?php
    session_start();
    include '../conf/db.php';
    $session_key = $_SESSION['key'];
    $conn->query("UPDATE `login` SET `end` = CURRENT_TIMESTAMP WHERE session_key = '$session_key'");
    $conn->close();
?>