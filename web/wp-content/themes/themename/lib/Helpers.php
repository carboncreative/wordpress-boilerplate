<?php
namespace Carbon;

class Helpers
{
    public static function excerpt($length = 55, $moreText = '…')
    {
        $change_excerpt_length = function($old_length) use ($length) {
            return $length;
        };
        $change_excerpt_more = function($old_more_text) use ($moreText) {
            return $more_text;
        };
        add_filter('excerpt_length', $change_excerpt_length, 10);
        add_filter('excerpt_more', $change_excerpt_more, 10);
        $excerpt = get_the_excerpt();
        remove_filter('excerpt_length', $change_excerpt_length);
        remove_filter('excerpt_more', $change_excerpt_more);

        return $excerpt;
    }
}
