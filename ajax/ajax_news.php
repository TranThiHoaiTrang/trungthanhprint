<?php
include "ajax_config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (htmlspecialchars($_GET['perpage']) && $_GET['perpage'] > 0) ? htmlspecialchars($_GET['perpage']) : 1;
$eShow = htmlspecialchars($_GET['eShow']);


//$namelist = $_GET['namelist'];//(isset($_GET['namelist']) && $_GET['namelist'] !='') ? htmlspecialchars($_GET['namelist']) : 0;
$id = (isset($_GET['id']) && $_GET['id'] != '') ? (int)$_GET['id'] : 0;
$idl = (isset($_GET['idl']) && $_GET['idl'] != '') ? (int)$_GET['idl'] : 0;
// var_dump($_GET);
$p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "ajax/ajax_news.php?perpage=" . $pagingAjax->perpage;
$tempLink = "";

/* Math url */
if ($id) {
	$tempLink .= "&idl=" . $id;
	$where = " and id_product = '" . $id . "'";
}
if ($idl) {
	$tempLink .= "&idl=" . $idl;
	$where = " and id_product = '" . $idl . "'";
}
$tempLink .= "&p=";
$pageLink .= $tempLink;
// var_dump($where);

/* Get data */
$sql = "select * from #_rating where type='rating' $where and hienthi > 0 order by stt,id desc";
$sqlCache = $sql . " limit $start, $pagingAjax->perpage";
$rating = $d->rawQuery($sqlCache);

/* Count all data */
$countItems = count($d->rawQuery($sql));

/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);

$row_detail = $d->rawQueryOne("select * from #_product where id = ? and type = 'san-pham' and hienthi > 0 limit 0,1", array($id));
// var_dump($row_detail['id']);
?>
<?php if ($countItems) { ?>
	<div class="all_rating" data-id="<?= $row_detail['id'] ?>">
		<?php
		foreach ($rating as $v) { ?>
			<div class="rating">
				<!-- <div class="img_rating">
					<img src="./assets/images/nguoidung.png" alt="" width="36" height="36">
				</div> -->
				<div class="all_noidung_rating">
					<div class="name_date_rating">
						<div class="name_rating"><?= $v['ten'] ?></div>
						<div class="date_rating"><?= date("d/m/Y", $v['ngaytao']) ?> lúc <?= date("h:i", $v['ngaytao']) ?></div>
					</div>
					<div class="rating-system_top">
						<div class="rating--inner-top " data-id="<?= $row_detail['id'] ?>">
							<div class="rating">
								<ul>
									<li data-star="5"><i class="fal fa-star"></i></li>
									<li data-star="4"><i class="fal fa-star"></i></li>
									<li data-star="3"><i class="fal fa-star"></i></li>
									<li data-star="2"><i class="fal fa-star"></i></li>
									<li data-star="1"><i class="fal fa-star"></i></li>
								</ul>
								<span style="width:<?= $func->get_phantram_rating_people($v['id']) ?>%;"></span>
							</div>
						</div>
					</div>
					<div class="noidung_rating">
						<?= htmlspecialchars_decode($v['noidung']) ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="paging_ajax">
		<?= $pagingItems ?>
	</div>
<?php } ?>

