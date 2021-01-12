<?php

//header

header('Acsess-Control-Allow-Origin: *');
header('Content-Type: application/json');


//initializing api
include_once('../core/initialize.php');

//instatiate project
$objProj = new Project($db);

//blog project query
$result = $objProj->read_proj();

//get row count
$num = $result->rowCount();

if ($num > 0) {
    $post_arr = array();
    $post_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
            'projname' => $projname,
            'projdesc' => $projdesc,
            'projstartdate' => $projstartdate,
            'projenddate' => $projenddate
        );

        array_push($post_arr['data'], $post_item);
    }

    //convert to JSON and output
    echo json_encode($post_arr);
} else {
    echo json_encode(array('message' => 'No Post Found'));
}