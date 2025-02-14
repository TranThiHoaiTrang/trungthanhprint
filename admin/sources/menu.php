<?php

global $func, $act, $com, $d;;

if (!defined('SOURCES')) die("Error");

if ( empty($config['menu']) ) {
    $func->transfer("Trang không tồn tại", "index.php", false);
}

$strUrl = "";
if ( isset($_REQUEST['keyword']) ) {
    $strUrl .= "&keyword=" . htmlspecialchars($_REQUEST['keyword']);
}

//-------------------------------------------------------------------

switch ( $act ) {

    /** menu */
    case "list":
        Menu_Controller::get_list();
        $template = "menu/list";
        break;

    case "add":
        $template = "menu/add";
        break;

    case "save":
        Menu_Controller::save();
        break;

    case "edit":
        Menu_Controller::get_item();
        $template = "menu/add";
        break;

    case "delete":
        Menu_Controller::delete();
        break;

    //-----------------------------------------------

    default:
        $template = "404";
}

//-------------------------------------------------------------------

class Menu_Controller {

    public static function get_list() {
        global $d, $func, $curPage, $items, $paging;

        $where = "1=1";
        if ( isset( $_REQUEST['keyword'] ) ) {
            $keyword = htmlspecialchars($_REQUEST['keyword']);
            $where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
        }

        if ( isset( $_GET['locations_id'] ) ) {
            $locations_id = htmlspecialchars( $_GET['locations_id'] );
            $where .= " and menu_locations_id = '{$locations_id}'";
        }

        $per_page = 20;
        $startpoint = ( $curPage * $per_page ) - $per_page;
        $limit = " limit " . $startpoint . "," . $per_page;

        $sql = "select * from #_menu where $where order by stt, id asc $limit";
        $items = $d->rawQuery($sql);
        $sqlNum = "select count(*) as 'num' from #_menu where $where order by id desc";
        $count = $d->rawQueryOne($sqlNum);

        $total = $count['num'];

        $url = ADMIN_URL . "index.php?com=menu&act=list";
        $paging = $func->pagination( $total, $per_page, $curPage, $url );
    }

    /**
     * @return void
     * @throws Exception
     */
    public static function save() {
        global $d, $strUrl, $func;

        if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=menu&act=list" . $strUrl, false);

        $data = $_POST['data'] ?? null;
        if ( $data ) {
            foreach ($data as $column => $value) {
                $data[$column] = htmlspecialchars($value);
            }

            if (isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
            else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';

            if (isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
            else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';

            $data['stt'] = !empty($data['stt']) ? $data['stt'] : 0;
        }

        $data['menu_locations_id'] = !empty( $_POST['menu_locations_id']) ? $_POST['menu_locations_id'] : 0;
        $data['parent_id'] = !empty($_POST['parent_id']) ? $_POST['parent_id'] : 0;

        $data['is_custom_link'] = $data['is_custom_link'] ? 1 : 0;
        $data['is_blank'] = $data['is_blank'] ? 1 : 0;
        $data['masonry'] = $data['masonry'] ? 1 : 0;

        // link
        $data['tbl'] = '';
        $data['tbl_id'] = 0;

        if ( ! $data['custom_url'] ) $data['custom_url'] = '#';
        // if ( $data['is_custom_link'] ) {

        //     $data['tbl'] = '';
        //     $data['tbl_id'] = 0;

        //     if ( ! $data['custom_url'] ) $data['custom_url'] = '#';

        // } else {

        //     $data['custom_url'] = '';
        //     $menu_tmp = $_POST['menu_id'] ?? '';

        //     if ( $menu_tmp ) $menu_tmp = explode('|', $menu_tmp);

        //     $data['tbl'] = $menu_tmp[0] ?? '';
        //     $data['tbl_id'] = !empty( $menu_tmp[1] ) ? (int) $menu_tmp[1] : 0;
        // }

        // single photo
        if ( !empty( $_POST['single-photo'] ) ) {
            $data['photo'] = $_POST['single-photo'];
        }

        $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : 0;

        //...
        $redirect_url = ADMIN_URL . "index.php?com=menu&act=list";
        if ( $data['menu_locations_id'] ) {
            $redirect_url .= '&locations_id=' . $data['menu_locations_id'];
        }

        $redirect_url .= $strUrl;

        //...
        if ($id) {

            $data['ngaysua'] = time();
            $data = $d->filter_data( 'menu', $data );

            $d->where('id', $id);
            if ($d->update('menu', $data)) {
                $func->redirect($redirect_url);
            } else {
                $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=menu&act=edit&id=" . $id . $strUrl, false);
            }

        } else {

            $data['ngaytao'] = time();
            $data = $d->filter_data( 'menu', $data );

            if ($d->insert('menu', $data)) {
                $id_insert = $d->getLastInsertId();
                $func->redirect($redirect_url);
            } else {
                $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=menu&act=add" . $strUrl, false);
            }
        }
    }

    /**
     * @return void
     * @throws Exception
     */
    public static function get_item() {
        global $d, $func, $item;

        $id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;
        //if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=menu&act=list", false);

        if (!$id) {
            $func->redirect( ADMIN_URL . "index.php?com=menu&act=list" );
        }

        $item = $d->rawQueryOne("select * from #_menu where id = ? limit 0, 1", [$id]);
        if (!$item['id']) {
            $func->transfer("Dữ liệu không có thực", "index.php?com=menu&act=list", false);
        }
    }

    /**
     * @return void
     * @throws Exception
     */
    public static function delete() {
        global $type, $com, $d, $strUrl, $func, $k;

        $menu = new Menu($d, $k);

        $id = $_GET['id'] ?? 0;
        if ( $id ) {

            $has_children = $menu->has_children($id);
            if (!$has_children) {

                /* Lấy dữ liệu */
                $row = $d->rawQueryOne("select id from #_menu where id = ? limit 0,1", [$id]);

                if ( !empty( $row['id'] ) ) {
                    $d->rawQuery("delete from #_menu where id = ?", [$id]);
                }
            }

            $func->redirect(ADMIN_URL . "index.php?com=menu&act=list" . $strUrl);

        } elseif ( isset( $_GET['listid'] ) ) {

            $listid = explode( ",", $_GET['listid'] );
            for ($i = 0; $i < count( $listid ); $i++) {

                $id = $listid[$i] ?? 0;
                $has_children = $menu->has_children($id);

                if (!$has_children) {

                    /* Lấy dữ liệu */
                    $row = $d->rawQueryOne("select id, photo from #_menu where id = ? limit 0,1", [$id]);

                    if ( !empty( $row['id'] ) ) {
                        $d->rawQuery("delete from #_menu where id = ?", [$id]);
                    }
                }
            }

            $func->redirect(ADMIN_URL . "index.php?com=menu&act=list" . $strUrl);

        } else {
            $func->transfer("Không nhận được dữ liệu", "index.php?com=menu&act=list" . $strUrl, false);
        }
    }
}