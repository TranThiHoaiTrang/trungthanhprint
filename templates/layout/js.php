<!-- Js Config -->
<script type="text/javascript">
    var NN_FRAMEWORK = NN_FRAMEWORK || {};
    var CONFIG_BASE = '<?= $config_base ?>';
    var WEBSITE_NAME = '<?= (isset($setting['ten' . $lang]) && $setting['ten' . $lang] != '') ? $setting['ten' . $lang] : '' ?>';
    var TIMENOW = '<?= date("d/m/Y", time()) ?>';
    var SHIP_CART = <?= (isset($config['order']['ship']) && $config['order']['ship'] == true) ? 'true' : 'false' ?>;
    var GOTOP = 'assets/images/top.png';
    var LANG = {
        'no_keywords': "<?= chuanhaptukhoatimkiem ?>",
        'delete_product_from_cart': "<?= banmuonxoasanphamnay ?>",
        'no_products_in_cart': "<?= khongtontaisanphamtronggiohang ?>",
        'wards': "<?= phuongxa ?>",
        'back_to_home': "<?= vetrangchu ?>",
    };
</script>

<!-- Js Files -->
<?php
$js->setCache("cached");
$js->setJs(ASSETS_URL . "js/jquery.min.js");
$js->setJs(ASSETS_URL . "bootstrap/bootstrap.js");
$js->setJs(ASSETS_URL . "js/wow.min.js");
// $js->setJs(ASSETS_URL . "js/waypoints.min.js");
// $js->setJs(ASSETS_URL . "js/counterup.min.js");
$js->setJs(ASSETS_URL . "owlcarousel2/owl.carousel.js");
$js->setJs(ASSETS_URL . "magiczoomplus/magiczoomplus.js");
$js->setJs(ASSETS_URL . "simplyscroll/jquery.simplyscroll.js");
$js->setJs(ASSETS_URL . "slick/slick.js");
$js->setJs(ASSETS_URL . "fancybox3/jquery.fancybox.js");
$js->setJs(ASSETS_URL . "toc/toc.js");
$js->setJs(ASSETS_URL . "js/lazyload.min.js");
$js->setJs(ASSETS_URL . "js/functions.js");
$js->setJs(ASSETS_URL . "js/webhd.js");
$js->setJs(ASSETS_URL . "js/apps.js");
echo $js->getJs();
?>
<script>
    var myLazyLoad = new LazyLoad({
        elements_selector: ".lazy"
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.0.2/readmore.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.0.2/readmore.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
<script>
    AOS.init();
</script>

<?php if (isset($config['googleAPI']['recaptcha']['active']) && $config['googleAPI']['recaptcha']['active'] == true) { ?>
    <!-- Js Google Recaptcha V3 -->
    <?php if ($source == 'contact' || $source == 'dangkydaily') { ?>
        <script src="https://www.google.com/recaptcha/api.js?render=<?= $config['googleAPI']['recaptcha']['sitekey'] ?>"></script>
        <script type="text/javascript">
            grecaptcha.ready(function() {


                grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
                    action: 'contact'
                }).then(function(token) {
                    var recaptchaResponseContact = document.getElementById('recaptchaResponseContact');
                    recaptchaResponseContact.value = token;
                });
                grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
                    action: 'Newsletter'
                }).then(function(token) {
                    var recaptchaResponseNewsletter = document.getElementById('recaptchaResponseNewsletter');
                    recaptchaResponseNewsletter.value = token;
                });

            });
        </script>
    <?php } ?>
<?php } ?>

<?php if (isset($config['oneSignal']['active']) && $config['oneSignal']['active'] == true) { ?>
    <!-- Js OneSignal -->
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script type="text/javascript">
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "<?= $config['oneSignal']['id'] ?>"
            });
        });
    </script>
<?php } ?>

<!-- Js Structdata -->
<?php include LAYOUT_PATH . "strucdata.php"; ?>

<!-- Js Addons -->
<?= $addons->setAddons('script-main', 'script-main', 0.5); ?>
<?= $addons->getAddons(); ?>

<!-- Js Body -->
<?= htmlspecialchars_decode($setting['bodyjs']) ?>