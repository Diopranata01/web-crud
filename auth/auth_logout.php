<?php

session_start();
session_unset();
session_destroy();

header("location:../index_log.php?error=logout");
exit();
?>