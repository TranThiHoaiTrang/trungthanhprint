<?php

global $d;
include dirname(__DIR__, 1) . "/ajax_config.php";

$tour_id = $_POST['tour_id'] ?? 0;
$passenger_class = $_POST['passenger-class'] ?? 0;
$passenger_date = $_POST['passenger-date'] ?? 0;
$passenger_price = $_POST['passenger-price'] ?? 0;
$passenger_price_discount = $_POST['passenger-price_discount'] ?? 0;

if ( $tour_id ) {

    $arr = [
        'tour_id' => $tour_id,
        'class_id' => $passenger_class,
        'trip_date' => strtotime( str_replace( '/', '-', $passenger_date ) ),
        'price' => $passenger_price,
        'price_discount' => $passenger_price_discount,
        'prop' => 'thoi_gian',
    ];

    $arr = $d->filter_data( 'tour_properties', $arr );
    if ( $d->insert( 'tour_properties', $arr ) ) {
        $id_insert = $d->getLastInsertId();

        echo $id_insert;
        die();
    }
}

echo 0;
die();