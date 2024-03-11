<?php 

$dbDetails = array( 
    'host' => '127.0.0.1', 
    'db'   => 'mecanica_rubio', 
    'user' => 'marcos', 
    'pass' => 'Tucm+1985', 
); 
    
$table = 'services_view';
$primaryKey = 'id';
    
$columns = [
    ['db' => 'id',                'dt' => 'id'],
    ['db' => 'client_id',         'dt' => 'client_id'],
    ['db' => 'client',            'dt' => 'client'],
    ['db' => 'car_id',            'dt' => 'car_id'],
    ['db' => 'car',               'dt' => 'car'],
    ['db' => 'fault',             'dt' => 'fault'],
    ['db' => 'created_at',        'dt' => 'created_at'],
    ['db' => 'total',             'dt' => 'total'],
    ['db' => 'status',            'dt' => 'status'],
    []
];

require 'ssp.class.php';

$whereAll = null;

if ($_GET['status'] != 'Todos'){
    $whereAll .= "status = '". $_GET['status'] ."'";
}

if ( !empty($_GET['startDate']) && !empty($_GET['endDate']) ){

    if ($_GET['status'] != 'Todos'){
        $whereAll .= ' AND ';
    }

    $whereAll .= "created_at BETWEEN '".$_GET['startDate']."' AND '". $_GET['endDate'] ."'";   
}

echo json_encode(
    SSP::complex( $_GET, $dbDetails, $table, $primaryKey, $columns, $whereResult, $whereAll)
);