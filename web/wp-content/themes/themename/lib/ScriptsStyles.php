<?php
namespace Carbon;

class ScriptsStyles
{
    public $dir;
    public $bower;

    public static function addActionsFilters()
    {
        if (!defined('SITE_VERSION')) {
            define('SITE_VERSION', time());
        }

        $add = new self;

        $add->dir = get_template_directory_uri();
        $add->bower = $add->dir . '/bower_components';

        add_action('wp_enqueue_scripts', array($add, 'scripts'));
        add_action('wp_enqueue_scripts', array($add, 'styles'));
    }

    public function scripts()
    {
        if (!is_admin()) {
            wp_deregister_script('l10n');
            wp_deregister_script('jquery');
            wp_enqueue_script(
                'modernizr',
                $this->dir.'/js/modernizr.js',
                false,
                SITE_VERSION,
                false
            );
            wp_enqueue_script(
                'jquery',
                $this->bower.'/jquery/dist/jquery.min.js',
                false,
                SITE_VERSION,
                true
            );
        }
    }

    public function styles()
    {
        if (!is_admin()) {
            wp_enqueue_style(
                'screen',
                $this->dir.'/css/screen.css',
                false,
                SITE_VERSION
            );
        }
    }
}
