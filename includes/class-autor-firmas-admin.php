<?php

class Autor_Firmas_Admin {

    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name, AUTOR_FIRMAS_PLUGIN_URL . 'admin/css/autor-firmas-admin.css', array(), $this->version, 'all');
    }

    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_name, AUTOR_FIRMAS_PLUGIN_URL . 'admin/js/autor-firmas-admin.js', array('jquery'), $this->version, false);
    }

    public function add_plugin_admin_menu() {
        add_options_page(
            'Configuración de Firmas de Autor',
            'Firmas de Autor',
            'manage_options',
            $this->plugin_name,
            array($this, 'display_plugin_setup_page')
        );
    }

    public function display_plugin_setup_page() {
        include_once AUTOR_FIRMAS_PLUGIN_DIR . 'admin/partials/autor-firmas-admin-display.php';
    }
}