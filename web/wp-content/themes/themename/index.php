<?php
/**
 *  Blog
 */

$page_id = get_option('page_for_posts');

get_header(); ?>

<main class="main">

    <section class="content" role="main">
        <?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<p class="breadcrumbs">','</p>'); } ?>

        <h1 class="page-title"><?php echo (isset($page_id)) ? apply_filters('the_title', get_the_title($page_id)) : 'News'; ?></h1>

        <?php get_template_part('loop'); ?>
    </section>

    <aside class="sidebar" role="complementary">
        <?php get_sidebar(); ?>
    </aside>

</main>

<?php get_footer(); ?>
