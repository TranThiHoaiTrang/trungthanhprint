<?php
$linkSave = "index.php?com=seopage&act=save&type=" . $_GET['type'];
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý Seo page</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Hình ảnh <?= $config['product'][$type]['title_main'] ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">

                <?php

                $table_name = 'seopage';

                // photo
                $title = 'Ảnh đại diện';
                $photoDetail = @$item['photo'] ?? '';
                $input_name = $table_key = 'photo';
                include LAYOUT_PATH . "single_image.php";

                ?>
            </div>
        </div>
        <!-- <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">banner <?= $config['product'][$type]['title_main'] ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">

                </?php

                $table_name = 'seopage';

                // photo
                $title = 'Ảnh đại diện';
                $photoDetail = @$item['photo1'] ?? '';
                $input_name = $table_key = 'photo1';
                include LAYOUT_PATH . "single_image.php";

                ?>
            </div>
        </div> -->
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Nội dung <?= $config['product'][$type]['title_main'] ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <?php foreach ($config['website']['lang'] as $k => $v) { ?>
                    <!-- </?php if ($type != 'gioi-thieu' && $type != 'lien-he') { ?> -->
                    <div class="form-group">
                        <label for="mota<?= $k ?>">Mô tả (<?= $k ?>):</label>
                        <textarea class="form-control for-seo ckeditor" name="dataSeo[mota<?= $k ?>]" id="mota<?= $k ?>" rows="5" placeholder="Mô tả (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['mota' . $k]) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="noidung<?= $k ?>">Nội dung (<?= $k ?>):</label>
                        <textarea class="form-control for-seo ckeditor" name="dataSeo[noidung<?= $k ?>]" id="noidung<?= $k ?>" rows="5" placeholder="Nội dung (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['noidung' . $k]) ?></textarea>
                    </div>
                    <!-- </?php } ?> -->
                <?php } ?>
                <div class="form-group">
                    <label for="schema">Schema:</label>
                    <textarea class="form-control for-seo" name="dataSeo[schema]" id="schema" rows="8" placeholder="Schema"><?= htmlspecialchars_decode(@$item['schema']) ?></textarea>
                </div>
            </div>
        </div>
        <?php /*<div class="form-group">
                    <label class="change-photo" for="banner">
                        <p>Upload banner:</p>
                        <div class="rounded">
                            <img class="rounded img-upload" src="<?=THUMBS?>/1366x360x1/<?=UPLOAD_SEOPAGE_L.$item['banner']?>" onerror="src='assets/images/noimage.png'" alt="Alt Photo"/>
                            <strong>
                                <b class="text-sm text-split"></b>
                                <span class="btn btn-sm bg-gradient-success"><i class="fas fa-camera mr-2"></i>Chọn hình</span>
                            </strong>
                        </div>
                    </label>
                    <strong class="d-block mt-2 mb-2 text-sm"><?php echo " 1920px - Height: 506px (".$config['seopage']['img_type'].")" ?></strong>
                    <div class="custom-file1 my-custom-file1 d-none">
                        <input type="file" class="custom-file-input1" name="banner" id="banner">
                        <label class="custom-file-label1" for="banner">Chọn file</label>
                    </div>
                </div>*/ ?>
        <?php
        $seoDB = $item;
        include LAYOUT_PATH . "seo.php";
        ?>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
        </div>
    </form>
</section>