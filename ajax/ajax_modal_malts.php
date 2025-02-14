<?php
include "ajax_config.php";
// var_dump($_POST['id']);
$id = (isset($_POST['id']) && $_POST['id'] > 0) ? htmlspecialchars($_POST['id']) : 0;
$type = (isset($_POST['type'])) ? htmlspecialchars($_POST['type']) : '';


$malts_one = $d->rawQueryOne("select * from #_product where type = '$type' and id = '" . $id . "' and hienthi > 0 order by stt,id desc");

$hinhanhsp = explode(',', $malts_one['gallery']);
// var_dump($hinhanhsp);
?>

<?php if ($malts_one) { ?>
	<div class="all_modal_malts">
		<div class="all_img_modal_malts">
			<div class="owl-carousel owl-theme owl-thumb-pro">
				<?= Helper::the_thumbnail($malts_one['photo'], 380, 380, '', $malts_one['ten' . $lang], true) ?>
				<?php foreach ($hinhanhsp as $v) { ?>
					<?= Helper::the_thumbnail($v, 380, 380, '', $malts_one['ten' . $lang], true) ?>
				<?php } ?>
			</div>
		</div>
		<div class="all_content_modal_malts">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Base Malts Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-analyses-tab" data-toggle="pill" href="#pills-analyses" role="tab" aria-controls="pills-analyses" aria-selected="false">Analyses</a>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					<div class="content_malts">
						<a href="<?= $malts_one['tenkhongdauvi'] ?>">
							<div class="name_mota_malts">
								<div class="noidung_malts"><?= htmlspecialchars_decode($malts_one['noidung' . $lang]) ?></div>
							</div>
						</a>
					</div>

				</div>
				<div class="tab-pane fade" id="pills-analyses" role="tabpanel" aria-labelledby="pills-analyses-tab">
					<div class="content_analyses">
						<div class="noidung_analyses">
							<?= htmlspecialchars_decode($malts_one['thongso' . $lang]) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>