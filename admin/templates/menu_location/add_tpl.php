<?php
global $type, $curPage, $act, $config, $seo, $id, $com, $d, $multi_lang;

$linkMan = ADMIN_URL . "index.php?com=menu_location&act=list&p=" . $curPage;
$linkSave = ADMIN_URL . "index.php?com=menu_location&act=save&p=" . $curPage;

$colLeft = "col-xl-12 left_content align-self-start";
$colRight = "d-none";

?>
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="<?=ADMIN_URL?>" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Thêm vị trí menu mới</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>

        <div class="row">
            <div class="<?=$colLeft?>">
                <div id="scroll-left">
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Thêm vị trí </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="<?php if ( $multi_lang ) echo 'card card-primary card-outline card-outline-tabs'; ?>">
                                <?php if ( $multi_lang ) : ?>
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                                        <?php foreach($config['website']['lang'] as $k => $v) : ?>
                                        <li class="nav-item">
                                            <a class="nav-link <?=($k=='vi')?'active':''?>" id="tabs-lang" data-toggle="pill" href="#tabs-lang-<?=$k?>" role="tab" aria-controls="tabs-lang-<?=$k?>" aria-selected="true"><?=$v?></a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <div class="card-article <?php if ( $multi_lang ) echo 'card-body'; ?>">
                                    <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                        <?php foreach($config['website']['lang'] as $k => $v) : ?>
                                        <div class="tab-pane fade show <?=($k=='vi')?'active':''?>" id="tabs-lang-<?=$k?>" role="tabpanel" aria-labelledby="tabs-lang">

                                            <div class="form-group">
                                                <label for="ten<?=$k?>">Tiêu đề (<?=$k?>):</label>
                                                <input type="text" class="form-control" name="data[ten<?=$k?>]" id="ten<?=$k?>" placeholder="Tiêu đề (<?=$k?>)" <?=($k=='vi')?'required':''?>>
                                            </div>

                                            <div class="form-group">
                                                <label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
                                                <input type="number" class="form-control form-control-mini d-inline-block align-middle" name="data[stt]" id="stt" placeholder="Số thứ tự" value="0">
                                            </div>

                                            <?php if ( !empty( $config['menu']['location'] ) ) : ?>
                                            <div class="form-group">
                                                <?php
                                                $menus = new Menu( $d, 'vi');
                                                $_locations = $config['menu']['location'];
                                                foreach ( $_locations as $i => $loc ) :

                                                    $sql = "select * from #_menu_locations";
                                                    $items = $d->rawQuery($sql);

                                                    $check = false;
                                                    foreach ($items as $item_loc) {
                                                        if ( $item_loc['location'] ) {
                                                            $tmp = explode(',', $item_loc['location']);
                                                            if ( in_array( $i, $tmp) ) $check = true;
                                                        }
                                                    }
                                                 ?>
                                                <div class="form-row">
                                                    <div class="custom-control custom-checkbox d-inline-block align-middle">
                                                        <?php if ( $check) : ?>
                                                        <input disabled type="checkbox" class="custom-control-input" name="location[]" id="<?=$i?>" value="<?=$i?>">
                                                        <?php else : ?>
                                                        <input type="checkbox" class="custom-control-input" name="location[]" id="<?=$i?>" value="<?=$i?>">
                                                        <?php endif;?>
                                                        <label for="<?=$i?>" class="custom-control-label"></label>
                                                    </div>
                                                    <label for="<?=$i?>" class="d-inline-block align-middle mb-0 mr-2 label-title"><?=$loc?></label>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="<?=$colRight?>">
                <div id="scroll-right"></div>
            </div>
        </div>

        <div class="card-footer text-sm bottom_height">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
    </form>
</section>

