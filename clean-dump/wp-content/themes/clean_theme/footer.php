<?php
/**
 * Footer
 */
?>

<footer>
    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'inline-list','fallback_cb' => 'foundation_page_menu')); ?>
        </div>
    </div>

    <?php if(get_field('copyright_options', 'option')){ ?>
        <div class="row">
            <div class="large-12 columns text-left">
                <?php the_field('copyright_options', 'option'); ?>
            </div>
        </div>
    <?php }?>

</footer>

<?php wp_footer(); ?>
</body>
</html>