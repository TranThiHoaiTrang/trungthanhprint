<?php

global $d;
include dirname(__DIR__, 1) . "/ajax_config.php";

$id = $_POST['id'] ?? 0;

$tour_id = $_POST['tour_id'] ?? 0;
$passenger_ten = $_POST['passenger-ten'] ?? '';
$passenger_class = $_POST['passenger-class'] ?? 0;
$passenger_min = $_POST['passenger-min'] ?? 0;
$passenger_max = $_POST['passenger-max'] ?? 0;
$passenger_flight = $_POST['passenger-flight'] ?? '';
$passenger_date = $_POST['passenger-date'] ?? 0;
$passenger_price = $_POST['passenger-price'] ?? 0;
$passenger_price_discount = $_POST['passenger-price_discount'] ?? 0;
$passenger_price_chd = $_POST['passenger-price_chd'] ?? 0;
$passenger_price_inf = $_POST['passenger-price_inf'] ?? 0;

$qty_remaining = $_POST['qty_remaining'] ?? -1;
$prop_content = $_POST['prop_content'] ?? '';

if ( $tour_id ) {
    $arr = [
        'tour_id' => $tour_id,
        'tenvi' => $passenger_ten,
        'class_id' => $passenger_class,
        'min' => $passenger_min,
        'max' => $passenger_max,
        'trip_date' => strtotime( str_replace( '/', '-', $passenger_date ) ),
        'flight' => $passenger_flight,
        'price' => $passenger_price,
        'price_discount' => $passenger_price_discount,
        'price_chd' => $passenger_price_chd,
        'price_inf' => $passenger_price_inf,
        'qty_remaining' => $qty_remaining,
        'prop_content' => $prop_content,
    ];

    $arr = $d->filter_data( 'tour_properties', $arr );

    if ( $id ) {
        $d->where('id', $id);
        $d->update('tour_properties', $arr);
        echo $id;
        die();

    } else {

        if ( $d->insert( 'tour_properties', $arr ) ) {
            $id_insert = $d->getLastInsertId();
            echo $id_insert;
            die();
        }
    }
}

echo 0;
die();