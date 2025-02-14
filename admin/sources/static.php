<?php
if (!defined('SOURCES')) die("Error");

/* Kiểm tra active static */
if (isset($config['static'])) {
	$arrCheck = array();
	foreach ($config['static'] as $k => $v) $arrCheck[] = $k;
	if (!count($arrCheck) || !in_array($type, $arrCheck)) $func->transfer("Trang không tồn tại", "index.php", false);
} else {
	$func->transfer("Trang không tồn tại", "index.php", false);
}

switch ($act) {
	case "capnhat":
		get_static();
		$template = "static/man/item_add";
		break;
	case "save":
		save_static();
		break;

	default:
		$template = "404";
}

/* Get static */
function get_static()
{
	global $d, $item, $type, $gallery;

	$item = $d->rawQueryOne("select * from #_static where type = ? limit 0,1", array($type));
	$gallery = $d->rawQuery("select * from #_gallery where com = ? and type = ? and kind = ? and val = ? order by stt,id desc", array('static', $type, 'man', $type));
}

/* Save static */
function save_static()
{
	global $d, $config, $func, $com, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=static&act=capnhat&type=" . $type, false);

	$static = $d->rawQueryOne("select * from #_static where type = ? limit 0,1", array($type));

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		$data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		$data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;

		$data['ngaybatdau'] = isset($data['ngaybatdau']) ? strtotime($data['ngaybatdau']) : 0;
		$data['ngayketthuc'] = isset($data['ngayketthuc']) ? strtotime($data['ngayketthuc']) : 0;
		$data['type'] = $type;
	}

	/* Post Seo */
	if (isset($config['static'][$type]['seo']) && $config['static'][$type]['seo'] == true) {
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if ($dataSeo) {
			foreach ($dataSeo as $column => $value) {
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	// single photo
	if (!empty($_POST['single-photo'])) {
		$data['photo'] = $_POST['single-photo'];
	}
	if (!empty($_POST['single-photo1'])) {

		$data['photo1'] = $_POST['single-photo1'];
	}
	// single gallery
	$new_gallery = [];
	if (!empty($_POST['single-gallery'])) {
		$data['gallery'] = $_POST['single-gallery'];
		$new_gallery = explode(',', $_POST['single-gallery']);
	}

	if (isset($_FILES['file-taptin'])) {
		$file_name = $func->uploadName($_FILES['file-taptin']["name"]);
		if ($taptin = $func->uploadImage("file-taptin", $config['static'][$type]['file_type'], UPLOAD_FILE, $file_name)) {
			$data['taptin'] = $taptin;
			$row = $d->rawQueryOne("select id, taptin from #_static where type = ? limit 0,1", array($type));
			if ($row['id']) $func->delete_file(UPLOAD_FILE . $row['taptin']);
		}
	}

	if ($static['id']) {
		$data['ngaysua'] = time();

		$product_item = $d->get_by_id('static', $static['id']);

		// update gallery
		$old_galleries = $product_item['gallery'];
		$old_galleries = explode(',', $old_galleries);

		$galleries = array_merge($old_galleries, $new_gallery);
		$galleries = implode(',', array_filter($galleries));
		$data['gallery'] = $galleries;
		// var_dump($data);
		$data = $d->filter_data('static', $data);
		// var_dump($data);die();
		$d->where('type', $type);
		if ($d->update('static', $data)) {
			/* SEO */
			if (isset($config['static'][$type]['seo']) && $config['static'][$type]['seo'] == true) {
				$d->rawQuery("delete from #_seo where com = ? and act = ? and type = ?", array($com, 'capnhat', $type));

				$dataSeo['idmuc'] = 0;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'capnhat';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=static&act=capnhat&type=" . $type);
		} else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=static&act=capnhat&type=" . $type, false);
	} else {
		if (
			(isset($data['tenvi']) && $data['tenvi'] != '') ||
			(isset($data['motavi']) && $data['motavi'] != '') ||
			(isset($data['noidungvi']) && $data['noidungvi'] != '')
		) {
			$data['ngaytao'] = time();

			if ($d->insert('static', $data)) {
				/* SEO */
				if (isset($config['static'][$type]['seo']) && $config['static'][$type]['seo'] == true) {
					$dataSeo['idmuc'] = 0;
					$dataSeo['com'] = $com;
					$dataSeo['act'] = 'capnhat';
					$dataSeo['type'] = $type;
					$d->insert('seo', $dataSeo);
				}

				$func->redirect("index.php?com=static&act=capnhat&type=" . $type);
			} else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=static&act=capnhat&type=" . $type, false);
		}
		$func->transfer("Dữ liệu rỗng", "index.php?com=static&act=capnhat&type=" . $type, false);
	}
}
