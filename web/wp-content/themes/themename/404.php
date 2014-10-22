<?php
/**
 *  404 Page
 */
get_header(); ?>

<main class="main">

    <section class="content" role="main">
        <?php if(function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<p class="breadcrumbs">','</p>'); } ?>

        <h1 class="page-title">File Not Found</h1>

        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>

        <p>Please try the following:</p>

        <ul>
            <li>Check your spelling</li>
            <li>Return to the <a href="<?php echo home_url(); ?>/">home page</a></li>
            <li>Click the <a href="javascript:history.back()">Back</a> button</li>
        </ul>
    </section>

</main>

<?php get_footer(); ?>
