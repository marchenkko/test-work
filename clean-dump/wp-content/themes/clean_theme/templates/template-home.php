<?php
/*
 * Template Name: Home Page
 */
get_header(); ?>

<div class="row">
    <div class="large-12 medium-12 small-12 columns">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
               <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>