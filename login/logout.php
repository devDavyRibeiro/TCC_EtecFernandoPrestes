<?php
// Inicia sessões, para assim poder destruí-las
require "../config.php";
include DATABASE;
logout();
header("Location: ../index.php");
?>