<?php

include 'database_connection.php';

include 'server_side\scripts\navbar.php';

$paramTable = $connect-> select('SELECT param_id, param_name FROM parameters WHERE param_is_cumulative=1');

$groupDataTable = $connect-> select('SELECT data , FROM_UNIXTIME(timestamp) AS timestamp, date(from_unixtime(timestamp)) as Date FROM iot_data GROUP by date');

$groupedCumulativeParameter = [];

foreach($groupDataTable as $data2){
    $colData = json_decode($data2['data']);
        foreach ($colData as $key => $value){
            foreach ($paramTable as $param){
                if ($param['param_id']==$key) {
                    $temp= array('param_id' => $param['param_id'],'param_name' => $param['param_name'],'value' => $value,'timestamp' => $data2['timestamp']);
                    array_push($groupedCumulativeParameter,$temp);
                    
                }
            
            }
    }
}

//echo json_encode($cumulativeParameter);


?>