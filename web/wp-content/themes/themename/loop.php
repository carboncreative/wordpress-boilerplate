<?php
/**
 *  Loop
 */
if(!have_posts()) : ?>
    <p>Sorry, no results were found.</p>
<?php endif; ?>

<?php while(have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header>
            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <time pubdate datetime="<?php the_time('c'); ?>">Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></time>
            <p>Written by <span class="author"><?php the_author(); ?></span></p>
        </header>

        <div class="article-content">
            <?php the_excerpt(); ?>
        </div>
    </article>

    <?php //comments_template('', true); ?>
<?php endwhile; ?>

<?php if($wp_query->max_num_pages > 1) : ?>
    <nav class="nav-paged">
        <div class="post-previous"><?php next_posts_link('&larr; Older posts'); ?></div>
        <div class="post-next"><?php previous_posts_link('Newer posts &rarr;'); ?></div>
    </nav>
<?php endif; ?>
