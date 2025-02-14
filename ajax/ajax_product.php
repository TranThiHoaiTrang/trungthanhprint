<?php 
	include "ajax_config.php";

	/* Paginations */
	include LIBRARIES."class/class.PaginationsAjax.php";
	$pagingAjax = new PaginationsAjax();
	$pagingAjax->perpage = (htmlspecialchars($_GET['perpage']) && $_GET['perpage'] > 0) ? htmlspecialchars($_GET['perpage']) : 1;
	$eShow = htmlspecialchars($_GET['eShow']);

	$idList = (isset($_GET['idList']) && $_GET['idList'] > 0) ? htmlspecialchars($_GET['idList']) : 0;
	$idCat = (isset($_GET['idCat']) && $_GET['idCat'] > 0) ? htmlspecialchars($_GET['idCat']) : 0;
	$idItem = (isset($_GET['idItem']) && $_GET['idItem'] > 0) ? htmlspecialchars($_GET['idItem']) : 0;
	var_dump($_GET);
	//$namelist = $_GET['namelist'];//(isset($_GET['namelist']) && $_GET['namelist'] !='') ? htmlspecialchars($_GET['namelist']) : 0;

	$p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
	$start = ($p-1) * $pagingAjax->perpage;
	$pageLink = "ajax/ajax_product.php?perpage=".$pagingAjax->perpage;
	$tempLink = "";
	$where = "";

	/* Math url */
	if($idList)
	{
		$tempLink .= "&idList=".$idList;
		$where .= " and id_list = ".$idList;
	}
	if($idCat)
	{
		$tempLink .= "&idCat=".$idCat;
		$where .= " and id_cat = ".$idCat;
	}
	if($idItem)
	{
		$tempLink .= "&idItem=".$idItem;
		$where .= " and id_item = ".$idItem;
	}
	$tempLink .= "&p=";
	$pageLink .= $tempLink;

	/* Get data */
	$sql = "select ten$lang, tenkhongdauvi, id, photo, gia, giamoi, giakm, type, motangan$lang from #_product where type='san-pham' $where and noibat > 0 and hienthi > 0 order by stt,id desc";
	//$sqlCache = $sql." limit $start, $pagingAjax->perpage";
    $items = $cache->getCache($sql,'result',7200);

	/* Count all data */
	$countItems = count($cache->getCache($sql,'result',7200));

	/* Get page result */
	//$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);

	$namelist = $d->rawQueryOne("select ten$lang from #_product_cat where type = ? and id = ? and hienthi > 0",array('san-pham',$idCat));
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
					<?php if ($v['hot'] > 0) { ?>
						<span class="hethang">Hết hàng</span>
					<?php } ?>
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