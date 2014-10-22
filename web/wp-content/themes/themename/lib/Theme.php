<?php
namespace Carbon;

class Theme
{
    public static function addActionsFilters()
    {
        if (!isset($GLOBALS['content_width'])) {
            $GLOBALS['content_width'] = 584;
        }

        $theme = new self;

        add_action('after_setup_theme', array($theme, 'navigations'));
        add_action('init', array($theme, 'registerShortCodes'));
        add_filter('get_archives_link', array($theme, 'currentArchivesLinks'));
    }

    public function navigations()
    {
        register_nav_menus(array(
            'main-menu' => __( 'Main Navigation'),
            'head-menu' => __( 'Top Links')
        ));
    }

    public function registerShortCodes()
    {
        add_shortcode('intro', function($atts, $content = null) {
            return '<p class="leadingpara"><span>'.$content.'</span></p>';
        });
    }

    /**
     * @see http://wordpress.org/support/topic/wp_get_archives-highlight-current-archive-please
     */
    public function currentArchivesLinks($linkHtml)
    {
        static $currentUrl;
        if (empty($currentUrl)) {
            $currentUrl = add_query_arg($_SERVER['QUERY_STRING'], '', home_url($GLOBALS['wp']->request));
        }
        if (stristr($currentUrl, 'page') !== false ) {
            $currentUrl = substr($currentUrl, 0, strrpos($currentUrl, 'page'));
        }
        if (stristr($linkHtml, $currentUrl) !== false) {
            $linkHtml = preg_replace('/(<[^\s>]+)/', '\1 class="current"', $linkHtml, 1);
        }
        return $linkHtml;
    }
}
