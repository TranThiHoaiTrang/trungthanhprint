<?php

global $d, $k;
include dirname(__DIR__, 1) . "/ajax_config.php";

$_options = '<option value="" data-default>No selection</option>';

$k = $k ?? 'vi';
$loc_id = $_POST['loc_id'] ?? 0;
if ( $loc_id ) {

    $_menus = new Menu( $d, $k, $loc_id);
    $_options = $_menus->getOptions( null, 'ten' . $k );
}

echo $_options;
