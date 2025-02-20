<?php if (isset($popup) && $popup['hienthi'] == 1) { ?>
	<!-- Modal popup -->
	<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title" id="popupModalLabel"><?= $popup['ten' . $lang] ?></div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<a href="<?= $popup['link'] ?>"><img src="<?= THUMBS ?>/800x530x1/<?= UPLOAD_PHOTO_L . $popup['photo'] ?>" alt="Popup"></a>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<!-- Modal notify -->
<div class="modal modal-custom fade" id="popup-notify" tabindex="-1" role="dialog" aria-labelledby="popup-notify-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" id="popup-notify-label"><?= thongbao ?></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-notify" data-dismiss="modal"><?= thoat ?></button>
			</div>
		</div>
	</div>
</div>

<!-- Modal cart -->
<div class="modal fade" id="popup-cart" tabindex="-1" role="dialog" aria-labelledby="popup-cart-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" id="popup-cart-label"><?= giohangcuaban ?></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"></div>
		</div>
	</div>
</div>


<!-- RATING -->
<div class="modal fade" id="rating" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title" id="exampleModalLongTitle">RATING</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-rating" novalidate method="post" action="" enctype="multipart/form-data">
					<input type="hidden" name="id_product" value="<?= $row_detail['id'] ?>">
					<input type="hidden" name="start" class="start" value="0">
					<div class="rating-system">
						<div>Đánh giá</div>
						<div class="rating--inner ">
							<div class="rating">
								<ul>
									<li data-star="5"><i class="fal fa-star"></i></li>
									<li data-star="4"><i class="fal fa-star"></i></li>
									<li data-star="3"><i class="fal fa-star"></i></li>
									<li data-star="2"><i class="fal fa-star"></i></li>
									<li data-star="1"><i class="fal fa-star"></i></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="input-contact">
						<span><?= hoten ?></span>
						<input type="text" class="form-control" name="ten" placeholder="<?= hoten ?>" required />
					</div>
					<div class="input-contact">
						<span><?= noidung ?></span>
						<textarea class="form-control" name="noidung" placeholder="<?= noidung ?>" /></textarea>
					</div>
					<div class="button_submit_rating">
						<input type="submit" name="submit_rating" class="submit_rating" value="Gửi đánh giá">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>