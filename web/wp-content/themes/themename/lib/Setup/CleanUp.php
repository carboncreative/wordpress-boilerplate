<?php
namespace Carbon\Setup;

class CleanUp
{
    public static function addActionsFilters()
    {
        $clean = new self;

        add_action('init', array($clean, 'wpHeader'));

        add_filter('body_class', array($clean, 'bodyClasses'), 10, 2);

        add_filter('nav_menu_css_class', array($clean, 'wpMenu'), 100, 1);
        add_filter('nav_menu_item_id', array($clean, 'wpMenu'), 100, 1);
        add_filter('page_css_class', array($clean, 'wpMenu'), 100, 1);

        add_filter('post_class', array($clean, 'postClass'), 10, 2);

        add_action('widgets_init', array($clean, 'commentsStyle'));

        add_filter('wp_nav_menu_args', array($clean, 'navMenuId'));

        add_filter('post_thumbnail_html', array($clean, 'widthHeightAttr'), 10);
        add_filter('image_send_to_editor', array($clean, 'widthHeightAttr'), 10);
    }

    public function wpHeader()
    {
        if (!is_admin()) {
            remove_action('wp_head', 'rsd_link');
            remove_action('wp_head', 'wp_generator');
            remove_action('wp_head', 'feed_links', 2);
            remove_action('wp_head', 'index_rel_link');
            remove_action('wp_head', 'wlwmanifest_link');
            remove_action('wp_head', 'feed_links_extra', 3);
            remove_action('wp_head', 'start_post_rel_link', 10, 0);
            remove_action('wp_head', 'parent_post_rel_link', 10, 0);
            remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
        }
    }

    public function bodyClasses($classes, $extraClasses)
    {
        $allowedClasses = array('home');
        $classes = array_intersect($classes, $allowedClasses);
        $classes = array_merge($classes, (array) $extraClasses);
        return $classes;
    }

    public function wpMenu($classes)
    {
        $classes = str_replace(array('_'), array('-'), $classes);
        $allowedClasses = array(
            'current-page-item',
            'current-page-ancestor'
        );
        return is_array($classes) ? array_intersect($classes, $allowedClasses) : '';
    }

    public function postClass($classes, $extraClasses)
    {
        $allowedClasses = array('post');
        $classes = array_intersect($classes, $allowedClasses);
        return is_array($classes) ? array_merge($classes, (array) $extraClasses) : '';
    }

    public function commentsStyle()
    {
        $action = array(
            $GLOBALS['wp_widget_factory']->widgets['WP_Widget_Recent_Comments'],
            'recent_comments_style'
        );
        remove_action('wp_head', $action);
    }

    public function navMenuId($args)
    {
        $args['items_wrap'] = '<ul>%3$s</ul>';
        return $args;
    }

    public function widthHeightAttr($html)
    {
        $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
        return $html;
    }
}
