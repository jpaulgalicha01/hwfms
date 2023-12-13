<?php

include 'includes/autoload.inc.php';

session_unset();
session_destroy();

setcookie('user_id', NULL, time()-3600, '/hwfms');
setcookie('user_type', NULL, time()-3600, '/hwfms');
ob_end_flush(header("Location: ../index.php"));