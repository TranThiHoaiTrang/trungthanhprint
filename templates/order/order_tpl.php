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
<?php $type_name = $_GET['step']; ?>

<div class="fixwidth">
    <div class="title_tong_giohang">
        <span class="<?= $type_name == 'giohang' ? 'active' : '' ?>">Giỏ hàng</span>
        <i class="fas fa-angle-right"></i>
        <span class="<?= $type_name == 'thongtin' ? 'active' : '' ?>">Thanh toán</span>
        <i class="fas fa-angle-right"></i>
        <span class="<?= $type_name == 'hoantat' ? 'active' : '' ?>">Hoàn tất</span>
    </div>
    <form class="form-cart validation-cart" novalidate method="post" action="" enctype="multipart/form-data">
        <div class="wrap-cart d-flex align-items-stretch justify-content-between">
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart'])) { ?>
                <?php if ($type_name == 'giohang') { ?>
                    <div class="top-cart">
                        <p class="title-cart"><?= giohangcuaban ?>:</p>
                        <div class="list-procart">
                            <div class="procart procart-label d-flex align-items-start justify-content-between">
                                <div class="pic-procart"><?= sanpham ?></div>
                                <!-- <div class="pic-procart"></?= hinhanh ?></div> -->
                                <div class="info-procart"></div>
                                <!-- <div class="info-procart"></?= tensanpham ?></div> -->
                                <div class="price-procart">Giá</div>
                                <div class="quantity-procart">
                                    <p><?= soluong ?></p>
                                    <p><?= thanhtien ?></p>
                                </div>
                                <div class="price-procart">Tổng cộng</div>
                            </div>
                            <?php $max = count($_SESSION['cart']);
                            for ($i = 0; $i < $max; $i++) {
                                $pid = $_SESSION['cart'][$i]['productid'];
                                $quantity = $_SESSION['cart'][$i]['qty'];
                                $mau = ($_SESSION['cart'][$i]['mau']) ? $_SESSION['cart'][$i]['mau'] : 0;
                                $size = ($_SESSION['cart'][$i]['size']) ? $_SESSION['cart'][$i]['size'] : 0;
                                $code = ($_SESSION['cart'][$i]['code']) ? $_SESSION['cart'][$i]['code'] : '';
                                $giasize = ($_SESSION['cart'][$i]['giasize']) ? $_SESSION['cart'][$i]['giasize'] : '';
                                $proinfo = $cart->get_product_info($pid);
                                $pro_price = $proinfo['gia'];
                                $pro_price_new = $proinfo['giamoi'];
                                $pro_price_qty = $pro_price * $quantity;
                                $pro_price_new_qty = $pro_price_new * $quantity;
                                $pro_price_mau_qty = $giasize * $quantity;
                                // var_dump($giasize);
                            ?>
                                <div class="procart procart-<?= $code ?> d-flex align-items-start justify-content-between">
                                    <div class="pic-procart">
                                        <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>">
                                            <?= Helper::the_thumbnail($proinfo['photo'], 85, 85, '', $proinfo['ten' . $lang], true) ?>
                                        </a>
                                        <a class="del-procart text-decoration-none" data-code="<?= $code ?>">
                                            <i class="fa fa-times-circle" style="    font-family: 'Font Awesome 5 Pro';"></i>
                                            <!-- <span><?= xoa ?></span> -->
                                        </a>
                                    </div>
                                    <div class="info-procart">
                                        <h3 class="name-procart"><a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><?= $proinfo['ten' . $lang] ?></a>
                                        </h3>
                                        <div class="properties-procart">
                                            <?php if ($mau) {
                                                $maudetail = $d->rawQueryOne("select ten$lang from #_product_mau where type = ? and id = ? limit 0,1", array($proinfo['type'], $mau)); ?>
                                                <p>Màu: <strong><?= $maudetail['ten' . $lang] ?></strong></p>
                                            <?php } ?>
                                            <?php if ($size) {
                                                $sizedetail = $d->rawQueryOne("select ten$lang from #_product_size where type = ? and id = ? limit 0,1", array($proinfo['type'], $size)); ?>
                                                <p>Size: <strong><?= $sizedetail['ten' . $lang] ?></strong></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="price-procart">
                                        <?php if ($giasize) { ?>
                                            <p class="price-new-cart">
                                                <?= $func->format_money($pro_price_mau) ?>
                                            </p>
                                            <p class="price-old-cart ">
                                                <?= $func->format_money($pro_price) ?>
                                            </p>
                                        <?php } elseif ($proinfo['giamoi']) { ?>
                                            <p class="price-new-cart">
                                                <?= $func->format_money($pro_price_new) ?>
                                            </p>
                                            <p class="price-old-cart">
                                                <?= $func->format_money($pro_price) ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="price-new-cart">
                                                <?= $func->format_money($pro_price) ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                    <div class="quantity-procart">
                                        <div class="price-procart price-procart-rp">
                                            <?php if ($giasize) { ?>
                                                <p class="price-new-cart">
                                                    <?= $func->format_money($pro_price_mau) ?>
                                                </p>
                                                <p class="price-old-cart ">
                                                    <?= $func->format_money($pro_price) ?>
                                                </p>
                                            <?php } elseif ($proinfo['giamoi']) { ?>
                                                <p class="price-new-cart">
                                                    <?= $func->format_money($pro_price_new) ?>
                                                </p>
                                                <p class="price-old-cart ">
                                                    <?= $func->format_money($pro_price) ?>
                                                </p>
                                            <?php } else { ?>
                                                <p class="price-new-cart ">
                                                    <?= $func->format_money($pro_price) ?>
                                                </p>
                                            <?php } ?>
                                        </div>
                                        <div class="quantity-counter-procart quantity-counter-procart-<?= $code ?> d-flex align-items-stretch justify-content-between">
                                            <span class="counter-procart-minus counter-procart">-</span>
                                            <input type="number" class="quantity-procat" min="1" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" />
                                            <span class="counter-procart-plus counter-procart">+</span>
                                        </div>
                                        <div class="pic-procart pic-procart-rp">
                                            <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><?= Helper::the_thumbnail($proinfo['photo'], 85, 85, '', $proinfo['ten' . $lang], true) ?></a>
                                            <a class="del-procart text-decoration-none" data-code="<?= $code ?>">
                                                <i class="fa fa-times-circle" style="font-family: 'Font Awesome 5 Pro';"></i>
                                                <span><?= xoa ?></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="price-procart">
                                        <?php if ($giasize) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->format_money($pro_price_mau_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } elseif ($proinfo['giamoi']) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->format_money($pro_price_new_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="price-new-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="money-procart">
                            <?php /*if($config['order']['ship']) { ?>
                            <div class="total-procart d-flex align-items-center justify-content-between d-none">
                                <p><?=tamtinh?>:</p>
                                <p class="total-price load-price-temp"><?=$func->format_money($cart->get_order_total())?></p>
                            </div>
                            <?php } ?>
                            <?php if($config['order']['ship']) { ?>
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p><?=phivanchuyen?>:</p>
                                <p class="total-price load-price-ship">0đ</p>
                            </div>
                            <?php }*/ ?>
                            <input type="hidden" class="price-temp" name="price-temp" value="<?= $cart->get_order_total() ?>">
                            <input type="hidden" class="price-ship" name="price-ship">
                            <input type="hidden" class="price-total" name="price-total" value="<?= $cart->get_order_total() ?>">
                        </div>
                        <div class="all_tieptuc_xemsanpham">
                            <a href="san-pham">
                                <div class="all_xemsanpham_order">
                                    <div class="xemsanpham">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                        <span>Tiếp tục xem sản phẩm</span>
                                    </div>
                                </div>
                            </a>
                            <div class="all_capnhatgiohang_order">
                                <div class="capnhatgiohang">
                                    <span>Cập nhật giỏ hàng</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="bottom-cart">
                        <div class="section-cart">
                            <div class="title-cart">
                                Tổng sổ lượng
                            </div>
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p><?= tongtien ?>:</p>
                                <p class="total-price load-price-total"><?= $func->format_money($cart->get_order_total()) ?></p>
                            </div>
                            <div class="all_giaohang">
                                <p>Giao hàng:</p>
                                <div class="all_phi">
                                    <i class="far fa-dot-circle"></i>
                                    <span>Miễn phí ship</span>
                                </div>
                                <!-- <div class="title_cuahang">Nhấn vào để chọn giao tại cửa hàng</div>
                                <span>This is only an estimate. Prices will be updated during checkout.</span>
                                <div class="title_cuahang">Calculate shipping</div> -->
                            </div>
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p>Tổng cộng:</p>
                                <p class="total-price load-price-total"><?= $func->format_money($cart->get_order_total()) ?></p>
                            </div>
                            <div class="next_step_thongtin" data-step="thongtin">
                                Thanh toán
                            </div>
                            <div class="all_phieu_uu_dai">
                                <div class="title_phieu_udai">
                                    <i class="fas fa-tag fa-rotate-90"></i>
                                    <span>Phiếu ưu đãi</span>
                                </div>
                                <div class="all_form_phieu_udai">
                                    <input type="text" name="ma_u_dai" class="ma_uu_dai" placeholder="Mã ưu đãi">
                                    <input type="submit" value="Áp dụng" name="submit_uu_dai" class="submit_uu_dai">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($type_name == 'thongtin') { ?>
                    <div class="top-cart" style="border-right: none;">
                        <div class="section-cart">
                            <!-- </?php if (!empty($httt)) { ?>
                                <p class="title-cart"><?= hinhthucthanhtoan ?>:</p>
                                <div class="information-cart">
                                    <?php foreach ($httt as $key => $value) { ?>
                                        <div class="payments-cart custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payments-<?= $value['id'] ?>" name="payments" value="<?= $value['id'] ?>" required>
                                            <label class="payments-label custom-control-label" for="payments-<?= $value['id'] ?>" data-payments="<?= $value['id'] ?>"><?= $value['ten' . $lang] ?></label>
                                            <div class="payments-info payments-info-<?= $value['id'] ?> transition">
                                                <?= str_replace("\n", "<br>", $value['mota' . $lang]) ?></div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </?php } ?> -->
                            <div class="all_text_dangnhap_ma">
                                <div class="text_dangnhap">
                                    <span>Returning customer?</span>
                                    <span>Click here to login</span>
                                </div>
                                <div class="text_dangnhap">
                                    <span>Bạn có mã ưu đãi?</span>
                                    <span>Ấn vào đây để nhập mã</span>
                                </div>
                            </div>
                            <p class="title-cart">Thông tin thanh toán:</p>
                            <div class="information-cart">
                                <div class="input-cart">
                                    <span>Họ và tên *</span>
                                    <input type="text" class="form-control" id="ten" name="ten" placeholder="Type full name" required />
                                    <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                                </div>
                                <div class="input-triple-cart w-clear">
                                    <div class="input-cart">
                                        <span>Tỉnh/Thành phố *</span>
                                        <select class="select-city-cart custom-select" required id="city" name="city">
                                            <option value=""><?= tinhthanh ?></option>
                                            <?php for ($i = 0; $i < count($city); $i++) { ?>
                                                <option value="<?= $city[$i]['id'] ?>"><?= $city[$i]['ten'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback"><?= vuilongchontinhthanh ?></div>
                                    </div>
                                    <div class="input-cart">
                                        <span>Quận/huyện *</span>
                                        <select class="select-district-cart select-district custom-select" required id="district" name="district">
                                            <option value=""><?= quanhuyen ?></option>
                                        </select>
                                        <div class="invalid-feedback"><?= vuilongchonquanhuyen ?></div>
                                    </div>
                                    <div class="input-cart">
                                        <span>Phường xã *</span>
                                        <select class="select-wards-cart select-wards custom-select" required id="wards" name="wards">
                                            <option value=""><?= phuongxa ?></option>
                                        </select>
                                        <div class="invalid-feedback"><?= vuilongchonphuongxa ?></div>
                                    </div>
                                </div>
                                <div class="input-cart">
                                    <span>Địa chỉ *</span>
                                    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ cụ thể" required />
                                    <div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
                                </div>
                                <!-- <div class="input-double-cart w-clear">
                                    <div class="input-cart">
                                        <span>Số điện thoại *</span>
                                        <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="Type your phone" required />
                                        <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                                    </div>
                                    <div class="input-cart">
                                        <span>Địa chỉ email (Không bắt buộc)</span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Type your email" />
                                        <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                                    </div>
                                </div> -->
                                <div class="input-cart">
                                    <span>Số điện thoại *</span>
                                    <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="Type your phone" required />
                                    <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                                </div>
                                <div class="diachi_khac">
                                    <input type="checkbox" name="diachi_khac" class="diachi_khac">
                                    <span>Giao hàng đến địa chỉ khác</span>
                                </div>
                                <div class="input-cart">
                                    <span>Ghi chú cho đơn hàng (Không bắt buộc)</span>
                                    <textarea class="form-control" id="yeucaukhac" name="yeucaukhac" placeholder="<?= yeucaukhac ?>" /></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-cart" style="border: 2px solid #007bff;padding: 10px;">
                        <p class="title-cart"><?= giohangcuaban ?>:</p>
                        <div class="list-procart">
                            <div class="procart procart-label-thanhtoan d-flex align-items-start justify-content-between">
                                <div class="pic-procart"><?= sanpham ?></div>
                                <div class="price-procart">Tổng cộng</div>
                            </div>
                            <?php $max = count($_SESSION['cart']);
                            for ($i = 0; $i < $max; $i++) {
                                $pid = $_SESSION['cart'][$i]['productid'];
                                $quantity = $_SESSION['cart'][$i]['qty'];
                                $mau = ($_SESSION['cart'][$i]['mau']) ? $_SESSION['cart'][$i]['mau'] : 0;
                                $size = ($_SESSION['cart'][$i]['size']) ? $_SESSION['cart'][$i]['size'] : 0;
                                $code = ($_SESSION['cart'][$i]['code']) ? $_SESSION['cart'][$i]['code'] : '';
                                $giasize = ($_SESSION['cart'][$i]['giasize']) ? $_SESSION['cart'][$i]['giasize'] : '';
                                $proinfo = $cart->get_product_info($pid);
                                $pro_price = $proinfo['gia'];
                                $pro_price_new = $proinfo['giamoi'];
                                $pro_price_qty = $pro_price * $quantity;
                                $pro_price_new_qty = $pro_price_new * $quantity;
                                $pro_price_mau_qty = $giasize * $quantity;
                                // var_dump($giasize);
                            ?>
                                <div class="procart procart-<?= $code ?> d-flex align-items-start justify-content-between" style="padding: 20px 0;border: none;">
                                    <div class="info-procart" style="width: 70%;">
                                        <h3 class="name-procart-thanhtoan">
                                            <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>">
                                                <span><?= $proinfo['ten' . $lang] ?></span>
                                                <span>x <?= $quantity ?></span>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="price-procart" style="width: 30%;">
                                        <?php if ($giasize) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->format_money($pro_price_mau_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } elseif ($proinfo['giamoi']) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->format_money($pro_price_new_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="price-new-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="money-procart">
                            <input type="hidden" class="price-temp" name="price-temp" value="<?= $cart->get_order_total() ?>">
                            <input type="hidden" class="price-ship" name="price-ship">
                            <input type="hidden" class="price-total" name="price-total" value="<?= $cart->get_order_total() ?>">
                        </div>
                        <div class="section-cart">
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p><?= tongtien ?>:</p>
                                <p class="total-price load-price-total"><?= $func->format_money($cart->get_order_total()) ?></p>
                            </div>
                            <!-- <div class="all_giaohang">
                                <p>Giao hàng:</p>
                                <div class="all_phi">
                                    <i class="far fa-dot-circle"></i>
                                    <span>Phí: 70.000 VND</span>
                                </div>
                                <div class="title_cuahang">Nhấn vào để chọn giao tại cửa hàng</div>
                                <span>This is only an estimate. Prices will be updated during checkout.</span>
                                <div class="title_cuahang">Calculate shipping</div>
                            </div> -->
                            <div class="thanhtoan_extra">
                                <div class="all_phi">
                                    <i class="far fa-dot-circle"></i>
                                    <span>Thanh toán bằng điểm Extracare</span>
                                </div>
                                <div>Bạn chưa là thành viên Extracare. <span>Đăng ký ngay</span></div>
                            </div>
                            <div class="information-cart">
                                <div class="payments-cart custom-control custom-radio all_giaohang">
                                    <input type="radio" class="custom-control-input" id="payments-tienmat" name="payments" value="Thanh toán tiền mặt" required>
                                    <label class="payments-label custom-control-label" for="payments-tienmat" data-payments="tienmat">Thanh toán tiền mặt</label>
                                    <span>Thanh toán bằng tiền khi giao hàng.</span>
                                </div>
                                <!-- <div class="payments-cart custom-control custom-radio all_giaohang">
                                    <input type="radio" class="custom-control-input" id="payments-tienmat" name="payments" value="Cổng thanh toán Epay" required>
                                    <label class="payments-label custom-control-label" for="payments-tienmat" data-payments="tienmat">Cổng thanh toán Epay</label>
                                    <div class="img_pttt">
                                        <img src="./assets/images/logo_visa.png" alt="">
                                        <img src="./assets/images/logo_mastercard.png" alt="">
                                        <img src="./assets/images/Icon-Vietcombank.png" alt="">
                                        <img src="./assets/images/Logo-VietinBank.png" alt="">
                                    </div>
                                </div> -->
                            </div>
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p>Tổng cộng:</p>
                                <p class="total-price load-price-total"><?= $func->format_money($cart->get_order_total()) ?></p>
                            </div>
                        </div>
                        <input type="submit" class="btn-cart btn btn-primary btn-lg btn-block" name="thanhtoan" value="Đặt hàng" disabled>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <?php if ($type_name == 'hoantat') {
                    $item = $d->rawQueryOne("select * from #_order where madonhang = ? limit 0,1", array($_GET['madonhang']));
                    $chitietdonhang = $d->rawQuery("select * from #_order_detail where id_order = ? order by id desc", array($item['id']));
                ?>
                    <div class="top-cart" style="border-right: none;">
                        <div class="phuongthucthanhtoan_text"><?= @$item['httt_text'] ?></div>
                        <p class="title-cart">Chi tiết đơn hàng:</p>
                        <div class="list-procart">
                            <div class="procart procart-label-thanhtoan d-flex align-items-start justify-content-between">
                                <div class="pic-procart"><?= sanpham ?></div>
                                <div class="price-procart-hoantat">Tổng cộng</div>
                            </div>
                            <?php $max = count($chitietdonhang);
                            for ($i = 0; $i < $max; $i++) {
                                $pid = $chitietdonhang[$i]['id_product'];
                                $quantity = $chitietdonhang[$i]['soluong'];
                                $proinfo = $cart->get_product_info($pid);
                                $pro_price = $chitietdonhang[$i]['gia'];
                                $pro_price_new = $chitietdonhang[$i]['giamoi'];
                                $pro_price_qty = $pro_price * $quantity;
                                $pro_price_new_qty = $pro_price_new * $quantity;
                                $pro_price_mau_qty = $giasize * $quantity;
                                // var_dump($giasize);
                            ?>
                                <div class="procart procart-<?= $code ?> d-flex align-items-start justify-content-between" style="padding: 10px 0;border: none;">
                                    <div class="info-procart" style="width: 70%;">
                                        <h3 class="name-procart-thanhtoan">
                                            <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>">
                                                <span style="color: #007bff;"><?= $proinfo['ten' . $lang] ?></span>
                                                <span>x <?= $quantity ?></span>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="price-procart-hoantat" style="width: 30%;font-weight: 600;">
                                        <?php if ($giasize) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->format_money($pro_price_mau_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } elseif ($proinfo['giamoi']) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->format_money($pro_price_new_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="price-new-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="procart d-flex align-items-start justify-content-between" style="padding: 10px 0;border: none;">
                                <div class="info-procart" style="width: 70%;color: #757575;font-weight: 600;">
                                    Tổng cộng
                                </div>
                                <div class="price-procart-hoantat" style="width: 30%;font-weight: 600;">
                                    <?= $func->format_money($item['tamtinh']) ?>
                                </div>
                            </div>
                            <div class="procart d-flex align-items-start justify-content-between" style="padding: 10px 0;border: none;">
                                <div class="info-procart" style="width: 70%;color: #757575;font-weight: 600;">
                                    Vận chuyển
                                </div>
                                <div class="price-procart-hoantat" style="width: 30%;">
                                    <?= $func->format_money($item['phisip']) ?>
                                </div>
                            </div>
                            <div class="procart d-flex align-items-start justify-content-between" style="padding: 10px 0;border: none;">
                                <div class="info-procart" style="width: 70%;color: #757575;font-weight: 600;">
                                    Phương thức thanh toán
                                </div>
                                <div class="price-procart-hoantat" style="width: 30%;">
                                    <?= @$item['httt_text'] ?>
                                </div>
                            </div>
                            <div class="procart d-flex align-items-start justify-content-between" style="padding: 10px 0;border: none;">
                                <div class="info-procart" style="width: 70%;color: #757575;font-weight: 600;">
                                    Tổng cộng
                                </div>
                                <div class="price-procart-hoantat" style="width: 30%;font-weight: 600;">
                                    <?= $func->format_money($item['tonggia']) ?>
                                </div>
                            </div>
                            <div class="procart d-flex align-items-start justify-content-between" style="padding: 10px 0;border: none;">
                                <div class="info-procart" style="width: 70%;color: #757575;font-weight: 600;">
                                    Note
                                </div>
                                <div class="price-procart-hoantat" style="width: 30%;">
                                    <?= $item['yeucaukhac'] ?>
                                </div>
                            </div>
                            <div class="procart d-flex align-items-start justify-content-between" style="padding: 10px 0;border: none;">
                                <div class="info-procart" style="width: 70%;color: #757575;font-weight: 600;">
                                    Số điện thoại
                                </div>
                                <div class="price-procart-hoantat" style="width: 30%;">
                                    <?= $item['dienthoai'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-cart" style="border: 2px solid #ced4da;padding: 20px;background: #fafafa;">
                        <div class="title_tiepnhan">Cảm ơn bạn. Đơn hàng của bạn đã được tiếp nhận.</div>
                        <ul class="list_thongtin_donhang">
                            <li>
                                Mã đơn hàng: <span><?= $item['madonhang'] ?></span>
                            </li>
                            <li>
                                Ngày: <span><?= date("d/m/Y", $item['ngaytao']) ?></span>
                            </li>
                            <li>
                                Tổng cộng: <span style="color: #000;"><?= $func->format_money($item['tonggia']) ?></span>
                            </li>
                            <li>
                                Phương thức thanh toán: <span><?= @$item['httt_text'] ?></span>
                            </li>
                        </ul>
                        <ul class="list_xacnhanthongtin">
                            <li>
                                <img src="./assets/images/user_tt.png" alt="">
                                <span>Đội ngũ chăm sóc khách hàng sẽ gọi điện xác nhận đơn hàng.</span>
                            </li>
                            <li>
                                <img src="./assets/images/vanchuyen_tt.png" alt="">
                                <span>Chúng tôi sẽ vận chuyển hàng đến địa chỉ khách hàng.</span>
                            </li>
                            <li>
                                <img src="./assets/images/money_tt.png" alt="">
                                <span>Chúng tôi sẽ nhận tiền và thối tiền (nếu có) trực tiếp từ khách hàng.</span>
                            </li>
                            <li>
                                <img src="./assets/images/tietkiem_tt.png" alt="">
                                <span>Trong vòng một tiếng sau khi nhận tiền. Nếu bạn là thành viên của ExtraCare, điểm tiết kiệm sẽ được cập nhật.</span>
                            </li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <a href="" class="empty-cart text-decoration-none">
                        <img style="width: 80px;" src="./assets/images/cart.png" alt="">
                        <p><?= khongtontaisanphamtronggiohang ?></p>
                        <span><?= vetrangchu ?></span>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
    </form>
</div>