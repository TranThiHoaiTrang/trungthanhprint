<?php
/* Config type - Group */
$config['group'] = array(
    "Nội dung tại sao chọn" => array(
        "news" => array("ly-do", "nhung-con-so"),
        "static" => array("taisaochon"),
    ),
    "Nội dung báo chí" => array(
        "photo" => array("baochi"),
        "static" => array("noidung-baochi"),
    ),
    "Trang giới thiệu" => array(
        "static" => array("gioi-thieu"),
        "photo" => array("khachhang-tieubieu"),
        "news" => array("cosohatang", "doingu-nhanvien", "quatrinh-hinhthanh", "tamnhan-sumenh", "linhvuc-hoatdong", "khach-hang"),
    ),
    "Xây dựng nội dung" => array(
        "static" => array("xaydung-noidung"),
    )
);

/* Config type - Media */
require_once LIBRARIES_PATH . 'type/config-type-media.php';

/* Config type - Menu */
require_once LIBRARIES . 'type/config-type-menu.php';

/* Config type - Product */
require_once LIBRARIES_PATH . 'type/config-type-product.php';

/* Config type - Tags */
//require_once LIBRARIES.'type/config-type-tags.php';

/* Config type - Newsletter 
    require_once LIBRARIES.'type/config-type-newsletter.php';*/

/* Config type - News */
require_once LIBRARIES_PATH . 'type/config-type-news.php';

/* Config type - Static */
require_once LIBRARIES_PATH . 'type/config-type-static.php';

/* Config type - Photo */
require_once LIBRARIES_PATH . 'type/config-type-photo.php';

/* Seo page */
$config['seopage']['page'] = array(
    "gioi-thieu" => "Giới thiệu",
    "lien-he" => "Liên hệ",
    "san-pham" => "Sản phẩm",
    // "dich-vu" => "Dịch vụ",
    "chinh-sach" => "Chính sách",
    "tin-tuc" => "Tin tức",
    "tac-gia" => "Tác giả",
    "trang-tinh" => "Trang tĩnh",
    "video" => "Video",

    //"tim-kiem" => "Tìm kiếm"
);
$config['seopage']['width'] = 300;
$config['seopage']['height'] = 200;
$config['seopage']['thumb'] = '300x200x1';
$config['seopage']['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Setting */
$config['setting']['diachi'] = true;
$config['setting']['diachi2'] = false;
$config['setting']['diachi3'] = false;
$config['setting']['dienthoai'] = true;
$config['setting']['dienthoai_nv'] = false;
$config['setting']['hotline'] = true;
$config['setting']['tg_hoatdong'] = true;
$config['setting']['zalo'] = true;
$config['setting']['oaidzalo'] = false;
$config['setting']['copyright'] = false;
$config['setting']['email'] = true;
$config['setting']['email2'] = true;
$config['setting']['website'] = true;
$config['setting']['fanpage'] = true;
$config['setting']['toado'] = true;
$config['setting']['slogan'] = false;
$config['setting']['toado_iframe'] = true;

/* Quản lý import */
$config['import']['images'] = false;
$config['import']['thumb'] = '100x100x1';
$config['import']['img_type'] = ".jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF";

/* Quản lý export */
$config['export']['category'] = true;

/* Quản lý tài khoản */
$config['user']['active'] = false;
$config['user']['admin'] = false;
$config['user']['visitor'] = false;

/* Quản lý phân quyền */
$config['permission'] = true;

/* Quản lý địa điểm */
$config['places']['active'] = false;
$config['places']['placesship'] = false;

/* Quản lý giỏ hàng */
$config['order']['active'] = false;
$config['order']['search'] = false;
$config['order']['ship'] = false;
$config['order']['excel'] = false;
$config['order']['word'] = false;
$config['order']['excelall'] = false;
$config['order']['wordall'] = false;
$config['order']['thumb'] = '100x100x1';

/* Quản lý thông báo đẩy */
$config['onesignal'] = false;
