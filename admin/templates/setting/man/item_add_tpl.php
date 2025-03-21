<?php
	$linkSave = "index.php?com=setting&act=save";
	$options = (isset($item['options']) && $item['options'] != '') ? json_decode($item['options'],true) : null;
?>
<!-- Content Header -->
<section class="content-header text-sm">
	<div class="container-fluid">
		<div class="row">
			<ol class="breadcrumb float-sm-left">
				<li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
				<li class="breadcrumb-item active">Thông tin công ty</li>
			</ol>
		</div>
	</div>
</section>

<!-- Main content -->
<section class="content">
	<form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
		<div class="card-footer text-sm sticky-top">
			<button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
			<button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
		</div>
		<?php if(isset($config['website']['debug-developer']) && $config['website']['debug-developer'] == true) { ?>
			<div class="card card-primary card-outline text-sm">
				<div class="card-header">
					<h3 class="card-title">Cấu hình mailer</h3>
				</div>
				<div class="card-body">
					<div class="form-group">
						<div class="custom-control custom-radio d-inline-block mr-3 text-md">
							<input class="custom-control-input mailertype" type="radio" id="mailertype-host" name="data[options][mailertype]" <?=($options['mailertype']==1 || $options['mailertype']==0)?"checked":""?> value="1">
							<label for="mailertype-host" class="custom-control-label font-weight-normal">Host email</label>
						</div>
						<div class="custom-control custom-radio d-inline-block mr-3 text-md">
							<input class="custom-control-input mailertype" type="radio" id="mailertype-gmail" name="data[options][mailertype]" <?=($options['mailertype']==2)?"checked":""?> value="2">
							<label for="mailertype-gmail" class="custom-control-label font-weight-normal">Gmail email</label>
						</div>
					</div>
					<div class="host-email <?=($options['mailertype']==1 || $options['mailertype']==0)?'d-block':'d-none'?>">
						<div class="row">
							<div class="form-group col-md-4 col-sm-6">
								<label for="ip_host">Host:</label>
								<input type="text" class="form-control" name="data[options][ip_host]" id="ip_host" placeholder="Host" value="<?=$options['ip_host']?>">
							</div>
							<div class="form-group col-md-4 col-sm-6">
								<label for="port_host">Port:</label>
								<input type="text" class="form-control" name="data[options][port_host]" id="port_host" placeholder="Port" value="<?=$options['port_host']?>">
							</div>
							<div class="form-group col-md-4 col-sm-6">
								<label for="secure_host">Secure:</label>
								<select class="form-control" name="data[options][secure_host]" id="secure_host">
									<option <?=($options['secure_host']=='tls')?'selected':''?> value="tls">TLS</option>
									<option <?=($options['secure_host']=='ssl')?'selected':''?> value="ssl">SSL</option>
								</select>
							</div>
							<div class="form-group col-md-4 col-sm-6">
								<label for="email_host">Email host:</label>
								<input type="text" class="form-control" name="data[options][email_host]" id="email_host" placeholder="Email host" value="<?=$options['email_host']?>">
							</div>
							<div class="form-group col-md-4 col-sm-6">
								<label for="password_host">Password host:</label>
								<input type="text" class="form-control" name="data[options][password_host]" id="password_host" placeholder="Password host" value="<?=$options['password_host']?>">
							</div>
						</div>
					</div>
					<div class="gmail-email <?=($options['mailertype']==2)?'d-block':'d-none'?>">
						<div class="row">
							<div class="form-group col-md-4 col-sm-6">
								<label for="host_gmail">Host:</label>
								<input type="text" class="form-control" name="data[options][host_gmail]" id="host_gmail" placeholder="Host" value="<?=$options['host_gmail']?>">
							</div>
							<div class="form-group col-md-4 col-sm-6">
								<label for="port_gmail">Port:</label>
								<input type="text" class="form-control" name="data[options][port_gmail]" id="port_gmail" placeholder="Port" value="<?=$options['port_gmail']?>">
							</div>
							<div class="form-group col-md-4 col-sm-6">
								<label for="secure_gmail">Secure:</label>
								<select class="form-control" name="data[options][secure_gmail]" id="secure_gmail">
									<option <?=($options['secure_gmail']=='tls')?'selected':''?> value="tls">TLS</option>
									<option <?=($options['secure_gmail']=='ssl')?'selected':''?> value="ssl">SSL</option>
								</select>
							</div>
							<div class="form-group col-md-4 col-sm-6">
								<label for="email_gmail">Email:</label>
								<input type="text" class="form-control" name="data[options][email_gmail]" id="email_gmail" placeholder="Email" value="<?=$options['email_gmail']?>">
							</div>
							<div class="form-group col-md-4 col-sm-6">
								<label for="password_gmail">Password:</label>
								<input type="text" class="form-control" name="data[options][password_gmail]" id="password_gmail" placeholder="Password" value="<?=$options['password_gmail']?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="card card-primary card-outline text-sm">
			<div class="card-header">
				<h3 class="card-title">Thông tin chung</h3>
			</div>
			<div class="card-body">
				<?php if(count($config['website']['lang']) > 1) { ?>
					<div class="form-group">
						<label>Ngôn ngữ mặc định:</label>
						<div class="form-group">
							<?php foreach($config['website']['lang'] as $k => $v) { ?>
								<div class="custom-control custom-radio d-inline-block mr-3 text-md">
									<input class="custom-control-input" type="radio" id="lang_default-<?=$k?>" name="data[options][lang_default]" <?=($k=='vi')?"checked":($k==$options['lang_default'])?"checked":""?> value="<?=$k?>">
									<label for="lang_default-<?=$k?>" class="custom-control-label font-weight-normal"><?=$v?></label>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				<div class="row">
					<?php if(isset($config['setting']['tentoanha']) && $config['setting']['tentoanha'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="tentoanha">Tên tòa nhà:</label>
							<input type="text" class="form-control" name="data[options][tentoanha]" id="tentoanha" placeholder="Tên tòa nhà" value="<?=$options['tentoanha']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['diachi']) && $config['setting']['diachi'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="diachi">Địa chỉ:</label>
							<input type="text" class="form-control" name="data[options][diachi]" id="diachi" placeholder="Địa chỉ" value="<?=$options['diachi']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['diachi2']) && $config['setting']['diachi2'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="diachi2">Địa chỉ 2:</label>
							<input type="text" class="form-control" name="data[options][diachi2]" id="diachi2" placeholder="Địa chỉ 2" value="<?=$options['diachi2']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['diachi3']) && $config['setting']['diachi3'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="diachi3">Địa chỉ 3:</label>
							<input type="text" class="form-control" name="data[options][diachi3]" id="diachi3" placeholder="Địa chỉ 3" value="<?=$options['diachi3']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['email']) && $config['setting']['email'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="email">Email:</label>
							<input type="email" class="form-control" name="data[options][email]" id="email" placeholder="Email" value="<?=$options['email']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['email2']) && $config['setting']['email2'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="email2">Email2:</label>
							<input type="email2" class="form-control" name="data[options][email2]" id="email2" placeholder="Email2" value="<?=$options['email2']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['hotline']) && $config['setting']['hotline'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="hotline">Hotline:</label>
							<input type="text" class="form-control" name="data[options][hotline]" id="hotline" placeholder="Hotline" value="<?=$options['hotline']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['dienthoai']) && $config['setting']['dienthoai'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="dienthoai">Điện thoại:</label>
							<input type="text" class="form-control" name="data[options][dienthoai]" id="dienthoai" placeholder="Điện thoại" value="<?=$options['dienthoai']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['dienthoai_nv']) && $config['setting']['dienthoai_nv'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="dienthoai_nv">Điện thoại 2:</label>
							<input type="text" class="form-control" name="data[options][dienthoai_nv]" id="dienthoai_nv" placeholder="Điện thoại 2" value="<?=$options['dienthoai_nv']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['zalo']) && $config['setting']['zalo'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="zalo">Zalo:</label>
							<input type="text" class="form-control" name="data[options][zalo]" id="zalo" placeholder="Zalo" value="<?=$options['zalo']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['oaidzalo']) && $config['setting']['oaidzalo'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="oaidzalo">OAID Zalo:</label>
							<input type="text" class="form-control" name="data[options][oaidzalo]" id="oaidzalo" placeholder="OAID Zalo" value="<?=$options['oaidzalo']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['website']) && $config['setting']['website'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="website">Website:</label>
							<input type="text" class="form-control" name="data[options][website]" id="website" placeholder="Website" value="<?=$options['website']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['fanpage']) && $config['setting']['fanpage'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="fanpage">Fanpage:</label>
							<input type="text" class="form-control" name="data[options][fanpage]" id="fanpage" placeholder="Fanpage" value="<?=$options['fanpage']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['copyright']) && $config['setting']['copyright'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="copyright">Copyright:</label>
							<input type="text" class="form-control" name="data[options][copyright]" id="copyright" placeholder="Copyright" value="<?=$options['copyright']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['toado']) && $config['setting']['toado'] == true) { ?>
						<div class="form-group col-md-4 col-sm-6">
							<label for="toado">Link google map:</label>
							<input type="text" class="form-control" name="data[options][toado]" id="toado" placeholder="Link google map" value="<?=$options['toado']?>">
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['slogan']) && $config['setting']['slogan'] == true) { ?>
						<div class="form-group col-md-12 col-sm-12">
							<label for="slogan">Slogan:</label>
							<textarea class="form-control ckeditor" name="data[options][slogan]" id="slogan" rows="5" placeholder="Câu slogan"><?=htmlspecialchars_decode($options['slogan'])?></textarea>
							<!-- <input type="text" class="form-control" name="data[options][slogan]" id="slogan" placeholder="Câu slogan" value="<?=$options['slogan']?>"> -->
						</div>
					<?php } ?>
					<?php if(isset($config['setting']['tg_hoatdong']) && $config['setting']['tg_hoatdong'] == true) { ?>
						<div class="form-group col-md-12 col-sm-12">
							<label for="tg_hoatdong">Thời gian hoạt động:</label>
							<input type="text" class="form-control" name="data[options][tg_hoatdong]" id="tg_hoatdong" placeholder="Thời gian hoạt động" value="<?=$options['tg_hoatdong']?>">
						</div>
					<?php } ?>
				</div>
				<?php if(isset($config['setting']['toado_iframe']) && $config['setting']['toado_iframe'] == true) { ?>
					<div class="form-group">
						<label for="toado_iframe">
							<span>Tọa độ google map iframe:</span>
							<a class="text-sm font-weight-normal ml-1" href="https://www.google.com/maps" target="_blank" title="Lấy mã nhúng google map">(Lấy mã nhúng)</a>
						</label>
						<textarea class="form-control" name="data[options][toado_iframe]" id="toado_iframe" rows="5" placeholder="Tọa độ google map iframe"><?=htmlspecialchars_decode($options['toado_iframe'])?></textarea>
					</div>
				<?php } ?>
				<div class="form-group">
					<label for="analytics">Google analytics:</label>
					<textarea class="form-control" name="data[analytics]" id="analytics" rows="5" placeholder="Google analytics"><?=htmlspecialchars_decode(@$item['analytics'])?></textarea>
				</div>
				<div class="form-group">
					<label for="mastertool">Google Webmaster Tool:</label>
					<textarea class="form-control" name="data[mastertool]" id="mastertool" rows="5" placeholder="Google Webmaster Tool"><?=htmlspecialchars_decode(@$item['mastertool'])?></textarea>
				</div>
				<div class="form-group">
					<label for="headjs">Head JS:</label>
					<textarea class="form-control" name="data[headjs]" id="headjs" rows="5" placeholder="Head JS"><?=htmlspecialchars_decode(@$item['headjs'])?></textarea>
				</div>
				<div class="form-group">
					<label for="bodyjs">Body JS:</label>
					<textarea class="form-control" name="data[bodyjs]" id="bodyjs" rows="5" placeholder="Body JS"><?=htmlspecialchars_decode(@$item['bodyjs'])?></textarea>
				</div>
				<div class="form-group">
					<label for="schema">Schema:</label>
					<textarea class="form-control" name="data[schema]" id="schema" rows="5" placeholder="Schema"><?=htmlspecialchars_decode(@$item['schema'])?></textarea>
				</div>
				<div class="card card-primary card-outline card-outline-tabs">
					<div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
							<?php foreach($config['website']['lang'] as $k => $v) { ?>
                                <li class="nav-item">
									<a class="nav-link <?=($k=='vi')?'active':''?>" id="tabs-lang" data-toggle="pill" href="#tabs-lang-<?=$k?>" role="tab" aria-controls="tabs-lang-<?=$k?>" aria-selected="true"><?=$v?></a>
								</li>
                            <?php } ?>
						</ul>
					</div>
					<div class="card-body card-article">
						<div class="tab-content" id="custom-tabs-three-tabContent-lang">
							<?php foreach($config['website']['lang'] as $k => $v) { ?>
								<div class="tab-pane fade show <?=($k=='vi')?'active':''?>" id="tabs-lang-<?=$k?>" role="tabpanel" aria-labelledby="tabs-lang">
									<div class="form-group">
										<label for="ten<?=$k?>">Tiêu đề (<?=$k?>):</label>
										<input type="text" class="form-control for-seo" name="data[ten<?=$k?>]" id="ten<?=$k?>" placeholder="Tiêu đề (<?=$k?>)" value="<?=@$item['ten'.$k]?>" <?=($k=='vi')?'required':''?>>
									</div>
								</div>
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	    <div class="card card-primary card-outline text-sm">
	        <div class="card-header">
	            <h3 class="card-title">Nội dung SEO</h3>
	            <a class="btn btn-sm bg-gradient-success d-inline-block text-white float-right create-seo" title="Tạo SEO">Tạo SEO</a>
	        </div>
	        <div class="card-body">
	            <?php
	                $seoDB = $seo->getSeoDB(0,$com,'capnhat',$com);
	                include LAYOUT_PATH."seo.php";
	            ?>
	        </div>
	    </div>
		<div class="card-footer text-sm">
			<button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
			<button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
			<input type="hidden" name="id" value="<?=@$item['id']?>">
		</div>
	</form>
</section>

<!-- Setting js -->
<script type="text/javascript">
	$(document).ready(function(){
		$(".mailertype").click(function(){
			var value = parseInt($(this).val());

			if(value == 1)
			{
				$(".host-email").removeClass("d-none");
				$(".host-email").addClass("d-block");
				$(".gmail-email").removeClass("d-block");
				$(".gmail-email").addClass("d-none");
			}
			if(value == 2)
			{
				$(".gmail-email").removeClass("d-none");
				$(".gmail-email").addClass("d-block");
				$(".host-email").removeClass("d-block");
				$(".host-email").addClass("d-none");
			}
		})
	})
</script>