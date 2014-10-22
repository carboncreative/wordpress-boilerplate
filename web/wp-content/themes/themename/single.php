<?php
/**
 *  Single Post
 */

get_header(); ?>

<main class="main">

    <section class="content" role="main">
        <?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<p class="breadcrumbs">','</p>'); } ?>

        <h1 class="page-title"><?php the_title(); ?></h1>

        <?php the_content(); ?>
    </section>

    <aside class="sidebar" role="complementary">
        <?php get_sidebar(); ?>
    </aside>

</main>

<?php get_footer(); ?>
