<?php
$host = "localhost";
$username = "root";
$password = 1234;
$tablename = "test";
$connection = mysqli_connect($host, $username, $password, $tablename);
$sql = "update result set choose=".$_POST['choose']." where id=".$_POST['id'];
$result = mysqli_query($connection, $sql);

?>
