<?php
	include "ajax_config.php";

    $idkhuyenmai = $_POST['idkhuyenmai'];
    $id = $_POST['id'];
    $d->rawQuery("update #_product set id_deal = '".$idkhuyenmai."' where id = '".$id."'");