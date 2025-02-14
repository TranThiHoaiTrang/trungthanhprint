<div class="fixwidth contact_news">
    <div class="breadCrumbs_sp mt-3 mb-3">
        <div class="breadCrumbs">
            <div><?= $breadcrumbs ?></div>
        </div>
    </div>
    <div class="row">
        <div class="site-content col-lg-9 col-12 col-md-9">
            <h1 class="name_tt_chitiet text-align-center">
                <?= $row_detail['ten' . $lang] ?>
            </h1>
            <div class="mota_tintuc">
                <?= (isset($row_detail['mota' . $lang]) && $row_detail['mota' . $lang] != '') ? htmlspecialchars_decode($row_detail['mota' . $lang]) : '' ?>
            </div>
            <div class="all_gioithieu_index">
                <?= (isset($row_detail['noidung' . $lang]) && $row_detail['noidung' . $lang] != '') ? htmlspecialchars_decode($row_detail['noidung' . $lang]) : '' ?>
            </div>
            <?php if (count($news) > 0) { ?>
                <br><br>
                <div class="title_sp_bc">
                    <div class="title_sp"><?= baivietkhac ?></div>
                </div>
                <div class="owl-carousel owl-theme auto_video mt-3">
                    <?php foreach ($news as $v) {
                        $tintuclist = $d->rawQueryOne("select * from #_news_list where type = 'tin-tuc' and id = '" . $v['id_list'] . "' and hienthi > 0 order by stt,id desc");
                    ?>
                        <div class="all_tintuc">
                            <a href="<?= $v['tenkhongdauvi'] ?>">
                                <div class="cover">
                                    <?= Helper::the_thumbnail($v['photo'], 400, 300, '', $v['ten' . $lang], true) ?>
                                    <div class="post-date">
                                        <div class="day"><?= date("d", $v['ngaytao']) ?></div>
                                        <div class="month">Th<?= date("n", $v['ngaytao']) ?></div>
                                    </div>
                                    <div class="title_tt_img"><a href="<?= $tintuclist['tenkhongdauvi'] ?>" rel="category tag"><?= $tintuclist['ten' . $lang] ?></a></div>
                                    <div class="post-image-mask">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="cover-content">
                                    <a href="<?= $v['tenkhongdauvi'] ?>">
                                        <h4 class="name_tt name-split">
                                            <?= $v['ten' . $lang] ?>
                                        </h4>
                                    </a>
                                    <div class="mota_tt noidung-split">
                                        <?= $v['mota' . $lang] ?>
                                    </div>
                                    <a href="<?= $v['tenkhongdauvi'] ?>">
                                        <p class="view_more">TIẾP TỤC ĐỌC</p>
                                    </a>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="clear"></div>
                <!-- <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div> -->
            <?php } ?>
        </div>
        <div class="sidebar-container col-lg-3 col-md-3 col-12">
            <div class="woodmart-recent-posts">
                <h5 class="widget-title">Bài viết mới</h5>
                <ul class="woodmart-recent-posts-list">
                    <?php foreach ($tintuc as $v) { ?>
                        <li>
                            <a class="recent-posts-thumbnail" href="<?= $v['tenkhongdauvi'] ?>" rel="bookmark">
                                <?= Helper::the_thumbnail($v['photo'], 45, 45, '', $v['ten' . $lang], true) ?>
                            </a>
                            <div class="recent-posts-info">
                                <div class="wd-entities-title title">
                                    <a href="<?= $v['tenkhongdauvi'] ?>" title="<?= $v['ten' . $lang] ?>" rel="bookmark"><?= $v['ten' . $lang] ?></a>
                                </div>
                                <time class="recent-posts-time" datetime="<?= date("d/m/Y h:i A", $v['ngaytao']) ?>"><?= date("d/m/Y", $v['ngaytao']) ?></time>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

</div>