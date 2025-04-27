<?php 
include('config.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$com_name = $_POST['com_name'];


$sql = mysqli_query($conn, "INSERT INTO employee (name, email, password, com_name) VALUES ('$name', '$email', '$password', '$com_name')");

if ($sql) {
    echo "Add Employee";
} else {
    echo "Error: " . mysqli_error($conn);
}




?>

