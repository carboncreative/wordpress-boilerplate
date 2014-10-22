<?php
/**
 *  Archive
 */
get_header(); ?>

<main class="main">

    <section class="content" role="main">
        <?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<p class="breadcrumbs">','</p>'); } ?>

        <h1 class="page-title">
        <?php
            if(is_day()) {
                printf('Daily Archives: %s', get_the_date());
            } elseif(is_month()) {
                printf('Monthly Archives: %s', get_the_date('F Y'));
            } elseif(is_year()) {
                printf('Yearly Archives: %s', get_the_date('Y'));
            } else {
                echo 'Archive';
            }
        ?>
        </h1>

        <?php get_template_part('loop'); ?>
    </section>

    <aside class="sidebar" role="complementary">
        <?php get_sidebar(); ?>
    </aside>

</main>

<?php get_footer(); ?>
