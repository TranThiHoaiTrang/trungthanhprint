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
                <h1 class="noidung_banner_page">
                    <?= htmlspecialchars_decode($seopage['noidung' . $lang]) ?>
                </h1>
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
                    <?= Helper::the_thumbnail($seopage['photo1'], '', $seopage['ten' . $lang], true) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="all_contact_lienhe">
    <div class="fixwidth">
        <div class="content-main w-clear">
            <div class="all_row_lienhe_contact">
                <div class="row_lienhe_contact">
                    <div class="img_lienhe_contact">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="content_lienhe_contact">
                        <div class="lienhe_contact">
                            <span>Phone: </span>
                            <span><?= $optsetting['hotline'] ?></span>
                        </div>
                        <div class="lienhe_contact">
                            <span>Mobile: </span>
                            <span><?= $optsetting['dienthoai'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="row_lienhe_contact">
                    <div class="img_lienhe_contact">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="content_lienhe_contact">
                        <div class="lienhe_contact">
                            <span><?= $optsetting['email'] ?></span>
                        </div>
                        <div class="lienhe_contact">
                            <span><?= $optsetting['email2'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="row_lienhe_contact">
                    <div class="img_lienhe_contact">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="content_lienhe_contact">
                        <?php foreach ($chinhanh as $v) { ?>
                            <div class="lienhe_contact">
                                <span><?= $v['ten' . $lang] ?>: </span>
                                <span><?= $v['diachi'] ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="all_form_contact">
                <div class="row">
                    <div class="col-md-4">
                        <div class="img_contact">
                            <?= Helper::the_thumbnail($seopage['photo'], '', $seopage['ten' . $lang], true) ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="all_title_lienhe">
                            <span>Hãy liên hệ</span>
                            <span>Với chúng tôi</span>
                        </div>
                        <form class="form-contact validation-contact aos-init aos-animate" data-aos="fade-up" novalidate method="post" action="" enctype="multipart/form-data">
                            <div class="input-contact">
                                <input type="text" class="form-control" id="ten" name="ten" placeholder="<?= hoten ?>" required />
                                <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                            </div>
                            <div class="input-contact">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
                                <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                            </div>
                            <div class="input-contact">
                                <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?= sodienthoai ?>" required />
                                <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                            </div>
                            <!-- <div class="input-contact">
                            <input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?= diachi ?>" required />
                            <div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
                            </div> -->

                            <!-- <div class="input-contact">
                            <input type="text" class="form-control" id="tieude" name="tieude" placeholder="<?= chude ?>" required />
                            <div class="invalid-feedback"><?= vuilongnhapchude ?></div>
                            </div> -->
                            <div class="input-contact">
                                <textarea class="form-control" id="noidung" name="noidung" placeholder="<?= noidung ?>" required /></textarea>
                                <div class="invalid-feedback"><?= vuilongnhapnoidung ?></div>
                            </div>
                            <!-- <div class="input-contact">
                            <input type="file" class="custom-file-input" name="file">
                            <label class="custom-file-label" for="file" title="<?= chon ?>"><?= dinhkemtaptin ?></label>
                            </div> -->
                            <div class="all_btn_contact">
                                <i class="fas fa-paper-plane"></i>
                                <input type="submit" class="btn btn_contact" name="submit-contact" value="Gửi mail" disabled />
                            </div>
                            <!-- <input type="reset" class="btn btn-secondary" value="<?= nhaplai ?>" /> -->
                            <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
                        </form>
                    </div>
                </div>
            </div>
            <div class="top-contact">
                <div class="bottom-contact">
                    <?= htmlspecialchars_decode($optsetting['toado_iframe']) ?>
                    <div class="button_xembando">
                        <img src="./assets/images/xembando.png" alt="">
                        <span>Xem bản đồ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>