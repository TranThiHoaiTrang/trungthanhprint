<div class="wrap_gioithieu">
    <!-- <div class="fixwidth"> -->
    <div class="all_slide_text">
        <div class="cs_moving_section_in">
            <div class="cs_moving_section2">
                <div class="cs_partner_logo_wrap">
                    <div class="slide_text">
                        <div class="text_slide_text">
                            Trung Thành Print
                        </div>
                    </div>
                    <div class="slide_text">
                        <div class="text_slide_text">
                            <img src="./assets/images/icon_hoa.png" alt="">
                        </div>
                    </div>
                    <div class="slide_text">
                        <div class="text_slide_text">
                            Trung Thành Print
                        </div>
                    </div>
                    <div class="slide_text">
                        <div class="text_slide_text">
                            <img src="./assets/images/icon_hoa.png" alt="">
                        </div>
                    </div>
                    <div class="slide_text">
                        <div class="text_slide_text">
                            Trung Thành Print
                        </div>
                    </div>
                    <div class="slide_text">
                        <div class="text_slide_text">
                            <img src="./assets/images/icon_hoa.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="cs_moving_section2">
                <div class="cs_partner_logo_wrap">
                    <div class="slide_text">
                        <div class="text_slide_text">
                            Trung Thành Print
                        </div>
                    </div>
                    <div class="slide_text">
                        <div class="text_slide_text">
                            <img src="./assets/images/icon_hoa.png" alt="">
                        </div>
                    </div>
                    <div class="slide_text">
                        <div class="text_slide_text">
                            Trung Thành Print
                        </div>
                    </div>
                    <div class="slide_text">
                        <div class="text_slide_text">
                            <img src="./assets/images/icon_hoa.png" alt="">
                        </div>
                    </div>
                    <div class="slide_text">
                        <div class="text_slide_text">
                            Trung Thành Print
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="all_gioithie_index">
        <div class="row align-items-center">
            <div class="col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" >
                <div class="all_content_gioithieu">
                    <h2 class="mota_ngan_gioithieu"><?= htmlspecialchars_decode($gioithieu['motangan' . $lang]) ?></h2>
                    <div class="mota_gioithieu"><?= htmlspecialchars_decode($gioithieu['mota' . $lang]) ?></div>
                    <a href="gioi-thieu">
                        <div class="xemthem_gioithieu">
                            <div class="icon_xt"><i class="fas fa-arrow-right"></i></div>
                            <span>Về chúng tôi</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-8 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" >
                <a data-fancybox="video" data-src="<?= $video_gioithieu['link_video'] ?>" data-name="<?= $video_gioithieu['ten' . $lang] ?>" title="<?= $video_gioithieu['ten' . $lang] ?>">
                    <div class="img_gioithieu">
                        <?= Helper::the_thumbnail($gioithieu['photo'], '', $gioithieu['ten' . $lang], true) ?>
                        <div class="icon_video_gioithieu">
                            <img src="./assets/images/play.png" alt="">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="wrap_sanpham">
    <div class="fixwidth">
        <div class="all_title_dm_sanpham">
            <h2 class="title_dm_sanpham">
                <span>Danh mục</span>
                <span>sản phẩm</span>
            </h2>
            <div class="mota_dm_sanpham">
                Nibh venenatis cras sed felis. Rhoncus est pellentesque elit ullamcorper <br>
                dignissim cras tincidunt lobortis.
            </div>
        </div>
    </div>
    <div class="all_dm_sanpham">
        <div class="owl-carousel owl-theme owl-dv">
            <?php foreach ($splistmenu as $v) { ?>
                <a href="<?= $v['tenkhongdauvi'] ?>">
                    <div class="dm_sanpham aos-init aos-animate" data-aos="zoom-in" data-aos-duration="800">
                        <div class="img_dm_sanpham">
                            <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                        </div>
                        <div class="name_dm_sanpham"><?= $v['ten' . $lang] ?></div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</div>

<div class="wrap_sanpham_nb">
    <div class="fixwidth">
        <div class="all_title_dm_nb">
            <h2 class="title_dm_nb">
                <span>Sản phẩm</span>
                <span>nổi bật</span>
            </h2>
        </div>
    </div>
    <div class="all_dm_nb_index">
        <?php foreach ($splisthot as $l) {
            $sphot = $d->rawQuery("select * from #_product where type = ? and id_list = ? and noibat > 0 and hienthi > 0 order by stt,id desc", array('san-pham', $l['id']));
        ?>
            <div class="fixwidth">
                <a href="<?= $l['tenkhongdauvi'] ?>">
                    <div class="title_dm_nb_index">
                        <div class="title_dm_left">
                            <div class="title_dm_nb_list"><?= $l['ten' . $lang] ?></div>
                            <hr>
                            <div class="mota_dm_nb"><?= htmlspecialchars_decode($l['motangan' . $lang]) ?></div>
                        </div>
                        <div class="title_dm_right">
                            <div class="xemtatcat_dm">
                                <span>Xem tất cả</span>
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="all_control_sp_dm_nb_index">
                <div class="all_control_auto_deal">
                    <p class="control-deal prev-deal transition"><i class="fas fa-arrow-left"></i></p>
                    <p class="control-deal next-deal transition"><i class="fas fa-arrow-right"></i></p>
                </div>
                <div class="all_sp_dm_nb_index">
                    <div class="owl-carousel owl-theme auto_deal">
                        <?php foreach ($sphot as $v) { ?>
                            <a href="<?= $v['tenkhongdauvi'] ?>">
                                <div class="sp_dm_nb_index aos-init aos-animate" data-aos="zoom-in" data-aos-duration="800">
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
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="wrap_bottom" style="background: #FEFBEA;">
    <div class="fixwidth">
        <div class="all_title_dm_sanpham">
            <h2 class="title_dm_sanpham">
                <span>Tại sao chọn</span>
                <span>Trung Thành Print</span>
            </h2>
            <div class="mota_dm_sanpham">
                <?= htmlspecialchars_decode($taisaochon['mota' . $lang]) ?>
            </div>
        </div>
        <div class="row row_taisochon mt-5">
            <div class="col-md-7 aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
                <div class="all_title_taisochon">
                    <div class="title_tsc">
                        <div class="tieude_tsc"><?= $taisaochon['ten' . $lang] ?></div>
                        <div class="motangan_tsc"><?= $taisaochon['motangan' . $lang] ?></div>
                    </div>
                    <div class="icon_tsc">
                        <img src="./assets/images/icon_tsc.png" alt="">
                    </div>
                </div>
                <div class="img_tsc">
                    <?= Helper::the_thumbnail($taisaochon['photo'], '', $taisaochon['ten' . $lang], true) ?>
                </div>
            </div>
            <div class="col-md-5 aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
                <div class="all_ly_do_index">
                    <?php foreach ($lydo as $v) { ?>
                        <div class="ly_do_index">
                            <div class="content_ly_do">
                                <div class="name_ly_do"><?= $v['ten' . $lang] ?></div>
                                <div class="noidung_ly_do"><?= htmlspecialchars_decode($v['noidung' . $lang]) ?></div>
                            </div>
                            <div class="img_ly_do">
                                <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="all_nhungconso_index aos-init aos-animate" data-aos="zoom-in" data-aos-duration="800">
            <?php foreach ($nhungconso as $v) { ?>
                <div class="nhungconso_index">
                    <div class="name_ncs"><?= $v['ten' . $lang] ?></div>
                    <div class="noidung_ncs"><?= htmlspecialchars_decode($v['noidung' . $lang]) ?></div>
                </div>
                <hr>
            <?php } ?>
        </div>
    </div>
</div>

<div class="wrap_baochi">
    <div class="fixwidth">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="all_hinhanh_baochi">
                    <?php foreach ($baochi as $v) { ?>
                        <a href="<?= $v['link'] ?>">
                            <div class="baochi">
                                <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-5">
                <h2 class="title_baochi"><?= htmlspecialchars_decode($noidungbaochi['mota' . $lang]) ?></h2>
                <div class="noidung_baochi"><?= htmlspecialchars_decode($noidungbaochi['noidung' . $lang]) ?></div>
            </div>
        </div>
        <div class="all_video_title_index all_title_video">
            <div class="all_title_dm_sanpham">
                <h2 class="title_dm_sanpham">
                    <span>Video nhà xưởng</span>
                    <span>Trung Thành Print</span>
                </h2>
            </div>
            <div class="all_video_index aos-init aos-animate" data-aos="zoom-in" data-aos-duration="800">
                <p class="control-social prev-social transition"><i class="fas fa-arrow-left"></i></p>
                <div class="owl-carousel owl-theme auto_social">
                    <?php foreach ($video as $v) { ?>
                        <a data-fancybox="video" data-src="<?= $v['video'] ?>"
                            data-name="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>">
                            <div class="video_index">
                                <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                                <div class="icon_play">
                                    <img src="./assets/images/play_video.png" alt="">
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <p class="control-social next-social transition"><i class="fas fa-arrow-right"></i></p>
            </div>
        </div>
    </div>
</div>

<div class="wrap_tintuc">
    <div class="fixwidth">
        <a href="tin-tuc">
            <div class="all_title_xemthem_index">
                <div class="all_title_tintuc_index">
                    <h2 class="title_tintuc_index">
                        <span>Tin tức</span>
                        <span>nổi bật</span>
                    </h2>
                    <hr>
                    <div class="mota_tintuc_index">
                        Discover our most requested packaging products for your bussiness.
                    </div>
                </div>
                <div class="xemthemtintuc_index">
                    <div class="xemtatcat_dm">
                        <span>Xem tất cả</span>
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="all_control_tintuc_noidung_index">
        <div class="all_control_auto_brand">
            <p class="control-brand prev-brand transition"><i class="fas fa-arrow-left"></i></p>
            <p class="control-brand next-brand transition"><i class="fas fa-arrow-right"></i></p>
        </div>
        <div class="all_tintuc_index">
            <div class="owl-carousel owl-theme auto_brand">
                <?php foreach ($tintuc as $v) {
                    $tintuclist = $d->rawQueryOne("select * from #_news_list where type = ? and id = ? and hienthi > 0 order by stt,id desc", array('tin-tuc', $v['id_list']));
                ?>
                    <div class="tintuc_index aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                        <div class="img_tintuc_index">
                            <a href="<?= $v['tenkhongdauvi'] ?>"><?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?></a>
                        </div>
                        <div class="content_tintuc_index">
                            <a href="<?= $tintuclist['tenkhongdauvi'] ?>">
                                <div class="danhmuc_tintuc_index">
                                    <span><?= $tintuclist['ten' . $lang] ?></span>
                                    <span></span>
                                    <span>News</span>
                                </div>
                            </a>
                            <a href="<?= $v['tenkhongdauvi'] ?>">
                                <div class="name_tintuc_index"><?= $v['ten' . $lang] ?></div>
                            </a>
                            <div class="time_tintuc_index">
                                <div class="date"><?= date("d.m.Y", $v['ngaytao']) ?></div>
                                <span>Bởi HD Agency</span>
                            </div>
                            <div class="mota_tintuc_index_post"><?= htmlspecialchars_decode($v['motangan' . $lang]) ?></div>
                            <a href="<?= $v['tenkhongdauvi'] ?>">
                                <div class="xemthem_gioithieu">
                                    <div class="icon_xt"><i class="fas fa-arrow-right"></i></div>
                                    <span>Xem thêm</span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
