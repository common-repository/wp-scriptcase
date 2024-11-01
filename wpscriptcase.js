(function() {
	tinymce.create('tinymce.plugins.buttonPlugin', {
		init : function(ed, url) {
			// Registro comandos
			ed.addCommand('mcebutton', function() {
				ed.windowManager.open({
					file : url + '/wpscriptcase_popup.php', // file that contains HTML for our modal window
					width : 350 + parseInt(ed.getLang('button.delta_width', 0)), // size of our window
					height : 240 + parseInt(ed.getLang('button.delta_height', 0)), // size of our window
					inline : 1
				}, {
					plugin_url : url
				});
			});
			 
			// Registro botões
			ed.addButton('wpscriptcase', {title : 'Inserir Aplicação Scriptcase', cmd : 'mcebutton', image: url + '/includes/images/wpscriptcase.png' });
		},
		 
		getInfo : function() {
			return {
				longname : 'WP-Scriptcase By Softmus It Solution',
				author : 'Fábio - Softmus It Solution',
				authorurl : 'http://wordpress.org/plugins/wp-scriptcase/',
				infourl : 'http://wordpress.org/plugins/wp-scriptcase/',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});
	 
	// Register plugin
	// primeiro parametro ID do botão
	tinymce.PluginManager.add('wpscriptcase', tinymce.plugins.buttonPlugin);

})();