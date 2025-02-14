<div class="all_title_danhmuc_sanpham_right">
    <div class="title_dm_sanpham_right">Danh mục sản phẩm</div>
    <div class="all_dm_sanpham_right">
        <?php foreach ($splistmenu as $v) { ?>
            <a href="<?= $v['tenkhongdauvi'] ?>">
                <div class="dm_sanpham_right">
                    <div class="img_dm_sanpham_right">
                        <?= Helper::the_thumbnail($v['photo2'], '', $v['ten' . $lang], true) ?>
                    </div>
                    <div class="name_dm_sanpham_right"><?= $v['ten' . $lang] ?></div>
                </div>
            </a>
        <?php } ?>
    </div>
</div>
<div class="bannerrightsp mt-4 mb-5">
    <?= Helper::the_thumbnail($bannerrightsp['photo'], '', '', true) ?>
</div>