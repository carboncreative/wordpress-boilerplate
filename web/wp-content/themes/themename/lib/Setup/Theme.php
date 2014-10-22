<?php
namespace Carbon\Setup;

class Theme
{
    public static function addActionsFilters()
    {
        if (!isset($GLOBALS['content_width'])) {
            $GLOBALS['content_width'] = 584;
        }

        $theme = new self;
        add_action('after_setup_theme', array($theme, 'setup'));
        add_action('admin_notices', array($theme, 'adminNotice'));
        add_filter('excerpt_length', array($theme, 'excerptLength'));
        add_filter('excerpt_more', array($theme, 'excerptMore'));
    }

    public function setup()
    {
        add_editor_style('editor-style.css');
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
    }

    public function adminNotice()
    {
        if ($GLOBALS['current_screen']->parent_base == 'options-general') {
            echo '<div class="error"><p><strong>Warning &ndash; Changing settings on these pages may cause problems with your website!</strong></p></div>';
        }
    }

    public function excerptLength()
    {
        return 40;
    }

    public function continueReadingLink()
    {
        return ' <a href="'.get_permalink().'">'.__( 'Read more').'</a>';
    }

    public function excerptMore($more)
    {
        return '&hellip; '.$this->continueReadingLink();
    }
}
