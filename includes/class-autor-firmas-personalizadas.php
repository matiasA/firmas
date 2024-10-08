<?php

class Autor_Firmas_Personalizadas {

    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        $this->plugin_name = 'autor-firmas-personalizadas';
        $this->version = AUTOR_FIRMAS_VERSION;
        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once AUTOR_FIRMAS_PLUGIN_DIR . 'includes/class-autor-firmas-admin.php';
        require_once AUTOR_FIRMAS_PLUGIN_DIR . 'includes/class-autor-firmas-public.php';
    }

    private function set_locale() {
        add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
    }

    public function load_plugin_textdomain() {
        load_plugin_textdomain(
            'autor-firmas-personalizadas',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }

    private function define_admin_hooks() {
        $plugin_admin = new Autor_Firmas_Admin($this->get_plugin_name(), $this->get_version());
        add_action('admin_enqueue_scripts', array($plugin_admin, 'enqueue_styles'));
        add_action('admin_enqueue_scripts', array($plugin_admin, 'enqueue_scripts'));
        add_action('admin_menu', array($plugin_admin, 'add_plugin_admin_menu'));
    }

    private function define_public_hooks() {
        $plugin_public = new Autor_Firmas_Public($this->get_plugin_name(), $this->get_version());
        add_action('wp_enqueue_scripts', array($plugin_public, 'enqueue_styles'));
        add_action('wp_enqueue_scripts', array($plugin_public, 'enqueue_scripts'));
        add_filter('the_content', array($plugin_public, 'add_author_signature'));
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_version() {
        return $this->version;
    }
}