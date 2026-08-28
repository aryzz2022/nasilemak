<?php
require "db_connect.php";

// Destroy the session and send user back to login
session_unset();
session_destroy();
header("Location: login.php");
exit;
?>