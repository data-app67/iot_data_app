<?php

include 'database_connection.php';

include 'server_side\scripts\navbar.php';


$paramTable = $connect-> select('SELECT param_id, param_name FROM parameters WHERE param_is_cumulative=1');

$dataTable = $connect-> select('SELECT data, FROM_UNIXTIME(timestamp) AS timestamp, date(from_unixtime(timestamp)) as Date FROM iot_data GROUP by date;');

$cumulativeParameter = [];

foreach($dataTable as $data1){
    $colData = json_decode($data1['data']);
    foreach ($colData as $key => $value){
        foreach ($paramTable as $param){
                if ($param['param_id']==$key) {
                    $temp= array('param_id' => $param['param_id'],'param_name' => $param['param_name'],'value' => $value,'timestamp' => $data1['timestamp'],'Date' => $data1['Date']);
                    array_push($cumulativeParameter,$temp);
                }
            
            }
    }
}

$differentialsParameter = [];

foreach ($cumulativeParameter as $data2) {

    foreach ($cumulativeParameter as $data3) {

        if ($data2['Date']==$data3['Date']) {

            if (isset($differentialsParameter[$data3['Date']])) {
                if ($differentialsParameter[$data3['Date']]['Maximum']<$data3['value']) {

                    $differentialsParameter[$data3['Date']]['Maximum']=$data3['value'];
                     
                }
                if ($differentialsParameter[$data3['Date']]['Minimum']>$data3['value']) {

                    $differentialsParameter[$data3['Date']]['Minimum']=$data3['value'];
                        
                }
            }
            else{
                $temp2 = array('Maximum'=>$data3['value'], 'Minimum'=>$data3['value'],'Name'=>$data3['param_name'],'Date'=>$data3['Date']);
                $differentialsParameter[$data3['Date']]= $temp2;

            }
            
        }
    }
}

//echo '<pre>';
//print_r($differentialsParameter);
//echo '</pre>'

//echo json_encode($cumulativeParameter);


?>