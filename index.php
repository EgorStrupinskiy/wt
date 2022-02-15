<?php 
// index.php
session_start();

include "main.html";
// If user is logged in, retrieve identity from session.
$identity = null;
if (isset($_SESSION['identity'])) {
    $identity = $_SESSION['identity'];
}
?>