<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['nome']); /* ADD isso */
    session_destroy();
    header("location: index.php");
?>