<?php
/**
 *  Homepage
 */

$page_id = get_option('page_on_front');

get_header(); ?>

<main class="main">

    <section class="content" role="main">
        <h2 class="page-title"><?php echo apply_filters('the_title', get_the_title($page_id)); ?></h2>

        <?php echo apply_filters('the_content', get_the_content($page_id)); ?>
    </section>

    <aside class="sidebar" role="complementary">
        <?php get_sidebar(); ?>
    </aside>

</main>

<?php get_footer(); ?>
