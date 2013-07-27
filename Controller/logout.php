<?php

// Inialize session
session_start();

unset($_SESSION['username']);

// Jump to login page
header('Location: ../View/login.php');

?>
