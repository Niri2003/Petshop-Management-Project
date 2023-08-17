<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: http://localhost/project/front.php"); // Fixed the parentheses placement
    exit();
?>