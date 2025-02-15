<div class="header-cachtop">
    <div class="header">
        <div class="all_menu_top">
            <div class="maincontent menu_top d-flex justify-content-between flex-wrap align-items-center">

                <div class="left_menu">
                    <div class="all_diachi_top">
                        <div class="icon_diachi"><i class="fas fa-map-marker-alt"></i></div>
                        <span><?= $optsetting['diachi'] ?></span>
                    </div>
                </div>
                <div class="right_menu">
                    <div class="all_diachi_top">
                        <div class="icon_diachi"><i class="fas fa-phone-alt"></i></div>
                        <span>Hotline: <?= $optsetting['hotline'] ?></span>
                    </div>
                    <div class="all_diachi_top">
                        <div class="icon_diachi"><i class="far fa-clock"></i></div>
                        <span>Time: <?= $optsetting['tg_hoatdong'] ?></span>
                    </div>
                    <div class="all_diachi_top">
                        <div class="icon_diachi"><i class="far fa-envelope"></i></div>
                        <span>Infor: <?= $optsetting['email'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header-height">
    <div id="menu_top">
        <div class="clearfix maincontent">
            <div class="menu">
                <div class="menu_mobi align-self-center">
                    <p class="icon_menu_mobi">
                        <i class="fas fa-bars"></i>
                    </p>
                    <a href="" class="home_mobi">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="menu_mobi_add">
                    <div class="frm_timkiem timkiem_header">
                        <input type="text" class="input" id="keyword1" placeholder="Tìm kiếm" onkeypress="doEnter(event,'keyword1');">
                        <button type="submit" value="" class="nut_tim" onclick="onSearch('keyword1');"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <a class="header_logo" href=""><?= Helper::the_thumbnail($logo['photo'], '', $setting['ten' . $lang], true) ?></a>
                
                <div class="menu_destop">
                    <?php echo Helper::horizontal_menu('main-menu', 'desktop-menu', 'main-menu'); ?>
                </div>
                <div class="frm_timkiem frm_timkiem_des">
                    <input type="text" class="input" id="keyword" placeholder="Tìm kiếm ? ..." onkeypress="doEnter(event,'keyword');">
                    <button type="submit" value="" class="nut_tim" onclick="onSearch('keyword');"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>