<?php
/*
  Plugin Name: WP Scriptcase
  Plugin URI: http://wordpress.org/extend/plugins/wp-scriptcase/
  Description: Plugin criado para integrar aplicações scriptcase em páginas ou posts no WordPress. Você pode definir os parâmetros largura e altura onde será exibida sua aplicação. Exemplo de uso: [scriptcase width="600" height="300" url="http://www.seudominio.com.br/aplicacao_scriptcase"]
  Version: 2.0.0
  Author: Fábio Collodo Gomes - Softmus IT Solutions
  Author URI: http://wordpress.org/extend/plugins/wp-scriptcase/
  License: GPLv2
 */

/*
  Copyright (c) 2013 Fábio Collodo Gomes.

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

 
// setando a pasta raiz 
$wpsc_base_dir = WP_PLUGIN_URL . '/' . str_replace(basename( __FILE__), "" ,plugin_basename(__FILE__));

// instalando o shortcode
function wp_scriptcase( $atts, $content = null ){

	extract(shortcode_atts(array(
		'url'   => '',
		'scrolling'     => 'no',
		'width'     => '100%',
		'height'    => '500',
		'frameborder'   => '0',
		'marginheight'  => '0',
		'style'  => 'border:0',
	 
	), $atts));
 
	if (empty($url)) return '';
	
	return '<iframe src="'.$url.'" scrolling="'.$scrolling.'" width="'.$width.'" height="'.$height.'" style="'.$style.'" frameborder="'.$frameborder.'" marginheight="'.$marginheight.'">'.$content.'</iframe>';
 
}
add_shortcode('scriptcase', 'wp_scriptcase');

// registrando os botões
function register_button($buttons) {
	array_push($buttons, "|", "wpscriptcase");
	return $buttons;
}

// filtros para condição do botão
function wpscriptcase_button() {
	// verifica permissão
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;
	 
	// Somente modo editor
	if ( get_user_option('rich_editing') == 'true') {
		
		add_filter("mce_external_plugins", "add_plugin");
		add_filter('mce_buttons', 'register_button');
	}
}
// iniciar função
add_action('init', 'wpscriptcase_button');

// adiciona o botão na barra TinyMCE
function add_plugin($plugin_array) {
	global $wpsc_base_dir;
	$plugin_array['wpscriptcase'] = $wpsc_base_dir . 'wpscriptcase.js';
	return $plugin_array;
}
 

?>