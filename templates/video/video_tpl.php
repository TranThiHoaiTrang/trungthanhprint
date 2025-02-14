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
<div class="fixwidth">
    <div class="content-main w-clear">
        <div class="row">
            <div class="col-md-9">
                <?php if (isset($news) && count($news) > 0) { ?>
                    <div class="all_tintuc_top">
                        <div class="thongtin_tintuc_top">
                            <div class="img_tintuc_top">
                                <a data-fancybox="video" data-src="<?= $news[0]['video'] ?>"
                                    data-name="<?= $news[0]['ten' . $lang] ?>" title="<?= $news[0]['ten' . $lang] ?>">
                                    <img src="<?= Helper::thumbnail_link($news[0]['photo']) ?>" alt="<?= $news[0]['ten' . $lang] ?>" title="<?= $news[0]['ten' . $lang] ?>" />
                                </a>
                            </div>
                            <div class="all_content_tintuc_top">
                                <a data-fancybox="video" data-src="<?= $news[0]['video'] ?>"
                                    data-name="<?= $news[0]['ten' . $lang] ?>" title="<?= $news[0]['ten' . $lang] ?>">
                                    <div class="text_tintuc_top">
                                        <?= $news[0]['ten' . $lang] ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="all_tintuc_bottom all_tintuc_bottom_news mb-4">
                        <?php if ($news[1]) { ?>
                            <div class="post mt-3 pb-3">
                                <div class="thumb">
                                    <a data-fancybox="video" data-src="<?= $news[1]['video'] ?>"
                                        data-name="<?= $news[1]['ten' . $lang] ?>" title="<?= $news[1]['ten' . $lang] ?>">
                                        <img src="<?= Helper::thumbnail_link($news[1]['photo']) ?>" alt="<?= $news[1]['ten' . $lang] ?>" title="<?= $news[1]['ten' . $lang] ?>" />
                                    </a>
                                </div>
                                <div class="all_content_post">
                                    <a data-fancybox="video" data-src="<?= $news[1]['video'] ?>"
                                        data-name="<?= $news[1]['ten' . $lang] ?>" title="<?= $news[1]['ten' . $lang] ?>">
                                        <h2 class="font16 text-blue text-bold webkit-box-2">
                                            <?= $news[1]['ten' . $lang] ?>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($news[2]) { ?>
                            <div class="post mt-3 pb-3">
                                <div class="thumb">
                                    <a data-fancybox="video" data-src="<?= $news[2]['video'] ?>"
                                        data-name="<?= $news[2]['ten' . $lang] ?>" title="<?= $news[2]['ten' . $lang] ?>">
                                        <img src="<?= Helper::thumbnail_link($news[2]['photo']) ?>" alt="<?= $news[2]['ten' . $lang] ?>" title="<?= $news[2]['ten' . $lang] ?>" />
                                    </a>
                                </div>
                                <div class="all_content_post">
                                    <a data-fancybox="video" data-src="<?= $news[2]['video'] ?>"
                                        data-name="<?= $news[2]['ten' . $lang] ?>" title="<?= $news[2]['ten' . $lang] ?>">
                                        <h2 class="font16 text-blue text-bold webkit-box-2">
                                            <?= $news[2]['ten' . $lang] ?>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($news[3]) { ?>
                            <div class="post mt-3 pb-3">
                                <div class="thumb">
                                    <a data-fancybox="video" data-src="<?= $news[3]['video'] ?>"
                                        data-name="<?= $news[3]['ten' . $lang] ?>" title="<?= $news[3]['ten' . $lang] ?>">
                                        <img src="<?= Helper::thumbnail_link($news[3]['photo']) ?>" alt="<?= $news[3]['ten' . $lang] ?>" title="<?= $news[3]['ten' . $lang] ?>" />
                                    </a>
                                </div>
                                <div class="all_content_post">
                                    <a data-fancybox="video" data-src="<?= $news[3]['video'] ?>"
                                        data-name="<?= $news[3]['ten' . $lang] ?>" title="<?= $news[3]['ten' . $lang] ?>">
                                        <h2 class="font16 text-blue text-bold webkit-box-2">
                                            <?= $news[3]['ten' . $lang] ?>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($news[4]) { ?>
                            <div class="post mt-3 pb-3">
                                <div class="thumb">
                                    <a data-fancybox="video" data-src="<?= $news[4]['video'] ?>"
                                        data-name="<?= $news[4]['ten' . $lang] ?>" title="<?= $news[4]['ten' . $lang] ?>">
                                        <img src="<?= Helper::thumbnail_link($news[4]['photo']) ?>" alt="<?= $news[4]['ten' . $lang] ?>" title="<?= $news[4]['ten' . $lang] ?>" />
                                    </a>
                                </div>
                                <div class="all_content_post">
                                    <a data-fancybox="video" data-src="<?= $news[4]['video'] ?>"
                                        data-name="<?= $news[4]['ten' . $lang] ?>" title="<?= $news[4]['ten' . $lang] ?>">
                                        <h2 class="font16 text-blue text-bold webkit-box-2">
                                            <?= $news[4]['ten' . $lang] ?>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($news[5]) { ?>
                            <div class="post mt-3 pb-3">
                                <div class="thumb">
                                    <a data-fancybox="video" data-src="<?= $news[5]['video'] ?>"
                                        data-name="<?= $news[5]['ten' . $lang] ?>" title="<?= $news[5]['ten' . $lang] ?>">
                                        <img src="<?= Helper::thumbnail_link($news[5]['photo']) ?>" alt="<?= $news[5]['ten' . $lang] ?>" title="<?= $news[5]['ten' . $lang] ?>" />
                                    </a>
                                </div>
                                <div class="all_content_post">
                                    <a data-fancybox="video" data-src="<?= $news[5]['video'] ?>"
                                        data-name="<?= $news[5]['ten' . $lang] ?>" title="<?= $news[5]['ten' . $lang] ?>"">
                                        <h2 class=" font16 text-blue text-bold webkit-box-2">
                                        <?= $news[5]['ten' . $lang] ?>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="clear"></div>
                        <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning" role="alert">
                        <strong><?= khongtimthayketqua ?></strong>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-3">
                <?php include LAYOUT_PATH . "right-tintuc.php"; ?>
            </div>
        </div>
    </div>
</div>