<?php

header('content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-HEADERS:Access-Control-Allow-Methods,content-Type,Authorization,X-Requested-With');
// X-Requested-With accept just ajax

$data = json_decode(file_get_contents('php://input'),true);
$student_id = $data['sid'];

include_once("./config.php");
$query= "delete from student where id = $student_id";

if(mysqli_query($conn,$query))
{
    echo json_encode(array('message'=>'Student DELETE SuccessFully','status'=>true));
}
else{
    echo json_encode(array('message'=>'Student Not DELETE Please Try Agian','status'=>false));
}

?>