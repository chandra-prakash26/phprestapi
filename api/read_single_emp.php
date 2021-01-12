<?php

//header

header('Acsess-Control-Allow-Origin: *');
header('Content-Type: application/json');


//initializing api
include_once('../core/initialize.php');

//instatiate post
$objEmp = new Employee($db);

$objEmp->empid = isset($_GET['empid']) ? $_GET['empid'] : die();
$objEmp->read_single_emp();

$objEmp_arr = array(
    'empid' => $objEmp->empid,
    'firstname' => $objEmp->firstname,
    'lastname' => $objEmp->lastname,
    'mobileno' => $objEmp->mobileno,
    'dob' => $objEmp->dob,
    'gender' => $objEmp->gender,
    'city' => $objEmp->city,
    'hobby' => $objEmp->hobby
);

//make a json

print_r(json_encode($objEmp_arr));