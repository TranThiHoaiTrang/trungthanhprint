<?php
	if(!defined('SOURCES')) die("Error");

	/* Kiểm tra active seopage */
	if(isset($config['seopage']) && count($config['seopage']['page']) > 0)
	{
		$arrCheck = array();
		foreach($config['seopage']['page'] as $k => $v) $arrCheck[] = $k;
		if(!count($arrCheck) || !in_array($type,$arrCheck)) $func->transfer("Trang không tồn tại", "index.php", false);
	}
	else
	{
		$func->transfer("Trang không tồn tại", "index.php", false);
	}

	switch($act)
	{
		case "capnhat":
			get_seopage();
			$template = "seopage/man/item_add";
			break;
		case "save":
			save_seopage();
			break;

		default:
			$template = "404";
	}

	/* Get Seopage */
	function get_seopage()
	{
		global $d, $item, $type;

		$item = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1",array($type));
	}

	/* Save Seopage */
	function save_seopage()
	{
		global $d, $func, $config, $com, $type;
		
		if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=seopage&act=capnhat&type=".$type, false);

		$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1",array($type));
		
		/* Post dữ liệu */
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if($dataSeo)
		{
			foreach($dataSeo as $column => $value)
			{
				$dataSeo[$column] = htmlspecialchars($value);
			}

			$dataSeo['type'] = $type;
		}

		if (!empty($_POST['single-photo'])) {
			$dataSeo['photo'] = $_POST['single-photo'];
		}
		if (!empty($_POST['single-photo1'])) {
			$dataSeo['photo1'] = $_POST['single-photo1'];
		}
		
		// if(isset($_FILES['banner']))
		// {
		// 	$file_name_banner1 = $func->uploadName($_FILES['banner']["name"]);
		// 	if($banner = $func->uploadImage("banner", $config['seopage']['img_type'],UPLOAD_SEOPAGE,$file_name_banner1))
		// 	{
		// 		$dataSeo['banner'] = $banner;
		// 		$row = $d->rawQueryOne("select id, banner from #_seopage where type = ? limit 0,1",array($type));
		// 		if($row['id']) $func->delete_file(UPLOAD_SEOPAGE.$row['banner']);
		// 	}
		// }
// var_dump($dataSeo);die();
		if($seopage['id'])
		{
			$d->where('type',$type);	
			if($d->update('seopage',$dataSeo)) $func->redirect("index.php?com=seopage&act=capnhat&type=".$type);
			else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=seopage&act=capnhat&type=".$type, false);
		}
		else
		{
			if($d->insert('seopage',$dataSeo)) $func->redirect("index.php?com=seopage&act=capnhat&type=".$type);
			else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=seopage&act=capnhat&type=".$type, false);
		}
	}
?>