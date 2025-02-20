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
        <div class="row align-items-center">
            <div class="col-md-6">
                <?php if ($row_detail['type'] == 'tac-gia') { ?>
                    <h1 class="noidung_banner_page">
                        <?= htmlspecialchars_decode($row_detail['ten' . $lang]) ?>
                    </h1>
                <?php } else { ?>
                    <h1 class="noidung_banner_page">
                        <?= htmlspecialchars_decode($row_detail['title_phu' . $lang]) ?>
                    </h1>
                <?php } ?>
                <div class="mota_banner_page">
                    <?= htmlspecialchars_decode($row_detail['motangan' . $lang]) ?>
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
                    <?= Helper::the_thumbnail($row_detail['photo'], '', $row_detail['ten' . $lang], true) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pt-5 pb-5" style="background: #F1F6F8;">
    <div class="fixwidth">
        <?php if ($row_detail['noidung' . $lang]) { ?>
            <div class="entry-post">
                <div class="entry-left">
                    <div class="contact_news">
                        <div class="all_gioithieu_index" id="toc-content">
                            <?= (isset($row_detail['noidung' . $lang]) && $row_detail['noidung' . $lang] != '') ? htmlspecialchars_decode($row_detail['noidung' . $lang]) : '' ?>
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
        <?php } else { ?>
            <div class="alert alert-warning" role="alert">
                <strong><?= khongtimthayketqua ?></strong>
            </div>
        <?php } ?>

        <div class="all_bancothethich_fw">
            <div class="title_csbh">Đánh giá</div>
            <div class="all_rating_des">
                <div class="rating_des_left">
                    <div class="all_rating_right_des">
                        <div class="all_number_rating">
                            <div class="rating_right_number"><?= $func->get_rating_number($row_detail['id']) ?></div>
                            <div class="rating_right_soluong">
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
                                            <span style="width:<?= $func->get_phantram_rating($row_detail['id']) ?>%;"></span>
                                        </div>
                                        <div class="votes"><?= $func->get_rating($row_detail['id']) ?> đánh giá</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="all_rating_loai">
                            <div class="percentages">
                                <div class="glsr-bar" data-level="5">
                                    <span class="glsr-bar-label">5 sao</span>
                                    <span class="glsr-bar-background">
                                        <span class="glsr-bar-background-percent" style="width:<?= $func->get_phantram_rating_loai($row_detail['id'], 5) ?>%"></span>
                                    </span>
                                    <span class="glsr-bar-percent"><?= $func->get_phantram_rating_loai($row_detail['id'], 5) ?>%</span>
                                </div>
                                <div class="glsr-bar" data-level="4">
                                    <span class="glsr-bar-label">4 sao</span>
                                    <span class="glsr-bar-background">
                                        <span class="glsr-bar-background-percent" style="width:<?= $func->get_phantram_rating_loai($row_detail['id'], 4) ?>%"></span>
                                    </span>
                                    <span class="glsr-bar-percent"><?= $func->get_phantram_rating_loai($row_detail['id'], 4) ?>%</span>
                                </div>
                                <div class="glsr-bar" data-level="3">
                                    <span class="glsr-bar-label">3 sao</span>
                                    <span class="glsr-bar-background">
                                        <span class="glsr-bar-background-percent" style="width:<?= $func->get_phantram_rating_loai($row_detail['id'], 3) ?>%"></span>
                                    </span>
                                    <span class="glsr-bar-percent"><?= $func->get_phantram_rating_loai($row_detail['id'], 3) ?></span>
                                </div>
                                <div class="glsr-bar" data-level="2">
                                    <span class="glsr-bar-label">2 sao</span>
                                    <span class="glsr-bar-background">
                                        <span class="glsr-bar-background-percent" style="width:<?= $func->get_phantram_rating_loai($row_detail['id'], 2) ?>%"></span>
                                    </span>
                                    <span class="glsr-bar-percent"><?= $func->get_phantram_rating_loai($row_detail['id'], 2) ?></span>
                                </div>
                                <div class="glsr-bar" data-level="1">
                                    <span class="glsr-bar-label">1 sao</span>
                                    <span class="glsr-bar-background">
                                        <span class="glsr-bar-background-percent" style="width:<?= $func->get_phantram_rating_loai($row_detail['id'], 1) ?>%"></span>
                                    </span>
                                    <span class="glsr-bar-percent"><?= $func->get_phantram_rating_loai($row_detail['id'], 1) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="all_hinhanh_danhgia">
                        <?php
                        $all_tong_photo = '';
                        $rating = $d->rawQuery("select * from #_rating where hienthi > 0 and id_product = '" . $row_detail['id'] . "' order by id desc");
                        foreach ($rating as $v) {
                            if (!empty($v['photo'])) {
                                $photo = explode(',', $v['photo']);
                                $count_photo = count($photo);
                                $photo_con = '';
                        ?>
                                <div class="img_danhgia">
                                    <a data-fancybox="album" data-src="<?= Helper::thumbnail_link($photo[0]) ?>">
                                        <img src="<?= Helper::thumbnail_link($photo[0]) ?>" alt="" width="70" height="70">
                                    </a>
                                    <div class="d-none">
                                        <?php for ($i = 1; $i < $count_photo; $i++) {
                                            $photo_con .= $photo[$i] . ','; ?>
                                            <a data-fancybox="album" data-src="<?= Helper::thumbnail_link($photo[$i]) ?>"></a>
                                        <?php } ?>
                                    </div>
                                </div>
                        <?php $all_photo = $photo_con;
                            }
                            $all_tong_photo .= $all_photo;
                        } ?>
                    </div>
                    <?php
                    // var_dump($all_photo);
                    $all_tong_photo = substr($all_tong_photo, 0, -1);
                    $all_tong_photo = explode(',', $all_tong_photo);
                    $count_photo = count($all_tong_photo);
                    ?>
                    <input type="hidden" name="all_photo" class="all_photo" value="<?= $count_photo ?>">
                </div>
                <div class="rating_des_right">
                    <div class="title_danhgia_sp">Đánh giá sản phẩm</div>

                    <div class="chiase_camnhan">
                        <span>Chia sẻ suy nghĩ và đánh giá của bạn về sản phẩm</span>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rating">
                            <i class="far fa-star"></i>
                            <span>Gửi đánh giá của bạn</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="test"></div>
            <div class="all_noidung_danhgia">
                <div class="title_csbh">Danh sách đánh giá (<?= $func->get_rating($row_detail['id']) ?>)</div>
                <div class="paging-rating" data-id="<?= $row_detail['id'] ?>">
                    <div class="all_rating" data-id="<?= $row_detail['id'] ?>"></div>
                </div>
            </div>
        </div>

        <?php
        $tacgia = $d->rawQueryOne("select * from #_news where type = 'tac-gia' and id = '" . $row_detail['id_author'] . "' and hienthi > 0 order by stt,id desc");
        if ($tacgia) {
        ?>
            <div class="tacgia">
                <div class="author-img">
                    <?= Helper::the_thumbnail($tacgia['photo'], '', $tacgia['ten' . $lang], true) ?>
                </div>
                <div class="author-description">
                    <div class="name_author"><?= $tacgia['ten' . $lang] ?></div>
                    <div class="mota_author"><?= $tacgia['mota' . $lang] ?></div>
                </div>
            </div>
        <?php } ?>

        <div class="title_dm_nb_index mb-4">
            <div class="title_dm_left">
                <div class="title_dm_nb_list">Bài viết liên quan</div>
            </div>
        </div>
        <div class="content-main w-clear">
            <?php if (isset($news) && count($news) > 0) { ?>
                <div class="owl-carousel owl-theme auto_deal mainkhung_product">
                    <?php foreach ($news as $k => $v) { ?>
                        <a href="<?= $v['tenkhongdauvi'] ?>">
                            <div class="post mt-3 pb-3" style="box-shadow: none;">
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
                </div>
                <div class="clear"></div>
                <!-- <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div> -->
            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            <?php } ?>
        </div>
        <!-- <div class="all_share_like_fb">
                <div class="title_share">Share</div>
                <div class="like_fb">
                    <div class="fb-like" data-href="<?= $func->getCurrentPageURL() ?>" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>
                </div>
            </div> -->
        <!-- <div class="fb-comments" data-href="<?= $func->getCurrentPageURL() ?>" data-numposts="3" data-colorscheme="light" data-width="100%"></div> -->
    </div>
</div>
