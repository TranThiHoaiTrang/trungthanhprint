<?php

global $d;
include dirname(__DIR__, 1) . "/ajax_config.php";

$id = $_POST['id'];

if ( $id ) {

    $item = $d->get_by_id( 'tour_properties', $id );
    if ( $item ) {
        $d->rawQuery("delete from #_tour_properties where id = ?", [ $item['id'] ]);
    }
}

die();