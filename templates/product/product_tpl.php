<div class="mb-5 mt-5 all_breadCrumbs">
    <div class="fixwidth">
        <div class="all_bread d-flex">
            <div class="breadCrumbs">
                <div><?= $breadcrumbs ?></div>
            </div>
            <!-- <div class="bread_title"></?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></div> -->
        </div>
    </div>
</div>
<div class="all_banner_page">
    <div class="fixwidth">
        <?php if (!empty($pro_seo)) { ?>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="noidung_banner_page">
                        <?= htmlspecialchars_decode($pro_seo['title_phu' . $lang]) ?>
                    </h1>
                    <div class="mota_banner_page">
                        <?= htmlspecialchars_decode($pro_seo['motangan' . $lang]) ?>
                    </div>
                    <!-- <a href="san-pham">
                        <div class="xemthem_gioithieu">
                            <div class="icon_xt"><i class="fas fa-arrow-right"></i></div>
                            <span>Khám phá ngay</span>
                        </div>
                    </a> -->
                </div>
                <div class="col-md-6">
                    <div class="img_banner_page">
                        <?= Helper::the_thumbnail($pro_seo['photo'], '', $pro_seo['ten' . $lang], true) ?>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="noidung_banner_page">
                        <?= htmlspecialchars_decode($seopage['noidung' . $lang]) ?>
                    </h1>
                    <div class="mota_banner_page">
                        <?= htmlspecialchars_decode($seopage['mota' . $lang]) ?>
                    </div>
                    <!-- <a href="san-pham">
                        <div class="xemthem_gioithieu">
                            <div class="icon_xt"><i class="fas fa-arrow-right"></i></div>
                            <span>Khám phá ngay</span>
                        </div>
                    </a> -->
                </div>
                <div class="col-md-6">
                    <div class="img_banner_page">
                        <?= Helper::the_thumbnail($seopage['photo'], '', $seopage['ten' . $lang], true) ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="pt-5 pb-5" style="background: #F1F6F8;">
    <div class="fixwidth">
        <div class="content-main w-clear">
            <div class="site-content">
                <?php if (!empty($pro_seo)) { ?>
                    <div class="row">
                        <div class="col-md-3">
                            <?php include LAYOUT_PATH . "right-sanpham.php"; ?>
                        </div>
                        <div class="col-md-9">
                            <?php if (isset($product) && count($product) > 0) { ?>
                                <div class="all_sp_search">
                                    <div class="loadkhung_product mainkhung_product ">
                                        <?php foreach ($product as $k => $v) { ?>
                                            <a href="<?= $v['tenkhongdauvi'] ?>">
                                                <div class="sp_dm_nb_index">
                                                    <div class="img_sp_dm_nb_index">
                                                        <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                                                    </div>
                                                    <div class="content_sp_dm_nb_index">
                                                        <div class="name_sp_dm_nb_index">
                                                            <?= $v['ten' . $lang] ?>
                                                        </div>
                                                        <div class="mota_sp_dm_nb_index">
                                                            <?= htmlspecialchars_decode($v['mota' . $lang]) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-warning" role="alert">
                                    <strong><?= khongtimthayketqua ?></strong>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="loadkhung_product mainkhung_product">
                        <?php foreach ($alllistpr as $v) { ?>
                            <a href="<?= $v['tenkhongdauvi'] ?>">
                                <div class="all_list_sp_product aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1500">
                                    <div class="img_list_product">
                                        <?= Helper::the_thumbnail($v['photo'], '', '', '', $v['ten' . $lang], true) ?>
                                    </div>
                                    <div class="content_list_product">
                                        <div class="name_list_product"><?= $v['ten' . $lang] ?></div>
                                        <div class="mota_list_product"><?= htmlspecialchars_decode($v['motangan' . $lang]) ?></div>
                                        <div class="xemthem_list_product">
                                            <div class="icon_xt_pr"><i class="fas fa-arrow-right"></i></div>
                                            <span>Xem thêm</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="clear"></div>

                <?php if ($noidung_page != '') { ?>
                    <div class="wrap_bottom pt-0">
                        <div class="fixwidth">
                            <div class="entry-post">
                                <div class="entry-left">
                                    <div class="contact_news">
                                        <div class="all_gioithieu_index" id="toc-content">
                                        <?= htmlspecialchars_decode($noidung_page) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="entry-right">
                                    <div class="meta-toc">
                                        <div class="all_meta-toc">
                                            <div class="toc_title">
                                                MỤC LỤC
                                                <span class="toc_toggle">[Ẩn]</span>
                                            </div>
                                            <div class="box-readmore">
                                                <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>