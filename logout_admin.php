<?php
    session_start();
    unset($_SESSION['admin_is_logged']);
    header("Location: index.php");
