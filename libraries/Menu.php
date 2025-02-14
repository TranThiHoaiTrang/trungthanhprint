<?php



final class Menu {



    private $_d;

    private $_menu;

    private $_k;



    /**

     * @param $d

     * @param $k

     * @param null $request_location

     */

    public function __construct($d, $k, $request_location = null )

    {

        if (!$k) {

            $k = 'vi';

        }



        $this->_k = $k;



        $this->_d = $d;

        $this->_menu = $this->_init( $request_location );

    }



    /**

     * @param $request_location

     * @return array

     */

    private function _init( $request_location = null ): array

    {

        $sql = "SELECT * FROM #_menu ORDER BY stt, id ASC";



        $locations_id = false;

        if ( $request_location && (int) $request_location > 0 ) {

            $locations_id = $request_location;

        } elseif ( isset( $_REQUEST['locations_id'] ) ) {

            $locations_id = $_REQUEST['locations_id'] ?? '';

        }



        if ($locations_id) {

            $sql = "SELECT * FROM #_menu WHERE `menu_locations_id` = '{$locations_id}' ORDER BY stt, id ASC";

        }



        return $this->_d->rawQuery($sql);

    }



    /**

     * @param $list

     * @param $parent

     * @return array

     */

    private function _createTree(&$list, $parent): array

    {

        $tree = [];

        if ( isset($parent[0]) ) {

            foreach ($parent as $l) {



                $l['deep'] = $this->deep($l['id']);

                if (isset($list[$l['id']])) {

                    $l['children'] = $this->_createTree($list, $list[$l['id']]);

                }



                $tree[] = $l;

            }

        }



        return $tree;

    }



    /**

     * @return array

     */

    public function getTree(): array

    {

        $new = [];

        foreach ($this->_menu as $a) {

            $new[$a['parent_id']][] = $a;

        }



        if ( isset( $new[0] ) ) {

            return $this->_createTree($new, $new[0]);

        }



        return [];

    }



    /**

     * @param $term_id

     * @return bool

     */

    public function has_children( $term_id ): bool

    {

        if ( !is_int( $term_id ) ) {

            $term_id = $term_id['id'] ?? 0;

        }



        if ( $term_id ) {



            $sqlNum = "select count(*) as 'num' from #_menu where parent_id = ? limit 1";

            $count = $this->_d->rawQueryOne($sqlNum, [ $term_id ]);



            $total = $count['num'];



            if ( $total > 0 ) return true;

        }



        return false;

    }



    /**

     * @param $term

     * @param $term_check_id

     * @return bool

     */

    public function in_children( $term, $term_check_id ): bool

    {

        $children = $this->get_children( $term );

        foreach ( $children as $child ) {

            if ( isset( $child['id'] ) && $term_check_id == $child['id'] ) {

                return true;

            }

        }



        return false;

    }



    /**

     * @param $term

     * @param array $results

     * @return array

     */

    public function get_children($term, array &$results = [] ): array

    {

        if (is_int($term)) {

            $sql = "select id, parent_id from #_menu where id = ? limit 1";

            $term = $this->_d->rawQueryOne($sql, [$term]);

        }



        if ( !empty( $term['id'] ) ) {

            $sql = "select * from #_menu where parent_id = ?";

            $children = $this->_d->rawQuery($sql, [ $term['id'] ]);

            foreach ($children as $child) {

                if ( isset( $child['id'] ) ) {

                    $results[] = $child;

                    $this->get_children( $child, $results );

                }

            }

        }



        return $results;

    }



    /**

     * @param $current_id

     * @return int

     */

    public function deep( $current_id ): int

    {

        $sql = "select id, parent_id from #_menu where id = ? limit 1";

        $tmp = $this->_d->rawQueryOne($sql, [$current_id]);



        $deep = 0;

        while ($tmp['parent_id'] > 0 && $tmp['parent_id'] != $tmp['id']) {



            $sql = "select id, parent_id from #_menu where id = ? limit 1";

            $tmp = $this->_d->rawQueryOne($sql, [$tmp['parent_id']]);



            ++$deep;

        }



        unset($tmp);

        return $deep;

    }



    public function getOptionsAll($term = null, string $col_name = '', string $default_name = 'No selection') {

        global $config, $d;

        if (!$col_name) {

            $col_name = 'ten' . $this->_k;

        }



        $tbl = $term['tbl'] ?? '';

        $tbl_id = $term['tbl_id'] ?? 0;



        $options = '<option value="" data-default>' . $default_name . '</option>';



        $menu_config_relations = $config['menu']['relation'] ?? '';

        if ( $menu_config_relations && is_array( $menu_config_relations ) ) {

            foreach ( $menu_config_relations as $menu_config_tbl => $menu_config_title ) {

                $options .= '<optgroup label="' . esc_attr( $menu_config_title ) . '">';

                $sql_loai = "and type != 'khach-hang' and type != 'linhvuc-hoatdong' and type != 'tamnhan-sumenh' and type != 'quatrinh-hinhthanh' and type != 'doingu-nhanvien' and type != 'cosohatang' and type != 'khach-hang' and type != 'chi-nhanh' and type != 'ly-do' and type != 'nhung-con-so'";

                $sql = "SELECT * FROM #_{$menu_config_tbl} WHERE hienthi = 1 $sql_loai ORDER BY id ASC";

                $results = $d->rawQuery( $sql );

                if ( $results ) {

                    foreach ( $results as $result ) {

                        $selected = '';

                        if ( $tbl == $menu_config_tbl && $tbl_id == $result['id'] ) $selected = ' selected';



                        $options .= '<option' . $selected . ' value="' . $menu_config_tbl . '|' . $result['id'] . '">' . $result[$col_name] . '</option>';

                    }

                }



                $options .= '</optgroup>';

            }

        }



        return $options;

    }



    /**

     * @param null $term

     * @param string $col_name

     * @param bool $force_show

     * @param string $default_name

     * @return string

     */

    public function getOptions($term = null, string $col_name = '', bool $force_show = false, string $default_name = 'No selection'): string {

        if (!$col_name) {

            $col_name = 'ten' . $this->_k;

        }



        $trees = $this->getTree();

        $_options = '<option value="" data-default>' . $default_name . '</option>';



        $id = $term['id'] ?? 0;

        $parent_id = $term['parent_id'] ?? 0;



        foreach ( $trees as $tree ) {

            $_selected = '';

            $_disabled = '';

            $_force_disable = false;



            if ( $parent_id == $tree['id'] ) $_selected = ' selected';

            if ( isset( $_GET['menu'] ) && $_GET['menu'] == $tree['id'] ) $_selected = ' selected';



            if ( $id == $tree['id'] ) {

                $_disabled = ' disabled';

                $_force_disable = true;

            }



            if ( $force_show ) $_disabled = '';

            $_options .= '<option' . $_selected . $_disabled . ' value="' . $tree['id'] . '">' . $this->get_deep_gap( $tree['deep'] ) . $tree[$col_name] . '</option>';

            $children = $tree['children'] ?? null;



            $_options .= $this->_loop_options_child($term, $col_name, $children, $_force_disable, $force_show);

        }



        return $_options;

    }



    /**

     * @param null $term

     * @param string $col_name

     * @param $childs

     * @param $force_disable

     * @param bool $force_show

     * @return string

     */

    private function _loop_options_child( $term = null, string $col_name, $children, &$force_disable, bool $force_show ): string

    {

        $options = '';

        if (!$children) {

            return $options;

        }



        $id = $term['id'] ?? 0;

        $parent_id = $term['parent_id'] ?? 0;



        $force_disable_clone = false;

        if ( $force_disable ) $force_disable_clone = true;



        foreach ( $children as $child_item ) {



            $_selected = '';

            $_disabled = '';



            // reset trạng thái

            if ( !$force_disable_clone ) $force_disable = false;



            if ( $parent_id == $child_item['id'] ) $_selected = ' selected';

            if ( isset( $_GET['menu'] ) && $_GET['menu'] == $child_item['id'] ) $_selected = ' selected';



            if ( $id == $child_item['id'] ) {

                $_disabled = ' disabled';

                $force_disable = true;

            }



            if ( $force_disable ) $_disabled = ' disabled';

            if ( $force_show ) $_disabled = '';



            $options .= '<option' . $_selected . $_disabled . ' value="' . $child_item['id'] . '">' . $this->get_deep_gap($child_item['deep']) . $child_item[$col_name] . '</option>';



            $children_tmp = $child_item['children'] ?? null;

            $options .= $this->_loop_options_child( $term, $col_name, $children_tmp, $force_disable, $force_show );

        }



        return $options;

    }



    /**

     * @param $current_id

     * @param string $col_name

     * @param string $default_name

     * @return string

     */

    public function location_options( $current_id = null, string $col_name = '', string $default_name = 'No selection' ): string

    {



        if (!$col_name) {

            $col_name = 'ten' . $this->_k;

        }



        $sql = "select * from #_menu_locations order by id ASC";

        $items = $this->_d->rawQuery($sql);



        $_options = '<option value="" data-default>' . $default_name . '</option>';

        foreach ( $items as $item ) {

            $_selected = '';



            if ( !empty($current_id) && $current_id == $item['id'] ) {

                $_selected = ' selected';

            }



            $_options .= '<option' . $_selected . ' value="' . $item['id'] . '">' . $item[$col_name] . '</option>';

        }



        return $_options;

    }



    /**

     * @param $location_id

     * @return bool

     */

    public function location_has_menu ( $location_id ): bool

    {

        if ( $location_id ) {

            $sql = "select id from #_menu where menu_locations_id = ? limit 1";

            $item = $this->_d->rawQueryOne($sql, [ $location_id ]);



            if ( ! empty( $item['id'] )) {

                return true;

            }

        }



        return false;

    }



    /**

     * @param int $deep

     * @param string $deep_gap

     * @return string

     */

    public function get_deep_gap(int $deep = 0, string $deep_gap = '--'): string

    {

        $gap = '';

        if ($deep > 0) {

            while ($deep > 0) {

                $deep--;

                $gap .= $deep_gap;

            }



            $gap .= '&nbsp;';

        }



        return $gap;

    }



    /**

     * @param $location

     * @return mixed

     */

    public function get_menu_location($location) {



        $where = "";



        $location = strtolower( $location );

        $where .= " AND LOWER(location) REGEXP '$location'";



        $sql = "select * from #_menu_locations where 1 = 1 $where limit 1";



        return $this->_d->rawQueryOne($sql);

    }



    /**

     * @param $location_id

     * @return mixed

     */

    public function get_menu_by_location( $location_id ) {



        $where = "";

        if ( $location_id && (int) $location_id > 0 ) {

            $where .= " AND `menu_locations_id` = '$location_id'";

        }



        $sql = "select * from #_menu where 1 = 1 $where order by stt, id asc";



        return $this->_d->rawQuery($sql);

    }



    /**

     * @param $menu_id

     * @return mixed

     */

    public function get_menu( $menu_id ) {

        $sql = "select * from #_menu where id = ? limit 1";



        return $this->_d->rawQueryOne($sql, [ $menu_id ]);

    }



    /**

     * @param $menu

     * @param string $lang

     * @return mixed|string

     */

    public function get_menu_link($menu, string $lang = 'vi' ) {



        global $d;

        $url = BASE_URL;



        if ( is_int( $menu ) ) {

            $menu = $this->get_menu( $menu );

        }

        $url = $menu['custom_url'] ?? '#';
        // if ( !empty( $menu['is_custom_link'] ) ) {

        //     $url = $menu['custom_url'] ?? '#';

        // } else {



        //     $tbl = $menu['tbl'] ?? '';

        //     $tbl_id = $menu['tbl_id'] ?? 0;



        //     if ( $tbl && $tbl_id ) {

        //         $tmp = $d->get_by_id( $tbl, $tbl_id );



        //         if ( !empty( $tmp['tenkhongdau' . $lang] ) ) {

        //             $url = BASE_URL . $tmp['tenkhongdau' . $lang];

        //         }

        //     }

        // }



        return $url;

    }



    /**

     * @param $menu

     * @return string

     */

    public function get_menu_rel( $menu ): string

    {

        if ( is_scalar( $menu ) ) {

            $menu = $this->get_menu( $menu );

        }



        $rel = '';

        if ( !empty( $menu['xfn'] ) ) {

            $rel = ' rel="' . $menu['xfn'] . '"';

        }



        return $rel;

    }



    /**

     * @param $menu

     * @return string

     */

    public function get_menu_blank( $menu ): string

    {

        if ( is_scalar( $menu ) ) {

            $menu = $this->get_menu( $menu );

        }



        $blank = '';

        if ( $menu['is_blank'] ) {

            $blank = ' target="_blank"';

        }



        return $blank;

    }



    /**

     * @return void

     */

    public function social_menu ( $title = false ) {

        global $lang;



        $sql = "select * from #_photo where type = 'mxh' and hienthi = 1 order by stt, id asc";

        $_arr_mxh = $this->_d->rawQuery( $sql );



        if ($_arr_mxh) {



            if ( $title ) echo '<p class="social-title">' . $title . '</p>';

            echo '<ul class="social-menu menu conn-lnk">';



            foreach ( $_arr_mxh as $_mxh ) {

                $_icon = $_mxh['icon'] ?? '';

                $_ten = $_mxh['ten' . $lang] ?? '';

                $_link = $_mxh['link'] ?? '';



                echo '<li class="menu-item ' . strtolower( $_ten ) . '">';

                echo '<a title="' . esc_attr( $_ten ) . '" rel="noopener nofollow" href="' . $_link . '" target="_blank">';

                echo '<i class="' . $_icon . '"></i>';

                echo '<span class="screen-reader-text">' . $_ten . '</span>';

                echo '</a>';

                echo '</li>';

            }



            echo '</ul>';

        }

    }



    public function thanhtoan_menu ( $title = false ) {

        global $lang;



        $sql = "select * from #_photo where type = 'thanh-toan' and hienthi = 1 order by stt, id asc";

        $_arr_mxh = $this->_d->rawQuery( $sql );



        if ($_arr_mxh) {



            if ( $title ) echo '<p class="social-title">' . $title . '</p>';

            echo '<ul class="social-menu menu conn-lnk">';



            foreach ( $_arr_mxh as $_mxh ) {

                $_icon = $_mxh['icon'] ?? '';

                $_ten = $_mxh['ten' . $lang] ?? '';

                $_link = $_mxh['link'] ?? '';



                echo '<li class="menu-item ' . strtolower( $_ten ) . '">';

                echo '<a title="' . esc_attr( $_ten ) . '" rel="noopener nofollow" href="' . $_link . '" target="_blank">';

                echo '<i class="' . $_icon . '"></i>';

                echo '<span class="screen-reader-text">' . $_ten . '</span>';

                echo '</a>';

                echo '</li>';

            }



            echo '</ul>';

        }

    }

}