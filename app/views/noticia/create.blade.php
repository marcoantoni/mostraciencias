@extends('layout')

	@section('titulo')
		Adicionar noticia
	@stop
	
	@section('conteudo')
		<!-- Example row of columns -->
		<script>tinymce.init({selector:'textarea'});</script>
		<script src="{{asset('assets/tinymce/jscripts/tiny_mce/tiny_mce.js') }}"></script>
		<script type="text/javascript">
			tinyMCE.init({
				// General options
				mode : "textareas",
				theme : "advanced",
				plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

				// Theme options
				theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
				theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : true,

				// Example content CSS (should be your site CSS)
				// using false to ensure that the default browser settings are used for best Accessibility
				// ACCESSIBILITY SETTINGS
				content_css : false,
				// Use browser preferred colors for dialogs.
				browser_preferred_colors : true,
				detect_highcontrast : true,

				// Drop lists for link/image/media/template dialogs
				template_external_list_url : "lists/template_list.js",
				external_link_list_url : "lists/link_list.js",
				external_image_list_url : "lists/image_list.js",
				media_external_list_url : "lists/media_list.js",

				// Style formats
				style_formats : [
					{title : 'Bold text', inline : 'b'},
					{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
					{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
					{title : 'Example 1', inline : 'span', classes : 'example1'},
					{title : 'Example 2', inline : 'span', classes : 'example2'},
					{title : 'Table styles'},
					{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
				],

				// Replace values for the template plugin
				template_replace_values : {
					username : "Some User",
					staffid : "991234"
				}
			});
		</script>
		<!-- /TinyMCE -->
		<div class="row">
			<div class="col-md-8">
				{{ Form::open(array('route' => 'noticias.store', 'class' => 'form', 'role' => 'form')) }}
				<!--<form role="form">-->
					<div class="form-group"> 
						<label for="titulo">Titulo</label> 
						<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
					</div>
					<div class="form-group">
						<label for="noticia">Noticia</label> 
						<textarea class="form-control" rows="3" id="texto" name="texto"></textarea>
					</div>
					<div class="form-group">
						<label for="imagem">Imagem</label> 
						<input type="file" class="form-control" style="border: 0px;">
						<label for="descricao">Descrição</label>
						<input type="text" class="form-control" id="alt" placeholder="Descrição da imagem">
					</div>
					<div class="form-group">
						<label for="status">Status da publicação</label>
						<div class="radio"> 
							<label> <input type="radio" name="status" id="status" value="1" checked> Exibir </label> 
							<label> <input type="radio" name="status" id="status" value="0"> Não exibir </label> 
						</div>
					</div>
					<div class="form-group">
						<button type="reset" class="btn btn-warning">Limpar</button>
						<button type="submit" class="btn btn-info">Salvar</button>
					</div>
				
				</form>
			</div>
		</div>
	@stop
	
