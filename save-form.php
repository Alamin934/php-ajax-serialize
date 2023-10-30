<?php
include "config.php";
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$country = $_POST['country'];


$sql = "INSERT INTO persons(p_name, p_age, p_gender, p_country) VALUES('{$name}',{$age},'{$gender}','{$country}')";
// $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_query($conn, $sql)){
    echo "Hello, {$name} your record is saved.";
}else{
    echo "Can't saved form.";
}

mysqli_close($conn);