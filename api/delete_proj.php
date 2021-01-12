<?php

//header

header('Acsess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

//initializing api
include_once('../core/initialize.php');

//instatiate project
$objProj = new Project($db);

//get raw project data
$data = json_decode(file_get_contents("php://input"));

$objProj->projid = $data->projid;

//delete project

if($objProj->delete_proj())
{
    echo json_encode(array('message' => 'Projects Details Deleted.', 'status'=>true));
} else {
    echo json_encode(array('message' => 'Projects Details Not Deleted.', 'status'=>false));
}