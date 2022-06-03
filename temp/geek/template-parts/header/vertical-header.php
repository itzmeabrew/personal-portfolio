<?php global $geek_theme_options; ?>
<div id="navigation" class="menu-one">
    <div class="navbar navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php if ( !empty( $geek_theme_options['gk_logo_header']['url'] ) ) : ?>
                <div class="navbar-brand logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img class="main-logo img-responsive" src="<?php echo esc_url( $geek_theme_options['gk_logo_header']['url'] ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                </div>
                <?php else : ?>
                <div class="navbar-brand logo">
                    <?php
                    if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
                       
        <?php if ( has_nav_menu( 'vertical-nav' ) ) : ?>
            <nav class="collapse navbar-collapse">
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'vertical-nav',
                        'menu_id'           => 'vertical-navigation',
                        'menu_class'        => 'nav navbar-nav',
                        'walker'            => new wp_bootstrap_navwalker()
                    ) );
                ?>                           
            </nav><!-- #site-navigation -->
        <?php endif; ?>
    </div><!-- navbar -->                                
</div><!-- navigation -->