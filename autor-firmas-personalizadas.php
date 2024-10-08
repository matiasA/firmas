<?php
/**
 * Plugin Name: Autor Firmas Personalizadas
 * Plugin URI: https://tudominio.com/autor-firmas-personalizadas
 * Description: Genera firmas personalizadas para autores en WordPress.
 * Version: 1.0.0
 * Author: Tu Nombre
 * Author URI: https://tudominio.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: autor-firmas-personalizadas
 * Domain Path: /languages
 */

// Si este archivo es llamado directamente, abortar.
if (!defined('WPINC')) {
    die;
}

// Definir constantes del plugin
define('AUTOR_FIRMAS_VERSION', '1.0.0');
define('AUTOR_FIRMAS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('AUTOR_FIRMAS_PLUGIN_URL', plugin_dir_url(__FILE__));

// Incluir la clase principal del plugin
require_once AUTOR_FIRMAS_PLUGIN_DIR . 'includes/class-autor-firmas-personalizadas.php';

// Iniciar el plugin
function run_autor_firmas_personalizadas() {
    $plugin = new Autor_Firmas_Personalizadas();
    $plugin->run();
}
run_autor_firmas_personalizadas();