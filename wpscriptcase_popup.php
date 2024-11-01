<?php
//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>WP- Scriptcase</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
<script language="javascript" type="text/javascript" src="../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<style type="text/css" src="../../../wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css"></style>
<link rel="stylesheet" href="includes/css/wpscriptcase.css" />

<script type="text/javascript">
 
var ButtonDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Remove os stilos existentes
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// variáveis dos inputs
		var url = jQuery('#button-dialog input#button-url').val();
		var width = jQuery('#button-dialog input#button-width').val();
		var heigth = jQuery('#button-dialog input#button-heigth').val(); 
		 
		var output = '';
		
		
		output = '[scriptcase ';
			output += 'url=' + url + ' ';
			output += 'width=' + width + ' ';
			output += 'heigth=' + heigth  + ' ';
			output += ']';
			
			
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
 
</script>

</head>
<body>
	<div id="button-dialog">
    <img src="includes/images/banner_wp-scriptcase.png" alt="" width="221" height="72" /><br />
    <br />
<form action="/" method="get" accept-charset="utf-8">
		  <div>
				<label for="button-url">Url da Aplicação</label>
				<input type="text" name="button-url" value="http://" id="button-url" />
	</div>
			<div>
				<label for="button-width">Largura (px) </label>
				<input type="text" name="button-width" value="" id="button-width" />
			</div>
            <div>
				<label for="button-heigth">Altura (px) </label>
				<input type="text" name="button-heigth" value="" id="button-heigth" />
			</div>
			
			<div>	
				<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Inserir</a>
			</div>
	  </form>
</div>
</body>
</html>