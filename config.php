<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "table_data_db";

$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn){
    // echo 'Error in database connection' . mysqli_connect_error();
} else {
    // echo 'Database connected successfully';
}

?>