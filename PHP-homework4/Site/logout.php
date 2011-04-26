<?php

session_start();
session_destroy();

echo "Вашата сесия приключи.Натиснете <a href='index.php'>ТУК</a>, за да се върнете.";

header("Location:index.php");
?>
