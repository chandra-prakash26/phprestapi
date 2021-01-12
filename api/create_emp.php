<?php

//header

header('Acsess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

//initializing api
include_once('../core/initialize.php');

//instatiate objEmp
$objEmp = new Employee($db);

//get raw objEmped data
$data = json_decode(file_get_contents("php://input"));

$objEmp->firstname = $data->firstname;
$objEmp->lastname = $data->lastname;
$objEmp->mobileno = $data->mobileno;
$objEmp->dob = $data->dob;
$objEmp->gender = $data->gender;
$objEmp->city = $data->city;
$objEmp->hobby = $data->hobby;

//create objEmp

if($objEmp->create_emp())
{
    echo json_encode(array('message' => 'Employee Details Inserted.', 'status'=>true));
} else {
    echo json_encode(array('message' => 'Employee Details Not Inserted.', 'status'=>false));
}