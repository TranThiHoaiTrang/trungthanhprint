<?php

global $func, $act, $com;

if (!defined('SOURCES')) die("Error");

if (empty($config['menu'])) {
    $func->transfer("Trang không tồn tại", "index.php", false);
}

//-------------------------------------------------------------------

switch ( $act ) {

    /** menu */
    case "list":
        Menu_Location::get_list();
        $template = "menu_location/list";
        break;

    case "add":
        $template = "menu_location/add";
        break;

    case "save":
        Menu_Location::save();
        break;

    case "edit":
        Menu_Location::get_item();
        $template = "menu_location/edit";
        break;

    case "delete":
        Menu_Location::delete();
        break;

    //-----------------------------------------------

    default:
        $template = "404";
}

//-------------------------------------------------------------------

class Menu_Location {

    /**
     * @return void
     * @throws Exception
     */
    public static function get_list() {

        global $d, $func, $curPage, $items, $paging;

        $where = "1=1";
        if ( isset( $_REQUEST['keyword'] ) ) {
            $keyword = htmlspecialchars($_REQUEST['keyword']);
            $where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
        }

        $per_page = 10;
        $startpoint = ( $curPage * $per_page ) - $per_page;
        $limit = " limit " . $startpoint . "," . $per_page;

        $sql = "select * from #_menu_locations where $where order by id desc $limit";
        $items = $d->rawQuery($sql);
        $sqlNum = "select count(*) as 'num' from #_menu_locations where $where order by id desc";
        $count = $d->rawQueryOne($sqlNum);

        $total = $count['num'];

        $url = ADMIN_URL . "index.php?com=menu_location&act=list";
        $paging = $func->pagination( $total, $per_page, $curPage, $url );
    }

    /**
     * @return void
     * @throws Exception
     */
    public static function save() {
        global $d, $func;

        if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=menu_location&act=list", false);

        $data = $_POST['data'] ?? null;
        if ( $data ) {
            foreach ($data as $column => $value) {
                $data[$column] = htmlspecialchars($value);
            }

            $data['tenkhongdauvi'] = isset($data['tenvi']) ? $func->changeTitle($data['tenvi']) : '';
            $data['tenkhongdauen'] = isset($data['tenen']) ? $func->changeTitle($data['tenen']) : '';

            $data['stt'] = !empty($data['stt']) ? $data['stt'] : 0;
        }

        $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : 0;

        $data['location'] = null;
        $location = $_POST['location'] ?? null;

        if ( $location ) {
            $data['location'] = implode(',', $location);
        }

        if ($id) {

            $data['ngaysua'] = time();
            $data = $d->filter_data( 'menu_locations', $data );

            $d->where('id', $id);

            if ($d->update('menu_locations', $data)) {
                $func->redirect(ADMIN_URL . "index.php?com=menu_location&act=list");
            } else {
                $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=menu_location&act=list", false);
            }
        } else {

            $data['ngaytao'] = time();
            $data = $d->filter_data( 'menu_locations', $data );

            if ($d->insert('menu_locations', $data)) {
                $id_insert = $d->getLastInsertId();
                $func->redirect(ADMIN_URL . "index.php?com=menu_location&act=list");
            } else {
                $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=menu_location&act=list", false);
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
        //if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=menu_location&act=list", false);

        if (!$id) {
            $func->redirect( ADMIN_URL . "index.php?com=menu_location&act=list" );
        }

        $item = $d->rawQueryOne("select * from #_menu_locations where id = ? limit 0, 1", [$id]);
        if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=menu_location&act=list", false);
    }

    /**
     * @return void
     * @throws Exception
     */
    public static function delete() {
        global $type, $com, $d, $strUrl, $func, $k;

        $id = $_GET['id'] ?? 0;
        if ( $id ) {

            /* Lấy dữ liệu */
            $row = $d->rawQueryOne("select id from #_menu_locations where id = ? limit 0,1", [$id]);

            if ( !empty( $row['id'] ) ) {
                $d->rawQuery("delete from #_menu_locations where id = ?", [$id]);
            }

            $func->redirect(ADMIN_URL . "index.php?com=menu_location&act=list" . $strUrl);

        } elseif ( isset( $_GET['listid'] ) ) {

            $listid = explode( ",", $_GET['listid'] );
            for ($i = 0; $i < count( $listid ); $i++) {

                $id = $listid[$i] ?? 0;

                /* Lấy dữ liệu */
                $row = $d->rawQueryOne("select id from #_menu_locations where id = ? limit 0,1", [$id]);

                if ( !empty( $row['id'] ) ) {
                    $d->rawQuery("delete from #_menu_locations where id = ?", [$id]);
                }
            }

            $func->redirect(ADMIN_URL . "index.php?com=menu_location&act=list" . $strUrl);

        } else {
            $func->transfer("Không nhận được dữ liệu", "index.php?com=menu_location&act=list" . $strUrl, false);
        }
    }
}