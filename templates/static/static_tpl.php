<div class="mb-4 mt-5 all_breadCrumbs">
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
</div> -->
<div class="content-main">
    <div class="fixwidth">
        <div class="all_gioithieu_index all_gioithieu_index_noidung pt-5">
            <?php if ($static['noidung' . $lang]) { ?>
                <?= (isset($static['noidung' . $lang]) && $static['noidung' . $lang] != '') ? htmlspecialchars_decode($static['noidung' . $lang]) : '' ?>
            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="wrap_csht">
    <div class="fixwidth">
        <div class="all_video_title_index">
            <div class="all_title_dm_sanpham">
                <div class="title_dm_sanpham">
                    <span>Cơ sở hạ tầng máy móc</span>
                    <span>Công Ty Trung Thành Print</span>
                </div>
            </div>
            <div class="all_video_index">
                <p class="control-social prev-social transition"><i class="fas fa-arrow-left"></i></p>
                <div class="owl-carousel owl-theme auto_social">
                    <?php foreach ($cosohatang as $v) { ?>
                        <div class="cosohatang_index">
                            <div class="img_cosohatang">
                                <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                            </div>
                            <div class="name_cosohatang">
                                <?= $v['ten' . $lang] ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <p class="control-social next-social transition"><i class="fas fa-arrow-right"></i></p>
            </div>
        </div>
    </div>
</div>

<div class="wrap_doingunhanvien">
    <div class="fixwidth">
        <div class="all_video_title_index">
            <div class="all_title_dm_sanpham">
                <div class="title_dm_sanpham">
                    <span>Đội ngũ</span>
                    <span>Nhân viên</span>
                </div>
            </div>
            <div class="all_dnnv_index">
                <p class="control-dnnv prev-dnnv transition"><i class="fas fa-arrow-left"></i></p>
                <div class="owl-carousel owl-theme auto_dnnv">
                    <?php foreach ($cosohatang as $v) { ?>
                        <div class="cosohatang_index">
                            <div class="img_cosohatang">
                                <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                            </div>
                            <div class="name_cosohatang">
                                <?= $v['ten' . $lang] ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <p class="control-dnnv next-dnnv transition"><i class="fas fa-arrow-right"></i></p>
            </div>
        </div>
    </div>
</div>

<div class="wrap_quatrinhhinhthanh">
    <div class="fixwidth">
        <div class="all_video_title_index">
            <div class="all_title_dm_sanpham">
                <div class="title_dm_sanpham">
                    <span>Lịch sử quá trình</span>
                    <span>hình thành</span>
                </div>
            </div>
            <div class="all_quatrinhhinhthanh_index">
                <p class="control-quatrinhhinhthanh prev-quatrinhhinhthanh transition"><i class="fas fa-arrow-left"></i></p>
                <div class="owl-carousel owl-theme auto_quatrinhhinhthanh">
                    <?php foreach ($quatrinhhinhthanh as $v) { ?>
                        <div class="row_quatrinhhinhthanh_index">
                            <div class="row_quatrinhhinhthanh_top">
                                <div class="name_quatrinhhinhthanh">
                                    <?= $v['ten' . $lang] ?>
                                </div>
                                <div class="noidung_quatrinhhinhthanh">
                                    <?= htmlspecialchars_decode($v['noidung' . $lang]) ?>
                                </div>
                            </div>
                            <hr>
                            <div class="img_quatrinhhinhthanh">
                                <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <p class="control-quatrinhhinhthanh next-quatrinhhinhthanh transition"><i class="fas fa-arrow-right"></i></p>
            </div>
        </div>
    </div>
</div>

<div class="wrap_tamnhin">
    <div class="fixwidth">
        <div class="all_video_title_index">
            <div class="all_title_dm_sanpham mb-4">
                <div class="title_dm_sanpham">
                    <span>Tầm nhìn, </span>
                    <span>Sứ mệnh</span>
                </div>
            </div>
            <div class="all_tamnhinsumenh_about">
                <?php foreach ($tamnhansumenh as $v) { ?>
                    <div class="tamnhinsumenh_about">
                        <div class="img_tamnhinsumenh">
                            <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                        </div>
                        <div class="name_tamnhinsumenh"><?= $v['ten' . $lang] ?></div>
                        <div class="noidung_tamnhinsumenh"><?= htmlspecialchars_decode($v['noidung' . $lang]) ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="wrap_tamnhin pt-0">
    <div class="fixwidth">
        <div class="all_video_title_index">
            <div class="all_title_dm_sanpham">
                <div class="title_dm_sanpham">
                    <span>Lĩnh vực</span>
                    <span>hoạt động</span>
                </div>
                <div class="mota_title_lvhd">
                    Trung Thành Print hoạt động với 2 lĩnh vực chính: in ấn và thiết kế. <br>
                    Các sản phẩm hoạt động chính là:
                </div>
            </div>
            <div class="all_row_lvhd_about">
                <?php foreach ($linhvuchoatdong as $v) {
                    $hinhanhlvhd = explode(',', $v['gallery']);
                ?>
                    <div class="row_lvhd_about mb-4">
                        <div class="name_row_lvhd_about"><?= $v['ten' . $lang] ?></div>
                        <div class="all_owl_row_lvhd_about">
                            <p class="control-lvhd prev-lvhd transition"><i class="fas fa-arrow-left"></i></p>
                            <div class="owl-carousel owl-theme auto_lvhd">
                                <?php foreach ($hinhanhlvhd as $ha) { ?>
                                    <div class="img_lvhd">
                                        <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($ha) ?>">
                                    </div>
                                <?php } ?>
                            </div>
                            <p class="control-lvhd next-lvhd transition"><i class="fas fa-arrow-right"></i></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="wrap_tamnhin pt-0">
    <div class="fixwidth">
        <div class="all_video_title_index">
            <div class="all_title_dm_sanpham">
                <div class="title_dm_sanpham">
                    <span>Khách hàng nói gì về Trung Thành Print</span>
                </div>
            </div>
            <div class="all_danhgia">
                <p class="control-baiviet prev-baiviet transition"><i class="fas fa-arrow-left"></i></p>
                <div class="owl-carousel owl-theme auto_baiviet">
                    <?php foreach ($khachhang as $v) { ?>
                        <div class="danhgia">
                            <div class="noidung_danhgia">
                                <?= htmlspecialchars_decode($v['noidung' . $lang]) ?>
                            </div>
                            <div class="all_hinhanh_mota_danhgia">
                                <div class="img_danhgia">
                                    <?= Helper::the_thumbnail($v['photo'], 62, 62, '', $v['ten' . $lang], true) ?>
                                </div>
                                <div class="name_mota_danhgia">
                                    <div class="all_name_mt_left">
                                        <div class="name_danhgia"><?= $v['ten' . $lang] ?></div>
                                        <div class="mota_danhgia"><?= $v['mota' . $lang] ?></div>
                                    </div>
                                    <div class="all_name_mt_right">
                                        <img src="./assets/images/ngoac.png" alt="" width="40" height="40">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <p class="control-baiviet next-baiviet transition"><i class="fas fa-arrow-right"></i></p>
            </div>
        </div>
    </div>
</div>

<div class="wrap_khtb">
    <div class="fixwidth">
        <div class="row">
            <div class="col-md-8">
                <div class="all_video_title_index">
                    <div class="all_title_dm_sanpham">
                        <div class="title_dm_sanpham">
                            <span>Khách hàng tiêu biểu</span>
                        </div>
                    </div>
                    <div class="all_khachhangtieubieu">
                        <?php
                        $col_khachhangtieubieu = ceil(count($khachhangtieubieu) / 8);
                        ?>
                        <p class="control-khachhangtieubieu prev-khachhangtieubieu transition"><i class="fas fa-arrow-left"></i></p>
                        <div class="owl-carousel owl-theme auto_khachhangtieubieu">
                            <?php $j = 0;
                            for ($i = 0; $i < $col_khachhangtieubieu; $i++) {
                            ?>
                                <div class="all_khachhangtieubieu">
                                    <?php
                                    $khtb = $d->rawQuery("select * from #_photo where type = 'khachhang-tieubieu' and hienthi > 0 order by stt,id desc limit $j,8");
                                    $j += 8;
                                    foreach ($khtb as $v) {
                                    ?>
                                        <div class="img_khachhangtieubieu">
                                            <?= Helper::the_thumbnail($v['photo']) ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <p class="control-khachhangtieubieu next-khachhangtieubieu transition"><i class="fas fa-arrow-right"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wrap_lhtv">
    <div class="fixwidth">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="all_title_send_mail">
                    <img src="./assets/images/send_mail.png" alt="">
                    <span>Liên hệ tư vấn nhanh</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="all_form_contact_about">
                    <form class="form-contact validation-contact aos-init aos-animate" data-aos="fade-up" novalidate method="post" action="" enctype="multipart/form-data">
                        <div class="input-contact">
                            <input type="text" class="form-control" id="ten" name="ten" placeholder="<?= hoten ?>" required />
                            <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                        </div>
                        <div class="input-contact">
                            <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?= sodienthoai ?>" required />
                            <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                        </div>
                        <div class="input-contact">
                            <textarea class="form-control" id="noidung" name="noidung" placeholder="<?= noidung ?>" required /></textarea>
                            <div class="invalid-feedback"><?= vuilongnhapnoidung ?></div>
                        </div>
                        <div class="all_btn_contact">
                            <i class="fas fa-paper-plane"></i>
                            <input type="submit" class="btn btn_contact" name="submit-contact" value="Gửi mail" disabled />
                        </div>
                        <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>