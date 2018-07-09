<?php

$table = 'person';

$primaryKey = 'NIPEG';

$columns = array(
    array( 'db' => 'NIPEG', 'dt' => 0 ),
    array( 'db' => 'NIPEG',  'dt' => 1 ),
    array( 'db' => 'NAMA',   'dt' => 2 ),
    array(
        'db'        => 'TGLLAHIR',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return date( 'd M Y', strtotime($d));
        }
    ),
    array(
        'db'        => 'TMTKERJA',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
            return date( 'd M Y', strtotime($d));
        }
    ),
    array( 'db' => 'E_MAIL',     'dt' => 5 ),
    array( 'db' => 'KODPEN',     'dt' => 6 ),
    array( 'db' => 'STSPEG',     'dt' => 7 ),
    array( 'db' => 'KDKRJ',     'dt' => 8 ),
    array( 'db' => 'IDJOB',     'dt' => 9 ),
    array( 'db' => 'NIPEG_UP',     'dt' => 10 ),
    array( 'db' => 'PANGKAT',     'dt' => 11 ),
    array( 'db' => 'P_NILAI',     'dt' => 12 ),
    array( 'db' => 'K_NILAI',     'dt' => 13 ),
    array( 'db' => 'STATUS_PK',     'dt' => 14 ),
    array(
        'db'        => 'PK_UPDATE',
        'dt'        => 15,
        'formatter' => function( $d, $row ) {
            if($d == '0000-00-00 00:00:00') {
               return '';
            } else {
               return date( 'j-M-Y H:i:s ', strtotime($d));
            }
        }
    )

);

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'cakra',
    'host' => 'localhost'
);

require( '../assets/DataTables/ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
