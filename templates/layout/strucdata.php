<?php if ($template == 'product/product_detail') { ?>
    <!-- Product -->
    <?= htmlspecialchars_decode($row_detail['schema']) ?>
<?php } else if ($template == 'product/product') { ?>
    <?php
    if ($idl) {
        $schema_detail = $d->rawQueryOne("select * from #_product_list where id = '" . $idl . "' and type = '" . $type . "' and hienthi > 0 limit 0,1");
    } else {
        $schema_detail = $d->rawQueryOne("select * from #_seopage where type = '" . $type . "' limit 0,1");
    }
    echo (htmlspecialchars_decode($schema_detail['schema']));
    ?>
<?php } else if ($template == 'news/news') { ?>
    <?php
    if ($idl) {
        $schema_detail = $d->rawQueryOne("select * from #_news_list where id = '" . $idl . "' and type = '" . $type . "' and hienthi > 0 limit 0,1");
    } else {
        $schema_detail = $d->rawQueryOne("select * from #_seopage where type = '" . $type . "' limit 0,1");
    }
    echo (htmlspecialchars_decode($schema_detail['schema']));
    ?>
<?php } else if ($template == 'news/news_detail') { ?>
    <!-- News -->
    <?= htmlspecialchars_decode($row_detail['schema']) ?>
<?php } else if ($template == 'static/static') { ?>
    <!-- Static -->
    <?php
    $schema_detail = $d->rawQueryOne("select * from #_seopage where type = '" . $type . "' limit 0,1");
    echo (htmlspecialchars_decode($schema_detail['schema']));
    ?>
<?php } else if ($template == 'trangtinh/news') { ?>
    <!-- Static -->
    <?php
    $schema_detail = $d->rawQueryOne("select * from #_seopage where type = '" . $type . "' limit 0,1");
    echo (htmlspecialchars_decode($schema_detail['schema']));
    ?>
<?php } else if ($template == 'trangtinh/news_detail') { ?>
    <!-- Static -->
    <?= htmlspecialchars_decode($row_detail['schema']) ?>
<?php } else { ?>
    <!-- General -->
    <?php 
    if ($source == 'index') {
        echo (htmlspecialchars_decode($optsetting['schema']));
    ?>
    <?php } else { ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "Organization",
                "name": "<?= $setting['ten' . $lang] ?>",
                "url": "<?= (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http' ?>://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>",
                "sameAs": [
                    <?php if (isset($social) && count($social) > 0) {
                        $sum_social = count($social);
                        foreach ($social as $key => $value) { ?> "<?= $value['link'] ?>"
                            <?= (($key + 1) < $sum_social) ? ',' : '' ?>
                    <?php }
                    } ?>
                ],
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "<?= $optsetting['diachi'] ?>",
                    "addressRegion": "Ho Chi Minh",
                    "postalCode": "70000",
                    "addressCountry": "vi"
                }
            }
        </script>
    <?php } ?>
<?php } ?>