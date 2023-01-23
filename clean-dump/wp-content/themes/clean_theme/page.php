<?php
/**
 * Page
 */
get_header(); ?>

<div class="row">
    <div class="large-8 medium-8 small-12 columns">
	<?php if ( have_posts() ) : ?>
	    <?php while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h1 class="page_title"><?php the_title(); ?></h1>
                <?php if ( has_post_thumbnail()) : ?>
                    <div title="<?php the_title_attribute(); ?>" class="th">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
                <?php the_content(); ?>
            </article>
	    <?php endwhile; ?>
	<?php endif; ?>
    </div>
    <div class="large-4 medium-4 small-12 columns sidebar">
        <?php get_sidebar('right'); ?>
    </div>
</div>

<?php get_footer(); ?>