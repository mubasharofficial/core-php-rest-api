<?php
header('content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-HEADERS:Access-Control-Allow-Methods,content-Type,Authorization,X-Requested-With');
// X-Requested-With accept just ajax

$data = json_decode(file_get_contents('php://input'),true);
$student_name = $data['sname'];
$student_class = $data['sclass'];
include_once("./config.php");

$query= "INSERT INTO `student`(`name`, `class`) VALUES('$student_name','$student_class')";

if(mysqli_query($conn,$query))
{
    echo json_encode(array('message'=>'Student Register SuccessFully','status'=>true));

}
else{
    echo json_encode(array('message'=>'Student Not Register Please Try Agian','status'=>false));
}

?>