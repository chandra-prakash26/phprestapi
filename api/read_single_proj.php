<?php

//header

header('Acsess-Control-Allow-Origin: *');
header('Content-Type: application/json');


//initializing api
include_once('../core/initialize.php');

//instatiate project
$objProj = new Project($db);

$objProj->projid = isset($_GET['projid']) ? $_GET['projid'] : die();
$objProj->read_single_proj();

$post_arr = array(
    'projname' => $projname,
    'projdesc' => $projdesc,
    'projstartdate' => $projstartdate,
    'projenddate' => $projenddate
);

//make a json

print_r(json_encode($post_arr));