<?php
/**
 * @link              https://github.com/franj1748/complemento-de-modificacion-para-fancy-product-designer.git
 * @since             1.0.0
 * @package           complemento-de-modificación
 *
 * @wordpress-plugin
 * Plugin Name:       Complemento de modificación
 * Plugin URI:        https://github.com/franj1748/complemento-de-modificacion-para-fancy-product-designer.git
 * Description:       Este completo personalizado permitirá hacer modificaciones específicas en la app web sin manipular los archivos del Core del WordPress.   
 * Version:           1.0.0
 * Author:            Francisco Elis
 * Author URI:        https://www.linkedin.com/in/francisco-elis-24506b209
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       complemento-de-modificacion
 */
// Si este archivo se llama directamente por cualquier otra instancia que no sea WordPress, abortar.
if (!defined('WPINC')){
	die;
}

/**
 * Definición de las constantes para la versión del plugin y
 * para obtener la ruta completa del plugin.
 */
define( 'CDM_VERSION', '1.0.0' );
define('MODIFICACION_RUTA', plugin_dir_path(__FILE__));

/**
  * El código que se ejecuta durante la activación del complemento.
  * Esta acción está documentada en includes/class-complemento-de-modificacion-activator.php
*/
function activate_complemento_de_modificacion(){
	require_once MODIFICACION_RUTA.'includes/class-complemento-de-modificacion-activator.php';
}

/**
  * El código que se ejecuta durante la desactivación del complemento.
  * Esta acción está documentada en includes/class-complemento-de-modificacion-deactivator.php
*/
function deactivate_complemento_de_modificacion(){
	require_once MODIFICACION_RUTA.'includes/class-complemento-de-modificacion-deactivator.php';
}

register_activation_hook( __FILE__, 'activate_complemento_de_modificacion');
register_deactivation_hook( __FILE__, 'deactivate_complemento_de_modificacion');

/**
  * Agregar elemento del plugin en el sub_menu de Ajustes
  * del panel de administración de WordPress.
*/
function add_options_modificacion(){
	add_options_page(
		'Modificaciones - Hagamos Marcas',
		'Complemento de Modificación', 
		'manage_options', 
		'complementodemodificacion', 
		'complemento_modificacion_opciones'
	);
}

add_action('admin_menu', 'add_options_modificacion');

// Llama al archivo que contiene la página de opciones. 
function complemento_modificacion_opciones(){	
	require_once MODIFICACION_RUTA.'admin/partials/complemento-de-modificacion-admin-display.php';
}

/**
 * Comienza la ejecución del complemento.
 * Dado que todo dentro del complemento se registra mediante ganchos,
 * luego, al iniciar el complemento desde este punto en el archivo,
 * no afecta el ciclo de vida de la página.
 *
 * @since    1.0.0
*/


/* Incrustar el script necesario para la modificación de los elementos del front*/
function add_script_wp_footer(){
    wp_enqueue_script('js-admin-modificacion', plugins_url('public/js/cdm-all.js', __FILE__));
}
add_action('wp_footer', 'add_script_wp_footer');


/* Incrustar los estilos necesarios al panel de administración (back-end) */
add_action('admin_enqueue_scripts', 'estilos_complemento_de_modificacion_admin_back');
function estilos_complemento_de_modificacion_admin_back(){
    wp_enqueue_style('style-admin-modificacion-back', plugins_url('admin/css/complemento-de-modificacion-admin.css', __FILE__));
}

/* Incrustar los estilos necesarios al panel de administración (front-end) */
add_action('admin_enqueue_scripts', 'estilos_complemento_de_modificacion_public_front');
function estilos_complemento_de_modificacion_public_front(){
    wp_enqueue_style('style-public-modificacion-front', plugins_url('public/css/complemento-de-modificacion-public.css', __FILE__));
}

/* Incrustar los estilos necesarios al front de la app web */
add_action('wp_enqueue_scripts', 'estilos_complemento_de_modificacion_app_front');
function estilos_complemento_de_modificacion_app_front(){
    wp_enqueue_style( 'style-public-modificacion-app-front', plugins_url('public/css/cdm-front-style.css', __FILE__));
}

/* Incluir cdn de fontawesome */
function add_cdn_fontawesome(){
	wp_enqueue_style( 'fontawesome_css', 
  					'https://use.fontawesome.com/releases/v5.15.3/css/all.css', 
  					array(), 
  					'5.15.3'
  	); 
}
add_action('admin_head', 'add_cdn_fontawesome');

