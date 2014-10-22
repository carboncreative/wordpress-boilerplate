<?php
namespace Carbon;

class ImageSizes
{
    public static function addActionsFilters()
    {
        $img = new self;
        add_action('init', array($img, 'sizes'));
    }

    public function sizes()
    {
        add_image_size('news-thumbnail', 113, 170, false);
    }
}
