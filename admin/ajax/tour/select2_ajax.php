<?php

global $d;
include dirname(__DIR__, 1) . "/ajax_config.php";

$table = $_POST['table'] ?? '';
$q = $_POST['q'] ?? '';
$page = $_POST['page'] ?? 1;
$ignore = $_POST['ignore'] ?? '';

$target = $_POST['target'] ?? '';
$targetvalue = $_POST['targetvalue'] ?? '';

$where = "hienthi = 1";
if ( $ignore ) {
    $where .= " AND ( $ignore = 0 OR $ignore IS NULL )";
}

if ( $target && $targetvalue ) {
    $where .= " AND " . $target . ' = ' . $targetvalue;
}

if ( $q ) {
    $keyword = mb_strtolower( $q );
    $where .= " AND ( LOWER(tenvi) LIKE '%$keyword%' OR LOWER(tenen) LIKE '%$keyword%')";
}

$sql = "SELECT * FROM #_{$table} WHERE $where ORDER BY stt, id DESC";
$items = $d->rawQuery($sql);

$total = count($items) ?: 0;

$result['total_count'] = $total;
foreach ( $items as $item ) {
    $result['items'][] = [
        'id' => $item['id'],
        'title' => $item['tenvi'],
        'text' => $item['tenvi'],
    ];
}

echo json_encode($result);
