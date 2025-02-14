<?php
global $type, $curPage, $act, $config, $seo, $id, $com, $d, $multi_lang;

$linkMan = ADMIN_URL . "index.php?com=menu&act=list&p=" . $curPage;
$linkSave = ADMIN_URL . "index.php?com=menu&act=save&p=" . $curPage;

$colLeft = "col-xl-9 left_content align-self-start";
$colRight = "col-xl-3 right_content align-self-start";

?>
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="<?=ADMIN_URL?>" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Thêm menu mới</li>
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
            <!-- <div style="width: 100%;padding:0 15px;"> -->
            <div class="<?=$colLeft?>">
                <div id="scroll-left">
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Thêm menu mới</h3>
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
                                                <input type="text" class="form-control for-seo" name="data[ten<?=$k?>]" id="ten<?=$k?>" placeholder="Tiêu đề (<?=$k?>)" value="<?=@$item['ten'.$k]?>" <?=($k=='vi')?'required':''?>>
                                            </div>

                                            <div class="form-group">
                                                <label for="alt_ten<?=$k?>">Tiêu đề phụ (<?=$k?>):</label>
                                                <input type="text" class="form-control" name="data[alt_ten<?=$k?>]" id="alt_ten<?=$k?>" placeholder="Tiêu đề phụ (<?=$k?>)" value="<?=@$item['alt_ten'.$k]?>" <?=($k=='vi')?'required':''?>>
                                            </div>

                                            <?php
                                            $_menus = new Menu( $d, $k, null);
                                            $_location_options = $_menus->location_options( @$item['menu_locations_id'], 'ten' . $k );

                                            ?>
                                            <div class="form-group">
                                                <label for="menu_locations_id" style="display: block">Vị trí: <sup>*</sup></label>
                                                <select required class="form-control select2 menu_locations_options" name="menu_locations_id" id="menu_locations_id" style="width: 50%">
                                                    <?php echo $_location_options; ?>
                                                </select>
                                            </div>

                                            <?php
                                            $_options = '';
                                            if ( @$item['menu_locations_id'] ) {
                                                $_menus = new Menu( $d, $k, @$item['menu_locations_id']);
                                                $_options = $_menus->getOptions( @$item, 'ten' . $k );
                                            }

                                            ?>
                                            <div class="form-group">
                                                <label for="parent_id" style="display: block">Menu cha:</label>
                                                <select class="form-control select2 menu_options" name="parent_id" id="parent_id" style="width: 50%">
                                                    <?php echo $_options; ?>
                                                </select>
                                            </div>

                                            <!-- </?php $_disabled = '';
                                            if ( @$item['is_custom_link'] ) $_disabled = ' disabled';

                                            $_options_all = $_menus->getOptionsAll( @$item, 'ten' . $k );
                                            ?>
                                            <div class="form-group">
                                                <label for="menu_id" style="display: block">Link liên kết:</label>
                                                <select<?=$_disabled?> class="form-control select2 select2-ajax-menu" name="menu_id" id="menu_id" style="width: 50%">
                                                    <?php echo $_options_all; ?>
                                                </select>
                                            </div> -->

                                            <!-- <div class="form-group">
                                                <label for="is_custom_link" class="d-inline-block align-middle mb-0 mr-2">URL tùy chỉnh:</label>
                                                <div class="custom-control custom-checkbox d-inline-block align-middle">
                                                    <input type="checkbox" class="custom-control-input is_custom_link-checkbox" name="data[is_custom_link]" id="is_custom_link"<?=@$item['is_custom_link'] ? ' checked' : ''; ?>>
                                                    <label for="is_custom_link" class="custom-control-label"></label>
                                                </div>
                                            </div> -->

                                            <?php $_disabled = ' disabled';
                                                // if ( @$item['is_custom_link'] ) $_disabled = '';
                                                $_disabled = '';
                                            ?>
                                            <div class="form-group">
                                                <label for="custom_url">URL:</label>
                                                <input<?=$_disabled?> type="text" class="form-control" name="data[custom_url]" id="custom_url" placeholder="https://" value="<?=@$item['custom_url']?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="is_blank" class="d-inline-block align-middle mb-0 mr-2">Mở liên kết trong 1 thẻ mới:</label>
                                                <div class="custom-control custom-checkbox d-inline-block align-middle">
                                                    <input type="checkbox" class="custom-control-input blank-checkbox" name="data[is_blank]" id="is_blank"<?=(@$item['is_blank'] == 1) ? ' checked': '' ?>>
                                                    <label for="is_blank" class="custom-control-label"></label>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group">
                                                <label for="xfn">Quan hệ liên kết (XFN):</label>
                                                <input type="text" class="form-control" name="data[xfn]" id="xfn" style="width: 50%" value="<?=esc_attr( @$item['xfn'] )?>">
                                            </div> -->

                                            <div class="form-group">
                                                <label for="css_class">CSS Class:</label>
                                                <input type="text" class="form-control" name="data[css_class]" id="css_class" value="<?=esc_attr( @$item['css_class'] )?>">
                                            </div>

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
                <div id="scroll-right">
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Thuộc tính</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="d-inline-block align-middle mr-2">Hình ảnh:</label>
                                <?php
                                $table_name = 'menu';
                                $input_name = $table_key = 'photo';

                                $photoDetail = !empty($item['photo']) ? $item['photo'] : '';
                                $dimension = "(" . $config['menu']['img_type'] . ")";

                                include LAYOUT . "single_image.php";

                                ?>
                            </div>
                            <!-- <div class="form-group">
                                <label for="icon" class="d-inline-block align-middle mr-2">Icon:</label>
                                <input type="text" class="form-control" name="data[icon]" id="icon" placeholder="Icon" value="<?=esc_attr( @$item['icon'] )?>" />
                            </div>
                            <div class="form-group">
                                <label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
                                <input type="number" class="form-control form-control-mini d-inline-block align-middle" name="data[stt]" id="stt" placeholder="Số thứ tự" value="<?=isset($item['stt']) ? $item['stt'] : 0?>">
                            </div>
                            <div class="form-group">
                                <label for="masonry-checkbox" class="d-inline-block align-middle mb-0 mr-2">Masonry layout:</label>
                                <div class="custom-control custom-checkbox d-inline-block align-middle">
                                    <input type="checkbox" class="custom-control-input masonry-checkbox" name="data[masonry]" id="masonry-checkbox"<?=(@$item['masonry'] == 1) ? ' checked':''?>>
                                    <label for="masonry-checkbox" class="custom-control-label"></label>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-sm bottom_height">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?=@$item['id']?>">
        </div>
    </form>
</section>

