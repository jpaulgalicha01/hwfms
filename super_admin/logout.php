<?php
ob_start();
include 'includes/autoload.inc.php';

session_unset();
session_destroy();

ob_end_flush(header("Location: ../index.php"));

?>