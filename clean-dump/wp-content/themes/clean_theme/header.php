<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <!-- Set up Meta -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header>
        <div class="row large-uncollapse medium-uncollapse small-collapse">
            <div class="medium-4 small-12 columns">
                <div class="logo small-only-text-center">
                    <a href="<?php echo esc_url(home_url()); ?>">
                        <img src="<?php echo(get_header_image()); ?>" alt="<?php echo(get_bloginfo('title')); ?>" />
                    </a>
                </div>
            </div>
            <div class="medium-8 small-12 columns">

                <div class="social-icons text-right">
                    <?php if(have_rows('social_networks_options', 'options')) : ?>
                        <div class="soc-networks">
                            <?php while(have_rows('social_networks_options', 'options')) : the_row(); ?>
                                <a class="soc-network-item" href="<?php echo get_sub_field('url_option'); ?>" target="_blank">
                                    <i class="fa <?php echo get_sub_field('network_option'); ?>"></i>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <nav class="top-bar" data-topbar="" role="navigation" data-options="{is_hover: false, mobile_show_parent_link: true}">

                    <ul class="title-area">
                        <li class="name"></li>
                        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                    </ul>
                    <section class="top-bar-section">
                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'fallback_cb' => 'foundation_page_menu', 'walker' => new foundation_navigation() ) ); ?>
                    </section>
                </nav>
            </div>
        </div>
    </header>