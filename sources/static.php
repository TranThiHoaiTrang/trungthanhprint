<?php  
	if(!defined('SOURCES')) die("Error");
	
	/* Lấy bài viết tĩnh */
	$static = $d->rawQueryOne("select * from #_static where type = ? limit 0,1",array($type));

	$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1",array($type));
	$banner=$seopage['banner']; 
	/* SEO */
	if(!empty($static))
	{
		// $seoDB = $seo->getSeoDB(0,'seopage','capnhat',$static['type']);
		$seoDB = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1", array($type));
		// var_dump($seoDB);
		$seo->setSeo('h1',$static['ten'.$lang]);
		if(!empty($seoDB['title'.$seolang])) $seo->setSeo('title',$seoDB['title'.$seolang]);
		else $seo->setSeo('title',$static['ten'.$lang]);
		if(!empty($seoDB['keywords'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
		if(!empty($seoDB['description'.$seolang])) $seo->setSeo('description',$seoDB['description'.$seolang]);
		$seo->setSeo('url',$func->getPageURL());
		$img_json_bar = (isset($static['options']) && $static['options'] != '') ? json_decode($static['options'],true) : null;
		if($img_json_bar == null || ($img_json_bar['p'] != $static['photo']))
		{
			$img_json_bar = $func->getImgSize($static['photo'],Helper::thumbnail_link($static['photo']));
			$seo->updateSeoDB(json_encode($img_json_bar),'static',$static['id']);
		}
		if(count($img_json_bar) > 0)
		{
			$seo->setSeo('photo',Helper::thumbnail_link($static['photo']));
			$seo->setSeo('photo:width',$img_json_bar['w']);
			$seo->setSeo('photo:height',$img_json_bar['h']);
			$seo->setSeo('photo:type',$img_json_bar['m']);
		}
	}

	/* breadCrumbs */
	if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
	$breadcrumbs = $breadcr->getBreadCrumbs();
?>