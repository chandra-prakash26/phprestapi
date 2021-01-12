<?php

//header

header('Acsess-Control-Allow-Origin: *');
header('Content-Type: application/json');


//initializing api
include_once('../core/initialize.php');

//instatiate object
$objEmpProj = new EmployeeProject($db);

//blog post query
$result = $objEmpProj->read_emp_proj();

//get row count
$num = $result->rowCount();

if ($num > 0) {
    $post_arr = array();
    $post_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
            'empid' => $empid,
            'firstname' => $firstname,
            'projid' => $projid,
            'projname' => $projname
        );

        array_push($post_arr['data'], $post_item);
    }

    //convert to JSON and output
    echo json_encode($post_arr);
} else {
    echo json_encode(array('message' => 'No Post Found'));
}