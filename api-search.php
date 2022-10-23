<?php
header('content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-HEADERS:Access-Control-Allow-Methods,content-Type,Authorization,X-Requested-With');
// X-Requested-With accept just ajax

$data = json_decode(file_get_contents('php://input'),true);
$search = $data['search'];
include_once("./config.php");

$query= "select *from Student where id= '$search' or name like '$search'or class like '$search' ";

$result = mysqli_query($conn,$query) or die("query failed to run");

if(mysqli_num_rows($result)>0)
{
    $output= mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
echo json_encode(array('message'=>'No Record Found','status'=>false));
}

?>