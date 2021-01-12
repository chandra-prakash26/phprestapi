<?php

//header

header('Acsess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

//initializing api
include_once('../core/initialize.php');

//instatiate objEmp
$objEmp = new Employee($db);

//get raw objEmped data
$data = json_decode(file_get_contents("php://input"));

$objEmp->empid = $data->empid;

//create objEmp

if($objEmp->delete_emp())
{
    echo json_encode(array('message' => 'Employee Details Deleted.', 'status'=>true));
} else {
    echo json_encode(array('message' => 'Employee Details Not Deleted.', 'status'=>false));
}