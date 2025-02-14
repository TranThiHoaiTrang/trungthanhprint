<?php
global $config, $type, $curPage, $paging, $d;

$linkMan = ADMIN_URL . "index.php?com=menu&act=list&p=" . $curPage;
$linkAdd = ADMIN_URL . "index.php?com=menu&act=add&p=" . $curPage;
$linkEdit = ADMIN_URL . "index.php?com=menu&act=edit&p=" . $curPage;
$linkDelete = ADMIN_URL . "index.php?com=menu&act=delete&p=" . $curPage;

$linkFilter = ADMIN_URL . "index.php?com=menu&act=list&p=" . $curPage;

?>
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="<?=ADMIN_URL;?>" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý menu</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">

    <div class="card-footer text-sm sticky-top">
        <a class="btn btn-sm bg-gradient-primary text-white" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="<?=$linkDelete?>" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
        <div class="form-inline form-search d-inline-block align-middle ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar text-sm" type="search" id="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="<?=(isset($_GET['keyword'])) ? $_GET['keyword'] : ''?>" onkeypress="doEnter(event,'keyword','<?=$linkMan?>')">
                <div class="input-group-append bg-primary rounded-right">
                    <button class="btn btn-navbar text-white" type="button" onclick="onSearch('keyword','<?=$linkMan?>')">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <?php
        $k = 'vi';
        $menus = new Menu( $d, $k, null);
        $_options = $menus->getOptions( null, 'ten' . $k, true, 'Danh sách menu' );
        ?>
        <select class="form-control select2" name="menu" id="menu" title style="flex: 0 0 auto;width: auto;min-width: 300px;">
            <?php echo $_options; ?>
        </select>

        <?php
        $locations_id = $_GET['locations_id'] ?? null;
        $_location_options = $menus->location_options( $locations_id, 'ten' . $k );
        ?>
        <select class="form-control select2 select-change-event" data-event="locations_id" data-com="menu" data-act="list" name="menu_locations_id" id="menu_locations_id" title style="flex: 0 0 auto;width: auto;min-width: 300px;">
            <?php echo $_location_options; ?>
        </select>

    </div>

    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách menu</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="align-middle th-checkbox">
                        <div class="custom-control custom-checkbox my-checkbox">
                            <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                            <label for="selectall-checkbox" class="custom-control-label"></label>
                        </div>
                    </th>
                    <th class="align-middle text-center">STT</th>
                    <!-- </?php if ( ! empty( $config['menu']['menu_image'] ) ) : ?>
                    <th class="align-middle">Ảnh</th>
                    </?php endif; ?>
                    </?php if ( ! empty( $config['menu']['menu_icon'] ) ) : ?>
                    <th class="align-middle">Icon</th>
                    </?php endif; ?> -->
                    <th class="align-middle">Tiêu đề</th>
                    <th class="align-middle">Menu cha</th>
                    <th class="align-middle text-center">Cấp</th>
                    <th class="align-middle">Vị trí</th>
                    <th class="align-middle text-center"></th>
                </tr>
                </thead>
                <?php if ( empty( $items ) ) :  ?>
                <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
                <?php else : ?>
                <tbody>
                    <?php
                        $menus = new Menu( $d, 'vi');
                        for ($i = 0; $i < count( $items ); $i++) :
                            $item = $items[$i];

                            $_is_menu_child = false;
                            if ( $menus->has_children( $item ) ) {
                                $_is_menu_child = true;
                            }
                    ?>
                    <tr>
                        <td class="align-middle td-checkbox">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <?php if ( $_is_menu_child ) : ?>
                                    <input disabled readonly type="checkbox" class="custom-control-input" id="select-checkbox-<?=$items[$i]['id']?>" value="0">
                                <?php else : ?>
                                    <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-<?=$items[$i]['id']?>" value="<?=$items[$i]['id']?>">
                                <?php endif; ?>
                                <label for="select-checkbox-<?=$items[$i]['id']?>" class="custom-control-label"></label>
                            </div>
                        </td>

                        <td class="align-middle">
                            <input type="number" class="form-control form-control-mini m-auto update-stt" value="<?=$item['stt']?>" data-id="<?=$item['id']?>" data-table="menu" title>
                        </td>

                        <!-- </?php if ( ! empty( $config['menu']['menu_image'] ) ) :
                            $thumb_link = Helper::thumbnail_link($item['photo'], 180, 180);
                        ?>
                        <td class="align-middle">
                            <a href="<?=$linkEdit?>&id=<?=$item['id']?>" title="<?=$item['tenvi']?>">
                                <img class="rounded img-preview" src="<?=$thumb_link?>" alt="<?=$item['tenvi']?>">
                            </a>
                        </td>
                        </?php endif; ?>
                        </?php if ( ! empty( $config['menu']['menu_icon'] ) ) : ?>
                        <td class="align-middle"><i class="<?=@$item['icon']?> fs-24"></i></td>
                        </?php endif; ?> -->
                        <td class="align-middle">
                            <a class="text-dark" href="<?=$linkEdit?>&id=<?=$item['id']?>" title="<?=$item['tenvi']?>"><?=$item['tenvi']?></a>
                        </td>
                        <td class="align-middle">
                            <?php
                            $sql = "select * from #_menu where id = ? limit 1";
                            $tmp = $d->rawQueryOne( $sql, [ $item['parent_id'] ] );

                            if ( $tmp ) echo $tmp['tenvi'];
                            else echo '_';

                            ?>
                        </td>
                        <td class="align-middle text-center">
                            <?php
                            $deep = $menus->deep( $item['id'] );
                            echo $deep == 0 ? '_' : (int) $deep;
                            ?>
                        </td>
                        <td class="align-middle">
                            <?php
                            $menu_locations_id = $item['menu_locations_id'] ?? 0;
                            $sql = "select * from #_menu_locations where id = ? limit 1";
                            $tmp = $d->rawQueryOne( $sql, [ $menu_locations_id ] );

                            if ( $tmp ) echo $tmp['tenvi'];
                            else echo '_';

                            ?>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-primary mr-2" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                            <?php if ( $_is_menu_child ) : ?>
                                <a disabled class="text-danger" data-url="#" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                            <?php else : ?>
                                <a class="text-danger" id="delete-item" data-url="<?=$linkDelete?>&id=<?=$items[$i]['id']?>" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
                <?php endif; ?>
            </table>
        </div>
    </div>

    <?php if( $paging ) : ?>
    <div class="card-footer text-sm pb-0"><?=$paging?></div>
    <?php endif; ?>

    <div class="card-footer text-sm">
        <a class="btn btn-sm bg-gradient-primary text-white" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="<?=$linkDelete?>" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
    </div>

</section>
