<?php

//header

header('Acsess-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

//initializing api
include_once('../core/initialize.php');

//instatiate project
$objProj = new Project($db);

//get raw project data
$data = json_decode(file_get_contents("php://input"));

$objProj->projname = $data->projname;
$objProj->projdesc = $data->projdesc;
$objProj->projstartdate = $data->projstartdate;
$objProj->projenddate = $data->projenddate;
$objProj->projid = $data->projid;

//create post

if($objProj->update_proj())
{
    echo json_encode(array('message' => 'Project Details Updated.', 'status'=>true));
} else {
    echo json_encode(array('message' => 'Project Details Not Updated.', 'status'=>false));
}