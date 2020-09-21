<?php
    session_start();
    include('includes/db.php');
    session_unset(); 
    session_destroy(); 
    header("location: index.php");
    exit;

?>