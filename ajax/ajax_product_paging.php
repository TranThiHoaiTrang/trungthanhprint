<?php
include "ajax_config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (htmlspecialchars($_GET['perpage']) && $_GET['perpage'] > 0) ? htmlspecialchars($_GET['perpage']) : 1;
$eShow = htmlspecialchars($_GET['eShow']);


//$namelist = $_GET['namelist'];//(isset($_GET['namelist']) && $_GET['namelist'] !='') ? htmlspecialchars($_GET['namelist']) : 0;

$p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
$id = (isset($_GET['id']) && $_GET['id'] != 0) ? htmlspecialchars($_GET['id']) : 0;
$idl = (isset($_GET['idl'])) ? (int)$_GET['idl'] : 0;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "ajax/ajax_product_paging.php?perpage=" . $pagingAjax->perpage;
$tempLink = "";
$where = "";
if ($id) {
	$tempLink .= "&idl=" . $id;
	$where = " and id_cat=" . $id;
}
if ($idl) {
	$tempLink .= "&idl=" . $idl;
	$where = " and id_cat=" . $idl;
}

$tempLink .= "&p=";
$pageLink .= $tempLink;

/* Get data */
$sql = "select * from #_product where type='san-pham' $where and noibat > 0 and hienthi > 0 order by stt,id desc";
$sqlCache = $sql . " limit $start, $pagingAjax->perpage";
$items = $cache->getCache($sqlCache, 'result', 7200);

/* Count all data */
$countItems = count($cache->getCache($sql, 'result', 7200));

/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow, $id);



?>
<?php if ($countItems) { ?>
	<div class="loadkhung_product1">
		<?php foreach ($items as $v) { ?>
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
						<?php
						if (!empty($v['giamoi'])) {
							$sale = abs(ceil((($v['gia'] / $v['giamoi']) * 100) - 100));
						?>
							<span class="batch">(-<?= $sale ?> %)</span>
						<?php } ?>
					</a>
				</div>
				<div class="all_content_sp">
					<a href="<?= $v['tenkhongdauvi'] ?>">
						<div class="name_sp text-split"><?= $v['ten' . $lang] ?></div>
					</a>
					<div class="gia_sp">
						<?php if (!empty($v['giamoi'])) { ?>
							<span><?= $func->format_money($v['giamoi']) ?></span>
							<div class="all_del">
								<del><?= $func->format_money($v['gia']) ?></del>
							</div>
						<?php } else { ?>
							<?php if ($v['gia']) { ?>
								<span><?= $func->format_money($v['gia']) ?></span>
							<?php } else { ?>
								<a href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']); ?>"><?= lienhe ?></a>
							<?php } ?>
						<?php } ?>
					</div>
					<div class="cart-product">
						<a href="<?= $v['tenkhongdauvi'] ?>" class="muangay_sp">Mua ngay</a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="pagination-ajax">
		<div class="pagination">
			<?= $pagingItems ?>
		</div>
	</div>
<?php } ?>