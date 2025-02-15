<div class="mb-5 mt-5 all_breadCrumbs">
    <div class="fixwidth">
        <div class="all_bread d-flex">
            <div class="breadCrumbs">
                <div><?= $breadcrumbs ?></div>
            </div>
            <div class="bread_title"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></div>
        </div>
    </div>
</div>
<div class="all_banner_page">
    <div class="fixwidth">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="noidung_banner_page">
                    <?= htmlspecialchars_decode($seopage['noidung' . $lang]) ?>
                </div>
                <div class="mota_banner_page">
                    <?= htmlspecialchars_decode($seopage['mota' . $lang]) ?>
                </div>
                <a href="san-pham">
                    <div class="xemthem_gioithieu">
                        <div class="icon_xt"><i class="fas fa-arrow-right"></i></div>
                        <span>Khám phá ngay</span>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <div class="img_banner_page">
                    <?= Helper::the_thumbnail($seopage['photo'], '', $seopage['ten' . $lang], true) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pt-5 pb-5" style="background: #F1F6F8;">
    <div class="fixwidth">
        <div class="content-main w-clear">
            <div class="row">
                <div class="col-md-3">
                    <?php include LAYOUT_PATH . "right-sanpham.php"; ?>
                </div>
                <div class="col-md-9">
                    <?php if (isset($news) && count($news) > 0) { ?>
                        <div class="all_tintuc_bottom loadkhung_product mb-4">
                            <?php foreach ($news as $v) { ?>
                                <a href="<?= $v['tenkhongdauvi'] ?>">
                                    <div class="post mt-3 pb-3">
                                        <div class="post_thumb">
                                            <?= Helper::the_thumbnail($v['photo'], '', '', '', $v['ten' . $lang], true) ?>
                                        </div>
                                        <div class="all_content_post">
                                            <div class="all_time_tacgia">
                                                <div class="tacgia_tintuc">Bài viết của Admin</div>
                                                <div class="time_tintuc">
                                                    <span><?= date("d.m.Y", $v['ngaytao']) ?></span>
                                                </div>
                                            </div>
                                            <div class="title_news">
                                                <?= $v['ten' . $lang] ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                            <div class="clear"></div>
                            <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-warning" role="alert">
                            <strong><?= khongtimthayketqua ?></strong>
                        </div>
                    <?php } ?>
                    <!-- <div class="fb-comments" data-href="<?= $func->getCurrentPageURL() ?>" data-numposts="3" data-colorscheme="light" data-width="100%"></div> -->
                </div>
            </div>

            <?php if ($noidung_page != '') { ?>
                <div class="wrap_bottom pt-0">
                    <div class="fixwidth">
                        <div class="entry-post">
                            <div class="entry-left">
                                <div class="contact_news">
                                    <h1 class="name_tt_chitiet">
                                        <?= $row_detail['ten' . $lang] ?>
                                    </h1>
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