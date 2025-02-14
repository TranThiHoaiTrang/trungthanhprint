<?php
include "ajax_config.php";

$kieucach = (isset($_POST['kieucach']) && $_POST['kieucach'] > 0) ? $_POST['kieucach'] : 0;
$giacu = (isset($_POST['giacu']) && $_POST['giacu'] > 0) ? $_POST['giacu'] : 0;

?>
<?php if ($kieucach != 0) { ?>
	<span class="price">
		<del aria-hidden="true">
			<span class="Price-amount amount">
				<bdi><?= $func->format_money($giacu) ?></bdi>
			</span>
		</del>
		<ins>
			<span class="Price-amount amount">
				<bdi><?= $func->format_money($kieucach) ?></bdi>
			</span>
		</ins>
	</span>
<?php } else { ?>
	<span class="price">
		<ins>
			<span class="Price-amount amount">
				<bdi><?= $func->format_money($giacu) ?></bdi>
			</span>
		</ins>
	</span>
<?php } ?>