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
<!-- <div class="all_banner_page">
    <div class="fixwidth">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="noidung_banner_page">
                    </?= htmlspecialchars_decode($row_detail['motangan' . $lang]) ?>
                </div>
                <div class="mota_banner_page">
                    </?= htmlspecialchars_decode($row_detail['mota' . $lang]) ?>
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
                    </?= Helper::the_thumbnail($row_detail['photo1'], '', $row_detail['ten' . $lang], true) ?>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="pt-5 pb-5" style="background: #F1F6F8;">
    <input type="hidden" name="idpro" value="<?= $row_detail['id'] ?>">
    <div class="fixwidth">
        <div class="clearfix">
            <div class="grid-pro-detail w-clear">
                <div class="left-pro-detail w-clear">
                    <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: magnifier; hint: always; rightClick: true; selectorTrigger: click; expandCaption: true; expand: true; variableZoom: true;" href="<?= Helper::thumbnail_link($row_detail['photo']) ?>" title="<?= $row_detail['ten' . $lang] ?>">
                        <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($row_detail['photo']) ?>" alt="<?= $row_detail['ten' . $lang] ?>">
                    </a>
                    <?php
                    if ($row_detail['gallery'] || $row_detail['link_video']) { ?>
                        <div class="gallery-thumb-pro">
                            <p class="control-carousel prev-carousel prev-thumb-pro transition"><i class="fas fa-chevron-left"></i></p>
                            <div class="owl-carousel owl-theme owl-thumb-pro">
                                <?php if ($row_detail['link_video']) {
                                    $youtubeId = $func->getYoutube($row_detail['link_video']);
                                ?>
                                    <a class="thumb-pro-detail thumb-pro-detail-video" data-zoom-id="Zoom-1" href="https://www.youtube.com/embed/<?= $youtubeId ?>?autoplay=1" onclick="playVideoOnMain('<?= $youtubeId ?>');" data-type="iframe" title="<?= $row_detail['ten' . $lang] ?>">
                                        <img src="https://img.youtube.com/vi/<?= $youtubeId ?>/maxresdefault.jpg" alt="<?= $row_detail['ten' . $lang] ?>" />
                                    </a>
                                <?php } ?>
                                <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="javascript:void(0);" onclick="showImageInMain('<?= Helper::thumbnail_link($row_detail['photo']) ?>', '<?= $row_detail['ten' . $lang] ?>');" title="<?= $row_detail['ten' . $lang] ?>">
                                    <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($row_detail['photo']) ?>" alt="<?= $row_detail['ten' . $lang] ?>">
                                </a>
                                <?php
                                if($row_detail['gallery']){
                                $hinhanhsp = explode(',', $row_detail['gallery']);
                                if (count($hinhanhsp) > 0) { ?>
                                    <?php foreach ($hinhanhsp as $v) { ?>
                                        <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="javascript:void(0);" onclick="showImageInMain('<?= Helper::thumbnail_link($v) ?>', '<?= $row_detail['ten' . $lang] ?>');" title="<?= $row_detail['ten' . $lang] ?>">
                                            <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($v) ?>">
                                        </a>
                                    <?php } ?>
                                <?php } } ?>
                            </div>
                            <p class="control-carousel next-carousel next-thumb-pro transition"><i class="fas fa-chevron-right"></i></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="right-pro-detail w-clear">
                    <h1 class="title-pro-detail"><?= $row_detail['title_phu' . $lang] ?></h1>
                    <div class="thongtin_product">
                        <span>Chất liệu: </span>
                        <span><?= $row_detail['chatlieu'] ?> </span>
                    </div>
                    <div class="thongtin_product">
                        <span>Kích thước: </span>
                        <span><?= $row_detail['kichthuoc'] ?> </span>
                    </div>
                    <div class="attr-pro-detail">
                        <span>Giá bán: </span>
                        <div class="all_gia_detail">
                            <?php if ($row_detail['giamoi']) { ?>
                                <del>
                                    <ins class="highlight_del">
                                        <?= $func->format_money($row_detail['gia']) ?>
                                    </ins>
                                </del>
                                <p class="price" style="margin-bottom: 0;">
                                    <ins class="highlight">
                                        <?= $func->format_money($row_detail['giamoi']) ?>
                                    </ins>
                                    <input type="hidden" name="giasize" value="<?= $row_detail['giamoi'] ?>">
                                </p>
                            <?php } else { ?>
                                <p class="price" style="margin-bottom: 0;">
                                    <ins class="highlight">
                                        <?= $func->format_money($row_detail['gia']) ?>
                                    </ins>
                                    <input type="hidden" name="giasize" value="<?= $row_detail['gia'] ?>">
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="thongtin_product">
                        <span>Đơn vị sản xuất: </span>
                        <span><?= $row_detail['donvisanxuat'] ?> </span>
                    </div>
                    <div class="thongtin_product">
                        <span>Vận chuyển: </span>
                        <span><?= $row_detail['vanchuyen'] ?> </span>
                    </div>
                    <div class="thongtin_product">
                        <span>Liên hệ đặt hàng: </span>
                        <span><?= $optsetting['hotline'] ?> </span>
                    </div>
                    <div class="thongtin_product">
                        <span>Mô tả ngắn: </span>
                        <div class="content_product_detail">
                            <?= (isset($row_detail['mota' . $lang]) && $row_detail['mota' . $lang] != '') ? htmlspecialchars_decode($row_detail['mota' . $lang]) : '' ?>
                        </div>
                    </div>
                    <div class="thongtin_product">
                        <span>Số đăng kí: </span>
                        <span><?= $row_detail['sodangki'] ?> </span>
                    </div>
                    <a href="lien-he">
                        <div class="baogiangay">
                            <span>Báo giá ngay</span>
                        </div>
                    </a>
                    <div class="all_doitra_mienphi_prodetail">
                        <div class="doitra_mienphi_prodetail">
                            <div class="img_doitra_mienphi_prodetail">
                                <img src="./assets/images/icon_doitra.png" alt="">
                            </div>
                            <div class="content_doitra_mienphi_prodetail">
                                <span>Đổi trả trong 30 ngày</span>
                                <span>kể từ ngày mua hàng</span>
                            </div>
                        </div>
                        <div class="doitra_mienphi_prodetail">
                            <div class="img_doitra_mienphi_prodetail">
                                <img src="./assets/images/icon_vanchuyen.png" alt="">
                            </div>
                            <div class="content_doitra_mienphi_prodetail">
                                <span>Miễn phí vận chuyển</span>
                                <span>theo chính sách giao hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="all_nd_product_detail">
                <div class="entry-post mt-0">
                    <div class="entry-left">
                        <div class="contact_product">
                            <div class="info-pro-detail active all_gioithieu_index" id="toc-content">
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
            </div>
        </div>

        <div class="all_bancothethich_fw mt-0">
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
            <div class="tacgia mt-0">
                <div class="author-img">
                    <?= Helper::the_thumbnail($tacgia['photo'], '', $tacgia['ten' . $lang], true) ?>
                </div>
                <div class="author-description">
                    <div class="name_author"><?= $tacgia['ten' . $lang] ?></div>
                    <div class="mota_author"><?= $tacgia['mota' . $lang] ?></div>
                </div>
            </div>
        <?php } ?>

        <!-- <div class="title_sp_cungloai">Sản phẩm tương tự</div> -->
        <div class="title_dm_nb_index mb-4">
            <div class="title_dm_left">
                <div class="title_dm_nb_list">Sản phẩm tương tự</div>
            </div>
        </div>
        <div class="content-main w-clear">
            <?php if (isset($product) && count($product) > 0) { ?>
                <div class="owl-carousel owl-theme auto_deal mainkhung_product">
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
                <div class="clear"></div>
                <!-- <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div> -->
            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            <?php } ?>
        </div>
    </div>
</div>