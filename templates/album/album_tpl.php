<div id="background-banner">
    <div class="fixwidth">
        <div class="all_bread d-flex">
            <div class="bread_title"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></div>
            <div class="breadCrumbs">
                <div><?= $breadcrumbs ?></div>
            </div>
        </div>
    </div>
</div>
<div class="all_album_news">
    <div class="fixwidth">
        <div class="content-main w-clear">
            <?php if (count($news) > 0) {
                $anhhoatdonglist = $d->rawQuery("select * from #_news_list where type = ? and hienthi > 0 order by stt,id desc", array('anh-hoat-dong'));
            ?>
                <ul class="nav nav-pills mb-3" id="pills-tab-anhhoatdong" role="tablist">
                    <?php foreach ($anhhoatdonglist as $l) { ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-<?= $l['id'] ?>-tab" data-toggle="pill" data-target="#pills-<?= $l['id'] ?>" type="button" role="tab" aria-controls="pills-<?= $l['id'] ?>" aria-selected="true"><?= $l['ten' . $lang] ?></button>
                        </li>
                    <?php } ?>
                </ul>
                <div class="tab-content" id="pills-tabContent-anhhoatdong">
                    <?php foreach ($anhhoatdonglist as $l) {
                        $anhhoatdong_news = $d->rawQuery("select * from #_news where type = ? and id_list = ? and hienthi > 0 order by stt,id desc", array('anh-hoat-dong', $l['id']));
                    ?>
                        <div class="tab-pane fade" id="pills-<?= $l['id'] ?>" role="tabpanel" aria-labelledby="pills-<?= $l['id'] ?>-tab">
                            <div class="all_chuongtrinhhoc">
                                <?php foreach ($anhhoatdong_news as $v) { ?>
                                    <a data-fancybox="album2" data-src="<?= Helper::thumbnail_link($v['photo']) ?>" title="<?= $v['ten' . $lang] ?>">
                                        <div class="anhhoatdong">
                                            <?= Helper::the_thumbnail($v['photo']) ?>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            <?php } ?>
        </div>
    </div>
</div>