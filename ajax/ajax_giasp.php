<?php
include "ajax_config.php";

$idpro = (isset($_POST['idpro']) && $_POST['idpro'] > 0) ? htmlspecialchars($_POST['idpro']) : 0;
$idmau = (isset($_POST['idmau']) && $_POST['idmau'] > 0) ? htmlspecialchars($_POST['idmau']) : 0;
$idsize = (isset($_POST['idsize']) && $_POST['idsize'] > 0) ? htmlspecialchars($_POST['idsize']) : 0;


$row_detail = $d->rawQueryOne("select gia, giamoi, giasize, giamau from #_product where id = ? and type = ? limit 0,1", array($idpro, 'san-pham'));

$temps_mau = $d->rawQueryOne("select id_mau from #_product where id = ? and type = ? limit 0,1", array($idpro, 'san-pham'));
$all_id_mau = explode(',', $temps_mau['id_mau']);

$temps_size = $d->rawQueryOne("select id_size from #_product where id = ? and type = ? limit 0,1", array($idpro, 'san-pham'));
$all_id_size = explode(',', $temps_size['id_size']);
?>
<?php
$demmau = -1;
// var_dump(count($all_id_mau)*count($all_id_size));
if (!empty($idpro) && !empty($idmau)) {
    for ($i = 0; $i < (count($all_id_mau)*count($all_id_size)); $i++) {
        $giamauproduct = explode('/', $row_detail['giamau']);
        $demmau += 1;
        $giamauproduct = explode('_', $giamauproduct[$demmau]);
        // var_dump($demmau);
        if ($giamauproduct[0] == $idsize && $giamauproduct[1] == $idmau) {
?>
            <span style="margin-right: 5px;">Giá: </span>
            <?php if ($row_detail['giamoi']) { ?>
                <p class="price" style="margin-bottom: 0;">
                    <ins class="highlight">
                        <?= $func->format_money($giamauproduct[2]) ?>
                    </ins>
                    <input type="hidden" name="giasize" value="<?=$giamauproduct[2]?>">
                </p>
                <del>
                    <ins class="highlight_del">
                        <?= $func->format_money($row_detail['gia']) ?>
                    </ins>
                </del>
            <?php } else { ?>
                <p class="price" style="margin-bottom: 0;">
                    <ins class="highlight">
                        <?= $func->format_money($row_detail['gia']) ?>
                    </ins>
                    <input type="hidden" name="giasize" value="<?=$row_detail['gia']?>">
                </p>
            <?php } ?>
    <?php }
    } ?>
<?php } elseif (!empty($idpro) && empty(!$idmau)) {
    for ($i = 0; $i < count($all_id_size); $i++) {
        $giaieproduct = explode('/', $row_detail['giasize']);
        $demmau += 1;
        $giaieproduct = explode('_', $giaieproduct[$demmau]);
        if ($giaieproduct[0] == $idsize) {
    ?>
            <span style="margin-right: 5px;">Giá: </span>
            <?php if ($row_detail['giamoi']) { ?>
                <p class="price" style="margin-bottom: 0;">
                    <ins class="highlight">
                        <?= $func->format_money($giaieproduct[1]) ?>
                    </ins>
                    <input type="hidden" name="giasize" value="<?=$giaieproduct[1]?>">
                </p>
                <del>
                    <ins class="highlight_del">
                        <?= $func->format_money($row_detail['gia']) ?>
                    </ins>
                </del>
            <?php } else { ?>
                <p class="price" style="margin-bottom: 0;">
                    <ins class="highlight">
                        <?= $func->format_money($row_detail['gia']) ?>
                    </ins>
                    <input type="hidden" name="giasize" value="<?=$row_detail['gia']?>">
                </p>
            <?php } ?>
    <?php }
    } ?>
<?php } elseif (empty($idpro) && !empty($idmau)) { ?>
    <span style="margin-right: 5px;">Giá: </span>
    <?php if ($row_detail['giamoi']) { ?>
        <p class="price" style="margin-bottom: 0;">
            <ins class="highlight">
                <?= $func->format_money($row_detail['giamoi']) ?>
            </ins>
            <input type="hidden" name="giasize" value="<?=$row_detail['giamoi']?>">
        </p>
        <del>
            <ins class="highlight_del">
                <?= $func->format_money($row_detail['gia']) ?>
            </ins>
        </del>
    <?php } else { ?>
        <p class="price" style="margin-bottom: 0;">
            <ins class="highlight">
                <?= $func->format_money($row_detail['gia']) ?>
            </ins>
            <input type="hidden" name="giasize" value="<?=$row_detail['gia']?>">
        </p>
    <?php } ?>
<?php } else { ?>
    <span style="margin-right: 5px;">Giá: </span>
    <?php if ($row_detail['giamoi']) { ?>
        <p class="price" style="margin-bottom: 0;">
            <ins class="highlight">
                <?= $func->format_money($row_detail['giamoi']) ?>
            </ins>
            <input type="hidden" name="giasize" value="<?=$row_detail['giamoi']?>">
        </p>
        <del>
            <ins class="highlight_del">
                <?= $func->format_money($row_detail['gia']) ?>
            </ins>
        </del>
    <?php } else { ?>
        <p class="price" style="margin-bottom: 0;">
            <ins class="highlight">
                <?= $func->format_money($row_detail['gia']) ?>
            </ins>
            <input type="hidden" name="giasize" value="<?=$row_detail['gia']?>">
        </p>
    <?php } ?>
<?php } ?>