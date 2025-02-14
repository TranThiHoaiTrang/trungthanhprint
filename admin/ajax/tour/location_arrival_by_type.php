<?php

global $d;
include dirname(__DIR__, 1) . "/ajax_config.php";

$_options = '<option value="">Địa điểm đến</option>';

$tour_type_id = $_POST['tour_type_id'] ?? 0;
if ( $tour_type_id ) {
    $sql = "select * from #_tour_location where hienthi = 1 and tour_type_id = ? order by stt,id desc";
    $tour_locations = $d->rawQuery($sql, [$tour_type_id]);

    if ( $tour_locations ) {
        foreach ( $tour_locations as $tour_location ) {
            $_options .= '<option value="' . $tour_location['id'] . '">' . $tour_location['tenvi'] . '</option>';
        }
    }
}

echo $_options;
