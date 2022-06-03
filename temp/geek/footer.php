<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Geek
 */
global $geek_theme_options; 
	$footer_class = '';
	$menu_select = get_post_meta( get_the_ID(), '_geek_menu_style', true );
	if( isset( $geek_theme_options['gk_menu_style'] ) && $geek_theme_options['gk_menu_style'] != 'none' && $menu_select =='default' ) :
		$footer_class = "text-center";
	elseif ( $menu_select =='vertical' ) :
		$footer_class = "text-center";
	elseif ( $menu_select =='horizontal') :
		$footer_class = "";
	else :
		$footer_class = "text-center";
	endif;
?>

	</div><!-- #content -->
</div>
<?php if ( !empty( $geek_theme_options['gk_copyright'] ) ) : ?>

	<div id="footer">
        <div class="container <?php echo esc_attr( $footer_class ); ?>">
            <div class="footer">
                <?php if ( !empty( $geek_theme_options['gk_copyright'] ) ) : ?>
					<p><?php echo wp_kses( $geek_theme_options['gk_copyright'],'','' );  ?> Shared by <!-- Please Do Not Remove Shared Credits Link --><a href='https://www.agecalculatorguru.com/' target="_blank" id="sd">Age Calculator</a><!-- Please Do Not Remove Shared Credits Link --></p>
				<?php endif; ?>
            </div>
        </div><!-- contaner -->
    </div><!-- footer -->
<?php endif; ?>
</div><!-- main-wrapper -->
<?php wp_footer(); ?>

</body>
</html>
