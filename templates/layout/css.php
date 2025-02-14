<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
<!-- Css Files -->
<?php
    $css->setCache("cached");
    $css->setCss(ASSETS_URL . "css/animate.min.css");
    $css->setCss(ASSETS_URL . "bootstrap/bootstrap.css");
    $css->setCss(ASSETS_URL . "css/font-awesome.css");
    $css->setCss(ASSETS_URL . "fancybox3/jquery.fancybox.css");
    $css->setCss(ASSETS_URL . "fancybox3/jquery.fancybox.style.css");
    $css->setCss(ASSETS_URL . "simplyscroll/jquery.simplyscroll.css");
    $css->setCss(ASSETS_URL . "simplyscroll/jquery.simplyscroll-style.css");
    $css->setCss(ASSETS_URL . "magiczoomplus/magiczoomplus.css");
    $css->setCss(ASSETS_URL . "css/social.css");
    $css->setCss(ASSETS_URL . "owlcarousel2/owl.carousel.css");
    $css->setCss(ASSETS_URL . "owlcarousel2/owl.theme.default.css");
    $css->setCss(ASSETS_URL . "slick/slick.css");
    $css->setCss(ASSETS_URL . "slick/slick-theme.css");
    $css->setCss(ASSETS_URL . "slick/slick-style.css");
    $css->setCss(ASSETS_URL . "css/fonts.css");
    $css->setCss(ASSETS_URL . "css/webhd.css");
    $css->setCss(ASSETS_URL . "css/webhd2.css");
    $css->setCss(ASSETS_URL . "css/style.css");
    $css->setCss(ASSETS_URL . "css/cart.css");
    /*
    $css->setCss("./assets/css/cart.css");
    $css->setCss("./assets/css/style_media.css");
    $css->setCss("./assets/login/login.css");

    */
    echo $css->getCss();
?>
 
<!-- Background -->
<?php
 
    $bgbody2 = $d->rawQuery("select hienthi, options, photo,type from #_photo where act = ? and ( type = ? or type = ? or type = ?) ",array('photo_static','background-tieuchi','background-footer','background-banner'));
    
    foreach ($bgbody2 as $key => $value) {
        if($value['hienthi']){
            $bgbodyOptions = json_decode($value['options'],true)['background'];
            if($bgbodyOptions['loaihienthi']) {
                echo '<style type="text/css">#'.$value['type'].'{background: url('.Helper::thumbnail_link($value['photo']).') '.$bgbodyOptions['repeat'].' '.$bgbodyOptions['position'].' '.$bgbodyOptions['attachment'].' ;background-size:'.$bgbodyOptions['size'].'}</style>';
            }else{
                echo ' <style type="text/css">#'.$value['type'].'{background-color:#'.$bgbodyOptions['color'].'}</style>';
            }
        }
    }
    
     
?>

<!-- Js Google Analytic -->
<?=htmlspecialchars_decode($setting['analytics'])?>

<!-- Js Head -->
<?=htmlspecialchars_decode($setting['headjs'])?>