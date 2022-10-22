<?php
header('content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include_once("./config.php");

$query= "select *from Student";

$result = mysqli_query($conn,$query) or die("query failed to run");

if(mysqli_num_rows($result)>0)
{
    $output= mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
echo json_encode(array('message'=>'No Record Found','status'=>false));
}

?>