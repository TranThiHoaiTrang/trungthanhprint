<div class="mb-5 all_breadCrumbs">
    <div class="fixwidth">
        <div class="all_bread d-flex">
            <!-- <div class="bread_title"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></div> -->
            <div class="breadCrumbs">
                <div><?= $breadcrumbs ?></div>
            </div>
        </div>
    </div>
</div>
<div class="content-main">
    <div class="fixwidth">
        <div class="row">
            <div class="col-md-9">
                <div class="contact_news w-clear">
                    <div class="row_tintuc_index_right" style="width: 100%;">
                        <div class="form_index_tintuc">
                            <div class="all_title_form_index">
                                <div class="icon_title_form_index">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <div class="title_form_index">
                                    <span>ĐĂNG KÝ MUA HÀNG</span>
                                    <span>Hãy để số điện thoại để nhận mua hàng</span>
                                </div>
                            </div>
                        </div>
                        <form class="form-dktv validation-contact" novalidate method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="dktv">
                            <div class="input-dktv">
                                <input type="text" class="form-control" id="ten" name="ten" placeholder="<?= hoten ?>" required />
                                <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                            </div>
                            <div class="input-dktv">
                                <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?= sodienthoai ?>" required />
                                <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                            </div>
                            <div class="input-dktv">
                                <textarea class="form-control" id="noidung" name="noidung" placeholder="<?= noidung ?>" required /></textarea>
                                <div class="invalid-feedback"><?= vuilongnhapnoidung ?></div>
                            </div>
                            <input type="submit" class="btn btn_dktv" name="submit-contact" value="Tư vấn ngay" disabled />
                            <!-- <input type="reset" class="btn btn-secondary" value="<?= nhaplai ?>" /> -->
                            <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
                        </form>
                        <div class="title_baomat pb-4">
                            Thông tin khách hàng được bảo mật theo quy định
                        </div>
                    </div>
                    <div class="img_dathang">
                        <img src="./assets/images/quytrinh_donhang.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <?php include LAYOUT_PATH . "right-tintuc.php"; ?>
            </div>
        </div>

    </div>
</div>