$(function () {

	const mceElf = new tinymceElfinder({
		url: ADMIN_URL + 'elFinder/php/elfinder_config.php',
		uploadTargetHash: 'l1_Lw', // Hash value on elFinder of writable folder
		nodeId: 'elfinder' // Any ID you decide
	});

	// init tinyMCE 5
	tinymce.init({
		selector: "textarea.ckeditor",
		referrer_policy: 'origin',
		content_css_cors: true,
		entity_encoding : 'raw',
		setup: function (editor) {
			editor.on('change', function () {
				tinymce.triggerSave();
			});

			editor.ui.registry.addButton('elfinder_images', {
				icon: 'gallery',
				tooltip: 'elFinder gallery',
				disabled: false,
				onAction: function (_) {

					let elfNode = $('<div/>');
					elfNode.dialogelfinder({
						title : 'File Manager',
						width : '85%',
						height : '90%',
						url: ADMIN_URL + 'elFinder/php/elfinder_config.php',
						commandsOptions: {
							getfile: { multiple: true }
						},
						getFileCallback: (files, fm) => {
							let gallery = '';
							let urls = $.map(files, function(f) { return f.url; });
							if ( urls ) {

								let _rand = btoa(Math.random().toString()).substring(10, 14);
								gallery += '<div class="alfinder-gallery gallery" id="gallery-' + _rand + '">';

								$.each(urls, function(index, item) {
									gallery += '<figure class="gallery-item"><img src="' + item + '" alt></figure>';
								});

								gallery += '</div>';

								editor.insertContent(gallery);
							}

							elfNode.dialogelfinder('close');
						},
						// themes: {
						// 	'mt-light': 'https://robinn1.github.io/elFinder-Material-Theme/manifests/light.json',
						// 	'mt-gray': 'https://robinn1.github.io/elFinder-Material-Theme/manifests/gray.json',
						// 	'mt-darkblue': 'https://robinn1.github.io/elFinder-Material-Theme/manifests/darkblue.json',
						// },
						// theme: 'mt-light',
					});
				}
			});
		},

		plugins: [
			"advlist anchor autolink autoresize autosave image link media charmap",
			"code codesample directionality emoticons",
			"fullscreen help hr importcss insertdatetime",
			"link lists nonbreaking noneditable pagebreak paste",
			"preview media print quickbars save searchreplace tabfocus table",
			"template textpattern visualblocks visualchars wordcount"
		],

		toolbar: [
			//"formatselect fontsizeselect bold italic underline strikethrough blockquote bullist numlist alignjustify alignleft aligncenter alignright link unlink fullscreen",
			"formatselect bold italic underline strikethrough blockquote bullist numlist | align lineheight indent outdent | link unlink fullscreen",
			"removeformat searchreplace emoticons charmap | forecolor backcolor hr superscript subscript table | media image elfinder_images visualchars code codesample help"
		],

		codesample_languages: [
			{text: 'HTML/XML', value: 'markup'},
			{text: 'JavaScript', value: 'javascript'},
			{text: 'CSS', value: 'css'},
			{text: 'PHP', value: 'php'},
			{text: 'Ruby', value: 'ruby'},
			{text: 'Python', value: 'python'},
			{text: 'Java', value: 'java'},
			{text: 'C', value: 'c'},
			{text: 'C#', value: 'csharp'},
			{text: 'C++', value: 'cpp'}
		],

		fontsize_formats: "13px 14px 15px 16px 18px 20px 24px 30px 32px 36px 40px 45px",
		block_formats: 'Paragraph=p;H1=h1;H2=h2;H3=h3;H4=h4;H5=h5;H6=h6;Preformatted=pre;Div=div;',
		quickbars_insert_toolbar: false,
		quickbars_selection_toolbar: "bold italic quicklink unlink removeformat align forecolor table media image quickimage",
		help_tabs: ['shortcuts'],
		browser_spellcheck : true,
		relative_urls : false,
		remove_script_host: false,
		menubar: false,
		min_height: 200,
		//max_height: 800,
		toolbar_sticky: true,
		image_advtab: true,
		image_caption: true,

		// visualblocks_default_state: true,
		content_style: ".mce-content-body {font-size: 16px;} .mce-content-body h1 {font-size: 38px;} .mce-content-body h2 {font-size: 31px;} .mce-content-body h3 {font-size: 25px;} .mce-content-body h4 {font-size: 21px;} .mce-content-body h5 {font-size: 18px;} .mce-content-body h6 {font-size: 16px;} img {max-width: 100%;} .alfinder-gallery {margin: -10px;} .alfinder-gallery .gallery-item {padding: 5px;display: inline-block;} .alfinder-gallery .gallery-item img {display: block;max-width: 800px;object-position: center;object-fit: cover;}",
		convert_urls: false,
		forced_root_block : 'p',

		// End container block element when pressing enter inside an empty block
		end_container_on_empty_block: true,

		formats: {
			aligncenter: {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'aligncenter', styles: { marginLeft: 'auto', marginRight: 'auto', display: 'block' }},
		},

		// elFinder
		file_picker_callback : mceElf.browser,
		images_upload_handler: mceElf.uploadHandler,
	});

	// init tinyMCE 5 minimal
	tinymce.init({
		selector: "textarea.mce-minimal",
		referrer_policy: 'origin',
		content_css_cors: true,
		entity_encoding : 'raw',
		setup: function (editor) {
			editor.on('change', function () {
				tinymce.triggerSave();
			});
		},

		plugins: [
			"advlist anchor autolink autoresize autosave image charmap",
			"code codesample directionality emoticons",
			"fullscreen help hr importcss insertdatetime",
			"link lists nonbreaking noneditable pagebreak paste",
			"preview media print quickbars save searchreplace tabfocus table",
			"template textpattern visualblocks visualchars wordcount"
		],

		toolbar: [
			"formatselect bold italic underline strikethrough bullist numlist align | link unlink | table image forecolor backcolor fullscreen"
		],

		block_formats: 'Paragraph=p;H1=h1;H2=h2;H3=h3;H4=h4;H5=h5;H6=h6;Preformatted=pre;Div=div;',
		quickbars_insert_toolbar: false,
		quickbars_selection_toolbar: "bold italic quicklink unlink removeformat align forecolor table media image",
		help_tabs: ['shortcuts'],
		browser_spellcheck : true,
		relative_urls : false,
		remove_script_host: false,
		menubar: false,
		min_height: 150,
		toolbar_sticky: true,

		// visual blocks_default_state: true,
		content_style: ".mce-content-body {font-size: 16px;} .mce-content-body h1 {font-size: 38px;} .mce-content-body h2 {font-size: 31px;} .mce-content-body h3 {font-size: 25px;} .mce-content-body h4 {font-size: 21px;} .mce-content-body h5 {font-size: 18px;} .mce-content-body h6 {font-size: 16px;} img {max-width: 100%;}",
		convert_urls: false,
		forced_root_block : 'p',

		// End container block element when pressing enter inside an empty block
		end_container_on_empty_block: true,

		formats: {
			aligncenter: {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'aligncenter', styles: { marginLeft: 'auto', marginRight: 'auto', display: 'block' }},
		},

		// elFinder
		file_picker_callback : mceElf.browser,
		images_upload_handler: mceElf.uploadHandler,
	});
});
