<?php
Define ('DB_USER', 'famousadmin');
Define ('DB_PASSWORD', '2k(F1mousAdm9n)20');
Define ('DB_HOST', 'localhost');
Define ('DB_NAME', 'famousfurnituredb');
$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($dbcon, 'utf8');
?>