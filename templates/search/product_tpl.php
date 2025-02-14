<!-- <div class="background-banner" class="mb-5">
    <div class="fixwidth">
        <div class="all_bread d-flex">
            <div class="bread_title"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></div>
            <div class="breadCrumbs">
                <div><?= $breadcrumbs ?></div>
            </div>
        </div>
    </div>
</div> -->
<div class="fixwidth">
    <div class="ketqua_timkiem">
        <span>Kết quả tìm kiếm </span>
        <span>“[<?= $tukhoa2 ?>]” </span>
        <span>(<?= $total ?> sản phẩm)</span>
    </div>
</div>

<?php if (isset($product) && count($product) > 0) { ?>
    <div class="content-main w-clear">
        <div class="fixwidth">
            <?php if (isset($product) && count($product) > 0) { ?>
                <div class="all_sp_search">
                    <div class="loadkhung_product3 mainkhung_product ">
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
            <div class="clear"></div>
            <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
        </div>
    </div>
<?php } else { ?>
    <div class="fixwidth">
        <div class="all_search_rong">
            <!-- <div class="img_search">
                <img src="./assets/images/Search.png" alt="">
            </div> -->
            <div class="rattiec">
                <span>Rất tiếc, chúng tôi không tìm thấy sản phẩm từ</span>
                <span>“[<?= $tukhoa2 ?>]”</span>
            </div>
            <div class="all_giaithich_search">
                <span>1. Kiểm tra lại từ khóa có thể bạn đã gõ sai</span>
                <span>2. Hãy dùng từ khóa ngắn và đơn giản hơn</span>
                <!-- <div class="all_search_nhaplai d-flex align-items-center">
                    <span>3. Nhập lại từ khóa</span>
                    <div class="frm_timkiem">
                        <input type="text" class="input" id="keyword3" placeholder="Tìm kiếm" onkeypress="doEnter(event,'keyword3');">
                        <button type="submit" value="" class="nut_tim" onclick="onSearch('keyword3');"><i class="far fa-search"></i></button>
                    </div>
                </div> -->
            </div>
            <div class="giupdo_search">
                <span>Bạn cần giúp đỡ? Vui lòng liên hệ hỗ trợ khách hàng</span>
                <div class="all_hotline_search">
                    <span><i class="fas fa-phone-alt"></i></span>
                    <span><?= $optsetting['hotline'] ?> - </span>
                    <span><?= $optsetting['dienthoai'] ?></span>
                </div>
            </div>
            <div class="tieptuc_mua">
                <a href="san-pham">Tiếp tục mua</a>
            </div>
        </div>
    </div>

<?php } ?>
<div class="clear"></div>