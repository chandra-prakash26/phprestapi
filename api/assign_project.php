<?php

//header

header('Acsess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

//initializing api
include_once('../core/initialize.php');

//instatiate object
$objEmpProj = new EmployeeProject($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));

$objEmpProj->empid = $data->empid;
$objEmpProj->projid = $data->projid;

//create post

if($objEmpProj->assign_project())
{
    echo json_encode(array('message' => 'Project Assigned.', 'status'=>true));
} else {
    echo json_encode(array('message' => 'Project Not Assigned.', 'status'=>false));
}