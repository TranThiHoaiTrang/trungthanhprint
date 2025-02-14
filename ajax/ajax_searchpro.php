<?php
include "ajax_config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = 20;
$eShow = '.all_sp_search';

$listpr = $_POST['idlist'] ?? 0;
$brandpro = $_POST['brandpro'] ?? 0;
$khoanggia = $_POST['khoanggia'] ?? '';
$list_check = $_POST['list_check'] ?? 0;
$type = $_POST['type'] ?? '';
// var_dump($brandpro);

$listpr_p = $_GET['listpr'];
$brandpro_p = $_GET['brandpro'];
$color_p = $_GET['color'];
$khoanggia_p = $_GET['khoanggia'];
$list_check_p = $_GET['list_check'];
$type_p = $_POST['type'] ?? '';

if (!empty($listpr) || !empty($catpro) || !empty($color) || !empty($khoanggia) || !empty($list_check) || !empty($type) || !empty($listpr_p) || !empty($brandpro_p)  || !empty($khoanggia_p) || !empty($list_check_p) || !empty($type_p)) {
	if ($listpr) {
		$per .= "&listpr=$listpr";
	}
	if ($brandpro) {
		$per .= "&brandpro=$brandpro";
	}
	if ($khoanggia) {
		$per .= "&khoanggia=$khoanggia";
	}
	if ($type) {
		$per .= "&type=$type";
	}
	if ($list_check) {
		$per .= "&list_check=$list_check";
	}
	if ($listpr_p) {
		$per .= "&listpr=$listpr_p";
	}
	if ($brandpro_p) {
		$per .= "&brandpro=$brandpro_p";
	}
	if ($khoanggia_p) {
		$per .= "&khoanggia=$khoanggia_p";
	}
	if ($type_p) {
		$per .= "&type=$type_p";
	}
	if ($list_check_p) {
		$per .= "&list_check=$list_check_p";
	}
	// $per .= $per;
	$per = "?perpage=" . $pagingAjax->perpage . $per;
} else {
	$per = "?perpage=" . $pagingAjax->perpage;
}

$p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "ajax/ajax_searchpro.php" . $per;
$tempLink = "";
$where = "";


$tempLink .= "&p=";
$pageLink .= $tempLink;


if ($list_check) {
	$id_list = "and id_list = '" . $list_check . "'";
} elseif ($listpr) {
	$id_list = "and id_list = '" . $listpr . "'";
}

if ($brandpro) {
	$id_brand = "and id_brand = '" . $brandpro . "'";
}
if ($khoanggia) {
	$pr = explode(';', $khoanggia);
	$price_text = " and IF (giamoi > 0, giamoi >= " . $pr[0] . " AND giamoi <= " . $pr[1] . ", gia >= " . $pr[0] . " AND gia <= " . $pr[1] . " )";
}
if ($type) {
	$type_text = "type = '" . $type . "'";
}

if ($list_check_p) {
	$id_list = "and id_list = '" . $list_check_p . "'";
} elseif ($listpr_p) {
	$id_list = "and id_list = '" . $listpr_p . "'";
}

if ($brandpro_p) {
	$id_brand = "and id_brand = '" . $brandpro_p . "'";
}
if ($price_p) {
	$pr = explode(';', $price_p);
	$price_text = " and IF (giamoi > 0, giamoi >= " . $pr[0] . " AND giamoi <= " . $pr[1] . ", gia >= " . $pr[0] . " AND gia <= " . $pr[1] . " )";
}
if ($type_p) {
	$type_text = "type = '" . $type_p . "'";
}

$where = $id_list . $id_brand . $price_text;
// var_dump($where);
/* Get data */
$sql = "select * from #_product where $type_text $where and hienthi > 0 order by stt,id desc";
// var_dump($sql);
$sqlCache = $sql . " limit $start, $pagingAjax->perpage";
$product = $d->rawQuery($sqlCache);

// var_dump($product);

$countItems = count($d->rawQuery($sql));
/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);


?>
<?php if ($product) { ?>
	<!-- <div class="tatsasp">Tất cả: <?= $countItems ?> Sản phẩm</div> -->
	<div class="loadkhung_product1 mainkhung_product">
		<?php foreach ($product as $k => $v) { ?>
			<div class="all_sp_banchay_index">
				<div class="all_img_sp_bc">
					<a href="<?= $v['tenkhongdauvi'] ?>">
						<div class="img_sp_bc">
							<div>
								<?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
							</div>
							<?php
							$single_gallery = $v['gallery'];
							$gallery = explode(',', $single_gallery);
							$img2 = $gallery[0];
							if ($img2) {
							?>
								<div class="img_sp_2">
									<?= Helper::the_thumbnail($img2, '', $v['ten' . $lang], true) ?>
								</div>
							<?php } else { ?>
								<div class="img_sp_2">
									<?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
								</div>
							<?php } ?>
						</div>
					</a>
				</div>
				<div class="all_content_sp">
					<a href="<?= $v['tenkhongdauvi'] ?>">
						<div class="name_sp text-split"><?= $v['ten' . $lang] ?></div>
					</a>
					<div class="gia_sp">
						<?php if (!empty($v['giathitruong'])) { ?>
							<span><?= $func->format_money($v['gia']) ?></span>
							<div class="all_del">
								<del><?= $func->format_money($v['giathitruong']) ?></del>
								<?php
								if (!empty($v['giathitruong'])) {
									$sale = abs(ceil((($v['gia'] / $v['giathitruong']) * 100) - 100));
								?>
									<span class="batch">(-<?= $sale ?> %)</span>
								<?php } ?>
							</div>
						<?php } else { ?>
							<?php if ($v['gia']) { ?>
								<span><?= $func->format_money($v['gia']) ?></span>
							<?php } else { ?>
								<a href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']); ?>"><?= lienhe ?></a>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="paging_ajax mb-4">
		<?= $pagingItems ?>
	</div>
<?php } ?>
<!-- </?php echo($sqlCache); die();?> -->