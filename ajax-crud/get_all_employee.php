<?php 

include('config.php');
$q = mysqli_query($conn,"SELECT * FROM employee");

$json = array();
while($data = mysqli_fetch_assoc($q))
{
    $json[]  = $data;
}

$record['userdata'] = $json;
echo json_encode($record);
?>