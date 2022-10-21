<?php

include 'server_side\scripts\navbar.php';

include 'database_connection.php';

$paramTable = $connect-> select('SELECT param_id, param_name FROM parameters WHERE param_is_cumulative=1');

$dataTable = $connect-> select('SELECT data,FROM_UNIXTIME(timestamp) as timestamp FROM iot_data');

$cumulativeParameter = [];

foreach($dataTable as $data1){
    $colData = json_decode($data1['data']);
        foreach ($colData as $key => $value){
            foreach ($paramTable as $param){
                if ($param['param_id']==$key) {
                    $temp= array('param_id' => $param['param_id'],'param_name' => $param['param_name'],'value' => $value,'timestamp' => $data1['timestamp']);
                    array_push($cumulativeParameter,$temp);
                }
            
            }
    }
}

//echo json_encode($cumulativeParameter);


?>