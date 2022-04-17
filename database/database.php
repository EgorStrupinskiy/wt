<?php 

$link = mysqli_connect('localhost', 'root', '', 'my_bd');

if (mysqli_connect_errno()) 
{
    echo 'Database connection error('.mysqli_connect_errno().'): '.mysqli_connect_error();
    exit();
}