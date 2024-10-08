<?php

class Autor_Firmas_Public {

    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name, AUTOR_FIRMAS_PLUGIN_URL . 'public/css/autor-firmas-public.css', array(), $this->version, 'all');
    }

    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_name, AUTOR_FIRMAS_PLUGIN_URL . 'public/js/autor-firmas-public.js', array('jquery'), $this->version, false);
    }

    public function add_author_signature($content) {
        if (is_single()) {
            $author_id = get_the_author_meta('ID');
            $signature = get_user_meta($author_id, 'author_signature', true);
            if (!empty($signature)) {
                $content .= '<div class="author-signature">' . wpautop($signature) . '</div>';
            }
        }
        return $content;
    }
}