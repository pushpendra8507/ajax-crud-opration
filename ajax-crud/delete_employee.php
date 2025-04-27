<?php  
include('config.php');

if(isset($_POST['uid'])) {
    $id = $_POST['uid'];
    $del = mysqli_query($conn, "DELETE FROM employee where id ='$id'");

    if($del){
        echo "Delete Employee";
    } else {
        echo "No Deleted Data";
    }
} else {
    echo "ID not received";
}
?>
