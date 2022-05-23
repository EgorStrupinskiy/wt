<?php 

// index.php
session_start();

session_destroy();
header("Location: index/features.php");

// If user is logged in, retrieve identity from session.
$identity = null;
if (isset($_SESSION['identity'])) {
    $identity = $_SESSION['identity'];
}