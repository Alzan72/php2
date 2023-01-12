<?php
session_start();

session_destroy();

setcookie('status', '', time() -3);

header("location:login.php?pesan=logout");