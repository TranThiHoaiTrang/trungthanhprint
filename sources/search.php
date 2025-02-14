<?php  
	if(!defined('SOURCES')) die("Error");

	/* Tìm kiếm sản phẩm */
	if(isset($_GET['keyword'])){
		$tukhoa = htmlspecialchars($_GET['keyword']);
		$tukhoa2 = htmlspecialchars($_GET['keyword']);
		$idlist = htmlspecialchars($_GET['idlist']);
		$idcat = htmlspecialchars($_GET['idcat']);
		$tukhoa = $func->changeTitle($tukhoa);

		if($tukhoa){
			$where = "";
			$where = " (ten$lang LIKE ? or tenkhongdauvi LIKE ? or tenkhongdauen LIKE ?) and hienthi > 0";
			$params = array("%$tukhoa%","%$tukhoa%","%$tukhoa%");

			if(!empty($idlist)){
				$where .= " and id_list = '".$idlist."'";
			}
			if(!empty($idcat)){
				$where .= " and id_list = '".$idcat."'";
			}

			$curPage = $get_page;
			$per_page = 20;
			$startpoint = ($curPage * $per_page) - $per_page;
			$limit = " limit ".$startpoint.",".$per_page;
			$sql = "select * from #_product where $where order by stt,id desc $limit";
			// var_dump($sql);
			$product = $d->rawQuery($sql,$params);
			$sqlNum = "select count(*) as 'num' from #_product where $where order by stt,id desc";
			$count = $d->rawQueryOne($sqlNum,$params);
			$total = $count['num'];
			$url = $func->getCurrentPageURL();
			$paging = $func->pagination($total,$per_page,$curPage,$url);
		}
	}

	$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1",array('tim-kiem'));
	$banner=$seopage['banner'];
	/* SEO */
	$seo->setSeo('title',$title_crumb);

	/* breadCrumbs */
	$breadcr->setBreadCrumbs('',$title_crumb);
	$breadcrumbs = $breadcr->getBreadCrumbs();
?>