<?php
function get_mau($id = 0)
{
	global $d, $type;

	if ($id) {
		$temps = $d->rawQueryOne("select id_mau from #_product where id = ? and type = ? limit 0,1", array($id, $type));
		$arr_mau = explode(',', $temps['id_mau']);

		for ($i = 0; $i < count($arr_mau); $i++) $temp[$i] = $arr_mau[$i];
	}

	$row_mau = $d->rawQuery("select tenvi, id from #_product_mau where type = ? order by stt,id desc", array($type));

	$str = '<select id="mau_group" name="mau_group[]" class="form-control select2" multiple>';
	$str .= '<option value="0"> Chọn Màu</option>';
	for ($i = 0; $i < count($row_mau); $i++) {
		if (isset($temp) && count($temp) > 0) {
			if (in_array($row_mau[$i]['id'], $temp)) $selected = 'selected="selected"';
			else $selected = '';
		} else {
			$selected = '';
		}
		$str .= '<option value="' . $row_mau[$i]["id"] . '" ' . $selected . ' > ' . $row_mau[$i]["tenvi"] . '</option>';
	}
	$str .= '</select>';

	return $str;
}

function get_size($id = 0)
{
	global $d, $type;

	if ($id) {
		$temps = $d->rawQueryOne("select id_size from #_product where id = ? and type = ? limit 0,1", array($id, $type));
		$arr_size = explode(',', $temps['id_size']);

		for ($i = 0; $i < count($arr_size); $i++) $temp[$i] = $arr_size[$i];
	}

	$row_size = $d->rawQuery("select tenvi, id from #_product_size where type = ? order by stt,id desc", array($type));

	$str = '<select id="size_group" name="size_group[]" class="form-control select2" multiple>';
	$str .= '<option value="0"> Chọn Size</option>';
	for ($i = 0; $i < count($row_size); $i++) {
		if (isset($temp) && count($temp) > 0) {
			if (in_array($row_size[$i]['id'], $temp)) $selected = 'selected="selected"';
			else $selected = '';
		} else {
			$selected = '';
		}
		$str .= '<option value="' . $row_size[$i]["id"] . '" ' . $selected . ' > ' . $row_size[$i]["tenvi"] . '</option>';
	}
	$str .= '</select>';

	return $str;
}
function get_doday($id = 0)
{
	global $d, $type;

	if ($id) {
		$temps = $d->rawQueryOne("select id_doday from #_product where id = ? and type = ? limit 0,1", array($id, $type));
		$arr_doday = explode(',', $temps['id_doday']);

		for ($i = 0; $i < count($arr_doday); $i++) $temp[$i] = $arr_doday[$i];
	}

	$row_doday = $d->rawQuery("select tenvi, id from #_product_doday where type = ? order by stt,id desc", array($type));

	$str = '<select id="doday_group" name="doday_group[]" class="form-control select2" multiple>';
	$str .= '<option value="0"> Chọn bảo hành</option>';
	for ($i = 0; $i < count($row_doday); $i++) {
		if (isset($temp) && count($temp) > 0) {
			if (in_array($row_doday[$i]['id'], $temp)) $selected = 'selected="selected"';
			else $selected = '';
		} else {
			$selected = '';
		}
		$str .= '<option value="' . $row_doday[$i]["id"] . '" ' . $selected . ' > ' . $row_doday[$i]["tenvi"] . '</option>';
	}
	$str .= '</select>';

	return $str;
}
function get_chatlieu($id = 0)
{
	global $d, $type;

	if ($id) {
		$temps = $d->rawQueryOne("select id_chatlieu from #_product where id = ? and type = ? limit 0,1", array($id, $type));
		$arr_chatlieu = explode(',', $temps['id_chatlieu']);

		for ($i = 0; $i < count($arr_chatlieu); $i++) $temp[$i] = $arr_chatlieu[$i];
	}

	$row_chatlieu = $d->rawQuery("select tenvi, id from #_product_chatlieu where type = ? order by stt,id desc", array($type));

	$str = '<select id="chatlieu_group" name="chatlieu_group[]" class="form-control select2" multiple>';
	$str .= '<option value="0"> Chọn chất liệu</option>';
	for ($i = 0; $i < count($row_chatlieu); $i++) {
		if (isset($temp) && count($temp) > 0) {
			if (in_array($row_chatlieu[$i]['id'], $temp)) $selected = 'selected="selected"';
			else $selected = '';
		} else {
			$selected = '';
		}
		$str .= '<option value="' . $row_chatlieu[$i]["id"] . '" ' . $selected . ' > ' . $row_chatlieu[$i]["tenvi"] . '</option>';
	}
	$str .= '</select>';

	return $str;
}
function get_loaivai($id = 0)
{
	global $d, $type;

	if ($id) {
		$temps = $d->rawQueryOne("select id_loaivai from #_product where id = ? and type = ? limit 0,1", array($id, $type));
		$arr_loaivai = explode(',', $temps['id_loaivai']);

		for ($i = 0; $i < count($arr_loaivai); $i++) $temp[$i] = $arr_loaivai[$i];
	}

	$row_loaivai = $d->rawQuery("select tenvi, id from #_product_loaivai where type = ? order by stt,id desc", array($type));

	$str = '<select id="loaivai_group" name="loaivai_group[]" class="form-control select2" multiple>';
	$str .= '<option value="0"> Chọn môn học</option>';
	for ($i = 0; $i < count($row_loaivai); $i++) {
		if (isset($temp) && count($temp) > 0) {
			if (in_array($row_loaivai[$i]['id'], $temp)) $selected = 'selected="selected"';
			else $selected = '';
		} else {
			$selected = '';
		}
		$str .= '<option value="' . $row_loaivai[$i]["id"] . '" ' . $selected . ' > ' . $row_loaivai[$i]["tenvi"] . '</option>';
	}
	$str .= '</select>';

	return $str;
}
function get_muavu($id = 0)
{
	global $d, $type;

	if ($id) {
		$temps = $d->rawQueryOne("select id_muavu from #_product where id = ? and type = ? limit 0,1", array($id, $type));
		$arr_muavu = explode(',', $temps['id_muavu']);

		for ($i = 0; $i < count($arr_muavu); $i++) $temp[$i] = $arr_muavu[$i];
	}

	$row_muavu = $d->rawQuery("select tenvi, id from #_product_muavu where type = ? order by stt,id desc", array($type));

	$str = '<select id="muavu_group" name="muavu_group[]" class="form-control select2">';
	$str .= '<option value="0"> Chọn trường</option>';
	for ($i = 0; $i < count($row_muavu); $i++) {
		if (isset($temp) && count($temp) > 0) {
			if (in_array($row_muavu[$i]['id'], $temp)) $selected = 'selected="selected"';
			else $selected = '';
		} else {
			$selected = '';
		}
		$str .= '<option value="' . $row_muavu[$i]["id"] . '" ' . $selected . ' > ' . $row_muavu[$i]["tenvi"] . '</option>';
	}
	$str .= '</select>';

	return $str;
}

function get_alldanhmuc($id = 0)
{
	global $d, $type;

	if ($id) {
		$temps = $d->rawQueryOne("select id_danhmuc from #_product where id = ? and type = ? limit 0,1", array($id, $type));
		$arr_danhmuc = explode('|', $temps['id_danhmuc']);

		for ($i = 0; $i < count($arr_danhmuc); $i++) $temp[$i] = $arr_danhmuc[$i];
	}

	$row_danhmuc = $d->rawQuery("select tenvi, id from #_product_danhmuc where type = ? order by stt,id desc", array($type));

	$str = '<select id="danhmuc_group" name="danhmuc_group[]" class="form-control select2" multiple>';
	$str .= '<option value="0"> Chọn danh mục</option>';
	for ($i = 0; $i < count($row_danhmuc); $i++) {
		if (isset($temp) && count($temp) > 0) {
			if (in_array($row_danhmuc[$i]['id'], $temp)) $selected = 'selected="selected"';
			else $selected = '';
		} else {
			$selected = '';
		}
		$str .= '<option value="' . $row_danhmuc[$i]["id"] . '" ' . $selected . ' > ' . $row_danhmuc[$i]["tenvi"] . '</option>';
	}
	$str .= '</select>';

	return $str;
}
function get_alldanhmuc_cap($id = 0)
{
	global $d, $type;

	if ($id) {
		$temps = $d->rawQueryOne("select id_danhmuc_cap from #_product where id = ? and type = ? limit 0,1", array($id, $type));
		$arr_danhmuc_cap = explode('|', $temps['id_danhmuc_cap']);

		for ($i = 0; $i < count($arr_danhmuc_cap); $i++) $temp[$i] = $arr_danhmuc_cap[$i];
	}

	$row_danhmuc_cap = $d->rawQuery("select tenvi, id from #_product_danhmuc_cap where type = ? order by stt,id desc", array($type));

	$str = '<select id="danhmuc_cap_group" name="danhmuc_cap_group[]" class="form-control select2" multiple>';
	$str .= '<option value="0"> Chọn danh mục cấp</option>';
	for ($i = 0; $i < count($row_danhmuc_cap); $i++) {
		if (isset($temp) && count($temp) > 0) {
			if (in_array($row_danhmuc_cap[$i]['id'], $temp)) $selected = 'selected="selected"';
			else $selected = '';
		} else {
			$selected = '';
		}
		$str .= '<option value="' . $row_danhmuc_cap[$i]["id"] . '" ' . $selected . ' > ' . $row_danhmuc_cap[$i]["tenvi"] . '</option>';
	}
	$str .= '</select>';

	return $str;
}

if ($act == "add") $labelAct = "Thêm mới";
else if ($act == "edit") $labelAct = "Chỉnh sửa";
else if ($act == "copy")  $labelAct = "Sao chép";

$linkMan = "index.php?com=product&act=man&type=" . $type . "&p=" . $curPage;
if ($act == 'add') $linkFilter = "index.php?com=product&act=add&type=" . $type . "&p=" . $curPage;
else if ($act == 'edit') $linkFilter = "index.php?com=product&act=edit&type=" . $type . "&p=" . $curPage . "&id=" . $id;
if ($act == "copy") $linkSave = "index.php?com=product&act=save_copy&type=" . $type . "&p=" . $curPage;
else $linkSave = "index.php?com=product&act=save&type=" . $type . "&p=" . $curPage;

/* Check cols */
if (isset($config['product'][$type]['gallery']) && count($config['product'][$type]['gallery']) > 0) {
	foreach ($config['product'][$type]['gallery'] as $key => $value) {
		if ($key == $type) {
			$flagGallery = true;
			break;
		}
	}
}

if ((isset($config['product'][$type]['dropdown']) && $config['product'][$type]['dropdown'] == true) || (isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true) || (isset($config['product'][$type]['tags']) && $config['product'][$type]['tags'] == true) || (isset($config['product'][$type]['mau']) && $config['product'][$type]['mau'] == true) || (isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true) || (isset($config['product'][$type]['images']) && $config['product'][$type]['images'] == true)) {
	$colLeft = "col-xl-8 left_content align-self-start";
	$colRight = "col-xl-4 right_content align-self-start";
} else {
	$colLeft = "col-12";
	$colRight = "d-none";
}
?>
<!-- Content Header -->
<section class="content-header text-sm">
	<div class="container-fluid">
		<div class="row">
			<ol class="breadcrumb float-sm-left">
				<li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
				<li class="breadcrumb-item active"><?= $labelAct ?> <?= $config['product'][$type]['title_main'] ?></li>
			</ol>
		</div>
	</div>
</section>

<!-- Main content -->
<section class="content">
	<form class="validation-form" novalidate method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
		<div class="card-footer text-sm sticky-top">
			<button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
			<button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here"><i class="far fa-save mr-2"></i>Lưu tại trang</button>
			<button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
			<a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
		</div>
		<div class="row">
			<div class="<?= $colLeft ?>">
				<div id="scroll-left">
					<?php
					if (isset($config['product'][$type]['slug']) && $config['product'][$type]['slug'] == true) {
						$slugchange = ($act == 'edit') ? 1 : 0;
						$copy = ($act != 'copy') ? 0 : 1;
						include LAYOUT_PATH . "slug.php";
					}
					?>
					<div class="card card-primary card-outline text-sm">
						<div class="card-header">
							<h3 class="card-title">Nội dung <?= $config['product'][$type]['title_main'] ?></h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							</div>
						</div>
						<div class="card-body">
							<div class="card card-primary card-outline card-outline-tabs">
								<div class="card-header p-0 border-bottom-0">
									<ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
										<?php foreach ($config['website']['lang'] as $k => $v) { ?>
											<li class="nav-item">
												<a class="nav-link <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-lang" data-toggle="pill" href="#tabs-lang-<?= $k ?>" role="tab" aria-controls="tabs-lang-<?= $k ?>" aria-selected="true"><?= $v ?></a>
											</li>
										<?php } ?>
									</ul>
								</div>
								<div class="card-body card-article">
									<div class="tab-content" id="custom-tabs-three-tabContent-lang">
										<?php if (isset($config['product'][$type]['file']) && $config['product'][$type]['file'] == true) { ?>
											<div class="form-group">
												<label class="change-file mb-1 mr-2" for="file-taptin">
													<p>Upload tập tin:</p>
													<strong class="ml-2">
														<span class="btn btn-sm bg-gradient-success"><i class="fas fa-file-upload mr-2"></i>Chọn tập tin</span>
														<div><b class="text-sm text-split"></b></div>
													</strong>
												</label>
												<strong class="d-block mt-2 mb-2 text-sm"><?php echo $config['product'][$type]['file_type']; ?></strong>
												<div class="custom-file my-custom-file d-none">
													<input type="file" class="custom-file-input" name="file-taptin" id="file-taptin">
													<label class="custom-file-label" for="file-taptin">Chọn file</label>
												</div>
												<?php if (isset($item['taptin']) && $item['taptin'] != '') { ?>
													<a class="btn btn-sm bg-gradient-primary text-white d-inline-block align-middle p-2 rounded mb-1" href="<?= UPLOAD_FILE . @$item['taptin'] ?>" title="Download tập tin hiện tại"><i class="fas fa-download mr-2"></i>Download tập tin hiện tại</a>
												<?php } ?>
											</div>
										<?php } ?>
										<?php foreach ($config['website']['lang'] as $k => $v) { ?>
											<div class="tab-pane fade show <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-lang-<?= $k ?>" role="tabpanel" aria-labelledby="tabs-lang">
												<div class="form-group">
													<label for="ten<?= $k ?>">Tiêu đề (<?= $k ?>):</label>
													<input type="text" class="form-control for-seo" name="data[ten<?= $k ?>]" id="ten<?= $k ?>" placeholder="Tiêu đề (<?= $k ?>)" value="<?= @$item['ten' . $k] ?>" <?= ($k == 'vi') ? 'required' : '' ?>>
												</div>
												<?php if (isset($config['product'][$type]['title_phu']) && $config['product'][$type]['title_phu'] == true && $k == 'vi') { ?>
													<div class="form-group">
														<label for="title_phu<?= $k ?>">Tiêu đề phụ (H1) (<?= $k ?>):</label>
														<input type="text" class="form-control for-seo" name="data[title_phu<?= $k ?>]" id="title_phu<?= $k ?>" placeholder="Nhập tiêu đề phụ (<?= $k ?>)" value="<?= @$item['title_phu' . $k] ?>">
													</div>
												<?php } ?>
												<?php if (isset($config['product'][$type]['link_video']) && $config['product'][$type]['link_video'] == true && $k == 'vi') { ?>
													<div class="form-group">
														<label for="link_video">Link video:</label>
														<input type="text" class="form-control for-seo" name="data[link_video]" id="chatlieu" placeholder="Nhập link video" value="<?= @$item['link_video'] ?>">
														<!-- <textarea class="form-control" name="data[link_video]" id="link_video" rows="5" placeholder="Link video"><?= htmlspecialchars_decode(@$item['link_video']) ?></textarea> -->
													</div>
												<?php } ?>
												<?php if (isset($config['product'][$type]['chatlieu']) && $config['product'][$type]['chatlieu'] == true && $k == 'vi') { ?>
													<div class="form-group">
														<label for="chatlieu">Chất liệu:</label>
														<input type="text" class="form-control for-seo" name="data[chatlieu]" id="chatlieu" placeholder="Nhập Chất liệu" value="<?= @$item['chatlieu'] ?>">
													</div>
												<?php } ?>
												<?php if (isset($config['product'][$type]['kichthuoc']) && $config['product'][$type]['kichthuoc'] == true && $k == 'vi') { ?>
													<div class="form-group">
														<label for="kichthuoc">Kích thước:</label>
														<input type="text" class="form-control for-seo" name="data[kichthuoc]" id="kichthuoc" placeholder="Nhập Kích thước" value="<?= @$item['kichthuoc'] ?>">
													</div>
												<?php } ?>
												<?php if (isset($config['product'][$type]['donvisanxuat']) && $config['product'][$type]['donvisanxuat'] == true && $k == 'vi') { ?>
													<div class="form-group">
														<label for="donvisanxuat">Đơn vị sản xuất:</label>
														<input type="text" class="form-control for-seo" name="data[donvisanxuat]" id="donvisanxuat" placeholder="Nhập Đơn vị sản xuất" value="<?= @$item['donvisanxuat'] ?>">
													</div>
												<?php } ?>
												<?php if (isset($config['product'][$type]['vanchuyen']) && $config['product'][$type]['vanchuyen'] == true && $k == 'vi') { ?>
													<div class="form-group">
														<label for="vanchuyen">Vận chuyển:</label>
														<input type="text" class="form-control for-seo" name="data[vanchuyen]" id="vanchuyen" placeholder="Nhập Vận chuyển" value="<?= @$item['vanchuyen'] ?>">
													</div>
												<?php } ?>
												<?php if (isset($config['product'][$type]['sodangki']) && $config['product'][$type]['sodangki'] == true && $k == 'vi') { ?>
													<div class="form-group">
														<label for="sodangki">Số đăng kí:</label>
														<input type="text" class="form-control for-seo" name="data[sodangki]" id="sodangki" placeholder="Nhập Số đăng kí" value="<?= @$item['sodangki'] ?>">
													</div>
												<?php } ?>
												<?php if (isset($config['product'][$type]['motangan']) && $config['product'][$type]['motangan'] == true) { ?>
													<div class="form-group">
														<label for="motangan<?= $k ?>">Mô tả ngắn (<?= $k ?>):</label>
														<textarea class="form-control for-seo <?= (isset($config['product'][$type]['motangan_cke']) && $config['product'][$type]['motangan_cke'] == true) ? 'ckeditor' : '' ?>" name="data[motangan<?= $k ?>]" id="motangan<?= $k ?>" rows="5" placeholder="Mô tả (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['motangan' . $k]) ?></textarea>
													</div>
												<?php } ?>
												<?php if (isset($config['product'][$type]['mota']) && $config['product'][$type]['mota'] == true) { ?>
													<div class="form-group">
														<label for="mota<?= $k ?>">Mô tả chi tiết (<?= $k ?>):</label>
														<textarea class="form-control for-seo <?= (isset($config['product'][$type]['mota_cke']) && $config['product'][$type]['mota_cke'] == true) ? 'ckeditor' : '' ?>" name="data[mota<?= $k ?>]" id="mota<?= $k ?>" rows="5" placeholder="Mô tả (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['mota' . $k]) ?></textarea>
													</div>
												<?php } ?>
												<?php if (isset($config['product'][$type]['noidung']) && $config['product'][$type]['noidung'] == true) { ?>
													<div class="form-group">
														<label for="noidung<?= $k ?>">Nội dung (<?= $k ?>):</label>
														<textarea class="form-control for-seo <?= (isset($config['product'][$type]['noidung_cke']) && $config['product'][$type]['noidung_cke'] == true) ? 'ckeditor' : '' ?>" name="data[noidung<?= $k ?>]" id="noidung<?= $k ?>" rows="5" placeholder="Nội dung (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['noidung' . $k]) ?></textarea>
													</div>
												<?php } ?>
												<div class="form-group">
													<label for="schema">Schema:</label>
													<textarea class="form-control" name="data[schema]" id="schema" rows="8" placeholder="Schema"><?= htmlspecialchars_decode(@$item['schema']) ?></textarea>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="<?= $colRight ?>">
				<div id="scroll-right">
					<?php if (
						(isset($config['product'][$type]['dropdown']) && $config['product'][$type]['dropdown'] == true) ||
						(isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true) ||
						(isset($config['product'][$type]['tags']) && $config['product'][$type]['tags'] == true) ||
						(isset($config['product'][$type]['mau']) && $config['product'][$type]['mau'] == true) ||
						(isset($config['product'][$type]['doday']) && $config['product'][$type]['doday'] == true) ||
						(isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true)
					) { ?>
						<div class="card card-primary card-outline text-sm">
							<div class="card-header">
								<h3 class="card-title">Danh mục <?= $config['product'][$type]['title_main'] ?></h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group-category row">
									<?php if (isset($config['product'][$type]['dropdown']) && $config['product'][$type]['dropdown'] == true) { ?>
										<?php if (isset($config['product'][$type]['list']) && $config['product'][$type]['list'] == true) { ?>
											<div class="form-group col-xl-6 col-sm-6">
												<label class="d-block" for="id_list">Danh mục cấp 1:</label>
												<?= $func->get_ajax_category('product', 'list', $type) ?>
											</div>
										<?php } ?>
										<?php if (isset($config['product'][$type]['cat']) && $config['product'][$type]['cat'] == true) { ?>
											<div class="form-group col-xl-6 col-sm-6">
												<label class="d-block" for="id_cat">Danh mục cấp 2:</label>
												<?= $func->get_ajax_category('product', 'cat', $type) ?>
											</div>
										<?php } ?>
										<?php if (isset($config['product'][$type]['item']) && $config['product'][$type]['item'] == true) { ?>
											<div class="form-group col-xl-6 col-sm-6">
												<label class="d-block" for="id_item">Danh mục cấp 3:</label>
												<?= $func->get_ajax_category('product', 'item', $type) ?>
											</div>
										<?php } ?>
										<?php if (isset($config['product'][$type]['sub']) && $config['product'][$type]['sub'] == true) { ?>
											<div class="form-group col-xl-6 col-sm-6">
												<label class="d-block" for="id_sub">Danh mục cấp 4:</label>
												<?= $func->get_ajax_category('product', 'sub', $type) ?>
											</div>
										<?php } ?>
									<?php } ?>
									<?php if (isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-6">
											<label class="d-block" for="id_brand">Xuất xứ:</label>
											<?= $func->get_ajax_category('product', 'brand', $type, 'Chọn xuất xứ') ?>
										</div>
									<?php } ?>

									<?php if (isset($config['product'][$type]['mau']) && $config['product'][$type]['mau'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-6">
											<label class="d-block" for="id_mau">Màu:</label>
											<?= get_mau(@$item['id']) ?>
										</div>
									<?php } ?>
									<?php if (isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-6">
											<label class="d-block" for="id_size">Size:</label>
											<?= get_size(@$item['id']) ?>
										</div>
									<?php } ?>
									<?php if (isset($config['product'][$type]['doday']) && $config['product'][$type]['doday'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-6">
											<label class="d-block" for="id_doday">bảo hành:</label>
											<?= get_doday(@$item['id']) ?>
										</div>
									<?php } ?>
									<!-- <?php if (isset($config['product'][$type]['doday']) && $config['product'][$type]['doday'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-6">
											<label class="d-block" for="id_doday"> Loại vải:</label>
											<?= get_loaivai(@$item['id']) ?>
										</div>
									<?php } ?>
									<?php if (isset($config['product'][$type]['doday']) && $config['product'][$type]['doday'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-6">
											<label class="d-block" for="id_doday">Mùa vụ:</label>
											<?= get_muavu(@$item['id']) ?>
										</div>
									<?php } ?> -->
									<?php if (isset($config['product'][$type]['danhmuc']) && $config['product'][$type]['danhmuc'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-6">
											<label class="d-block" for="id_danhmuc">Danh mục:</label>
											<?= get_alldanhmuc(@$item['id']) ?>
										</div>
									<?php } ?>
									<?php if (isset($config['product'][$type]['danhmuc_cap']) && $config['product'][$type]['danhmuc_cap'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-6">
											<label class="d-block" for="id_danhmuc_cap">Danh mục cấp:</label>
											<?= get_alldanhmuc_cap(@$item['id']) ?>
										</div>
									<?php } ?>
									<?php if (isset($config['product'][$type]['tags']) && $config['product'][$type]['tags'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-6">
											<label class="d-block" for="id_tags">Danh mục tags:</label>
											<?= $func->get_tags(@$item['id'], 'tags_group', 'product', $type) ?>
										</div>
									<?php } ?>
									<?php if ($config['news'][$type]['title_main'] != 'Tác giả') { ?>
										<div class="form-group col-xl-6 col-sm-4">
											<label class="d-block" for="id_author">Tác giả:</label>
											<select id="id_author" name="data[id_author]" data-type="tac-gia" data-table="#_news" class="form-control select2 select-category">
												<option value="" data-default>Chọn tác giả</option>
												<?php
												$sql = "select * from #_news where type = ? and hienthi = 1 order by stt, id ASC";
												$items = $d->rawQuery($sql, array('tac-gia'));

												foreach ($items as $author) :
													$selected = '';
													if (@$item['id_author'] == $author['id']) $selected = ' selected';
												?>
													<option<?= $selected ?> value="<?= $author['id'] ?>"><?= $author['tenvi'] ?></option>
													<?php endforeach; ?>
											</select>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>

					<?php if (isset($config['product'][$type]['images']) && $config['product'][$type]['images'] == true) { ?>
						<div class="card card-primary card-outline text-sm">
							<div class="card-header">
								<h3 class="card-title">Hình ảnh <?= $config['product'][$type]['title_main'] ?></h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
								</div>
							</div>
							<div class="card-body">

								<?php

								$table_name = 'product';

								// photo
								$title = 'Ảnh đại diện';
								$photoDetail = @$item['photo'] ?? '';
								$input_name = $table_key = 'photo';
								include LAYOUT_PATH . "single_image.php";

								?>
							</div>
						</div>
					<?php } ?>
					<?php if (isset($config['product'][$type]['images1']) && $config['product'][$type]['images1'] == true) { ?>
						<div class="card card-primary card-outline text-sm">
							<div class="card-header">
								<h3 class="card-title">banner <?= $config['product'][$type]['title_main'] ?></h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
								</div>
							</div>
							<div class="card-body">

								<?php

								$table_name = 'product';

								// photo
								$title = 'Ảnh đại diện';
								$photoDetail = @$item['photo1'] ?? '';
								$input_name = $table_key = 'photo1';
								include LAYOUT_PATH . "single_image.php";

								?>
							</div>
						</div>
					<?php } ?>
					<div class="card card-primary card-outline text-sm">
						<div class="card-header">
							<h3 class="card-title">Thông tin <?= $config['product'][$type]['title_main'] ?></h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="hienthi" class="d-inline-block align-middle mb-0 mr-2">Hiển thị:</label>
								<div class="custom-control custom-checkbox d-inline-block align-middle">
									<input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[hienthi]" id="hienthi-checkbox" <?= (!isset($item['hienthi']) || $item['hienthi'] == 1) ? 'checked' : '' ?>>
									<label for="hienthi-checkbox" class="custom-control-label"></label>
								</div>
							</div>
							<div class="form-group">
								<label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
								<input type="number" class="form-control form-control-mini d-inline-block align-middle" min="0" name="data[stt]" id="stt" placeholder="Số thứ tự" value="<?= isset($item['stt']) ? $item['stt'] : 1 ?>">
							</div>
							<div class="row">
								<?php if (isset($config['product'][$type]['ma']) && $config['product'][$type]['ma'] == true) { ?>
									<div class="form-group col-md-6">
										<label class="d-block" for="masp">Mã:</label>
										<input type="text" class="form-control" name="data[masp]" id="masp" placeholder="Mã" value="<?= @$item['masp'] ?>">
									</div>
								<?php } ?>
								<?php if (isset($config['product'][$type]['gia']) && $config['product'][$type]['gia'] == true) { ?>
									<div class="form-group col-md-6">
										<label class="d-block" for="gia">Giá bán:</label>
										<div class="input-group">
											<input type="text" class="form-control format-price gia_ban" name="data[gia]" id="gia" placeholder="Giá bán" value="<?= @$item['gia'] ?>">
											<div class="input-group-append">
												<div class="input-group-text"><strong>VNĐ</strong></div>
											</div>
										</div>
									</div>
								<?php } ?>
								<?php if (isset($config['product'][$type]['giamoi']) && $config['product'][$type]['giamoi'] == true) { ?>
									<div class="form-group col-md-6">
										<label class="d-block" for="giamoi">Giá mới:</label>
										<div class="input-group">
											<input type="text" class="form-control format-price gia_moi" name="data[giamoi]" id="giamoi" placeholder="Giá mới" value="<?= @$item['giamoi'] ?>">
											<div class="input-group-append">
												<div class="input-group-text"><strong>VNĐ</strong></div>
											</div>
										</div>
									</div>
								<?php } ?>
								<?php if (isset($config['product'][$type]['giakm']) && $config['product'][$type]['giakm'] == true) { ?>
									<div class="form-group col-md-6">
										<label class="d-block" for="giakm">Chiết khấu:</label>
										<div class="input-group">
											<input type="text" class="form-control gia_km" name="data[giakm]" id="giakm" placeholder="Chiết khấu" value="<?= @$item['giakm'] ?>" maxlength="3" readonly>
											<div class="input-group-append">
												<div class="input-group-text"><strong>%</strong></div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php if (isset($flagGallery) && $flagGallery == true) { ?>
						<div class="card card-primary card-outline text-sm ">

							<div class="card-header">
								<h3 class="card-title">Bộ sưu tập</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
								</div>
							</div>

							<div class="card-body">
								<?php

								$table_name = 'product';

								$single_gallery = ($act != 'copy') ? @$item['gallery'] : '';
								$title = 'Gallery';
								$textarea_name = $table_key = 'gallery';
								include LAYOUT_PATH . "single_gallery.php";

								?>
							</div>

						</div>
					<?php } ?>
					<?php if (isset($config['product'][$type]['seo']) && $config['product'][$type]['seo'] == true) { ?>
						<div class="card card-primary card-outline text-sm ">
							<div class="card-header">
								<h3 class="card-title">Nội dung SEO</h3>
								<a class="btn btn-sm bg-gradient-success d-inline-block text-white float-right create-seo" title="Tạo SEO">Tạo SEO</a>
							</div>
							<div class="card-body">
								<?php
								$seoDB = $seo->getSeoDB($id, $com, 'man', $type);
								include LAYOUT_PATH . "seo.php";
								?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="card-footer text-sm bottom_height">
			<button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
			<button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here"><i class="far fa-save mr-2"></i>Lưu tại trang</button>
			<button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
			<a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
			<input type="hidden" name="id" value="<?= @$item['id'] ?>">
		</div>
	</form>
</section>

<?php if (isset($config['product'][$type]['giakm']) && $config['product'][$type]['giakm'] == true) { ?>
	<script type="text/javascript">
		function roundNumber(rnum, rlength) {
			return Math.round(rnum * Math.pow(10, rlength)) / Math.pow(10, rlength);
		}
		$(document).ready(function() {

			$(".gia_ban, .gia_moi").keyup(function() {
				var gia_ban = $('.gia_ban').val();
				var gia_moi = $('.gia_moi').val();
				var gia_km = 0;

				if (gia_ban == '' || gia_ban == '0' || gia_moi == '' || gia_moi == '0') {
					gia_km = 0;
				} else {
					gia_ban = gia_ban.replace(/,/g, "");
					gia_moi = gia_moi.replace(/,/g, "");
					gia_ban = parseInt(gia_ban);
					gia_moi = parseInt(gia_moi);

					if (gia_moi < gia_ban) {
						gia_km = 100 - ((gia_moi * 100) / gia_ban);
						gia_km = roundNumber(gia_km, 0);
					} else {
						gia_km = 0;
					}
				}
				$('.gia_km').val(gia_km);
			})
		})
	</script>
<?php } ?>