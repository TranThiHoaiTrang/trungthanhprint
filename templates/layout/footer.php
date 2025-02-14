<div class="boxfooter_container section">
    <div class="fixwidth">
        <?php
        $_locations = [
            'footer-menu-1',
            'footer-menu-2',
            'footer-menu-3',
            'footer-menu-4',
        ];
        ?>
        <div class="inner-row">
            <div class="row">
                <?php
                foreach ($_locations as $_loc) :
                    $menu_loc = Helper::get_menu_location($_loc);

                    if ($menu_loc) :
                        $menus = Helper::get_menu_by_location($menu_loc['id']);
                ?>
                        <div class="col-md-3">
                            <div class="cell">
                                <div class="title_chinhanh_footer"><?= $menu_loc['ten' . $lang] ?></div>
                                <div class="all_menu_footer">
                                    <?php foreach ($menus as $menu) : ?>
                                        <p class="<?= $menu['css_class'] ?>">
                                            <a href="<?php echo Helper::get_menu_link($menu); ?>">
                                                <span><?= $menu['ten' . $lang] ?></span>
                                                <?php if($menu['photo']) {?>
                                                    <?= Helper::the_thumbnail($menu['photo']) ?>
                                                <?php } ?>
                                            </a>
                                        </p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                <?php endif;
                endforeach; ?>
            </div>
        </div>
        <div class="row_thongtin_footer">
            <div class="thongtin_footer">
                <?= Helper::the_thumbnail($logo['photo'], '', $setting['ten' . $lang], true) ?>
            </div>
            <div class="thongtin_footer">
                <div class="hotline_footer">
                    <span>Hotline: </span>
                    <span><?= $optsetting['hotline'] ?></span>
                    <?php if ($optsetting['dienthoai']) { ?>
                        <span> - <?= $optsetting['dienthoai'] ?></span>
                    <?php } ?>
                </div>
            </div>
            <div class="thongtin_footer">
                <div class="hotline_footer">
                    <span>Email: </span>
                    <span><?= $optsetting['email'] ?></span>
                </div>
            </div>
            <div class="thongtin_footer">
                <div class="hotline_footer">
                    <span>Website: </span>
                    <span><?= $optsetting['website'] ?></span>
                </div>
            </div>
        </div>
        <div class="all_footer_bottom">
            <div class="title_footer_bottom"><?= $setting['ten' . $lang] ?></div>
            <div class="row">
                <?php foreach ($chinhanh as $v) { ?>
                    <div class="col-md-6">
                        <div class="title_chinhanh">
                            <i class="fas fa-home"></i>
                            <span><?= $v['ten' . $lang] ?></span>
                        </div>
                        <div class="all_content_chinhanh">
                            <div class="content_chinhanh">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?= $v['diachi'] ?></span>
                            </div>
                            <div class="content_chinhanh">
                                <i class="fas fa-phone-alt"></i>
                                <span><?= $v['dienthoai'] ?></span>
                            </div>
                            <div class="content_chinhanh">
                                <i class="far fa-envelope"></i>
                                <span><?= $v['email'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="copyright">
            <span>Copyright © 2025 TRUNG THANH PRINT. Powered by HD Agency</span>
        </div>
    </div>
</div>