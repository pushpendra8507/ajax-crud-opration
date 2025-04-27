<?php
include_once('config.php');

// Get all data from POST
$id = $_POST['emp_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$com_name = $_POST['com_name'];

// Update query
$sql = mysqli_query($conn, "UPDATE employee SET name='$name', email='$email', password='$password', com_name='$com_name' WHERE id='$id'");

// Check if any rows were affected
if (mysqli_affected_rows($conn) > 0) {
    echo "Employee updated successfully.";
} else {
    echo "No changes were made or update failed.";
}
?>

