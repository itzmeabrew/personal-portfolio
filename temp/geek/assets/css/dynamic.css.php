<?php
header("Content-type: text/css; charset: UTF-8");
global $geek_theme_options;

echo esc_html( $geek_theme_options['gk_css_editor'] );
?>
body{
    <?php if( !empty( $geek_theme_options['gk_body_typo']['font-family'] ) ) : ?>
	font-family: '<?php echo esc_html( $geek_theme_options['gk_body_typo']['font-family'] ); ?>';
    <?php endif; ?>
    <?php if( !empty( $geek_theme_options['gk_body_typo']['font-weight'] ) ) : ?>
	font-weight: <?php echo esc_html( $geek_theme_options['gk_body_typo']['font-weight'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $geek_theme_options['gk_body_typo']['color'] ) ) : ?>
	color: <?php echo esc_html( $geek_theme_options['gk_body_typo']['color'] ); ?>;
    <?php endif; ?>
}
h1, h2, h3, h4, h5, h6 {
    <?php if( !empty( $geek_theme_options['gk_head_typo']['font-family'] ) ) : ?>
	font-family: '<?php echo esc_html( $geek_theme_options['gk_head_typo']['font-family'] ); ?>';
    <?php endif; ?>
    <?php if( !empty( $geek_theme_options['gk_head_typo']['font-weight'] ) ) : ?>
	font-weight: <?php echo esc_html( $geek_theme_options['gk_head_typo']['font-weight'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $geek_theme_options['gk_head_typo']['color'] ) ) : ?>
	color: <?php echo esc_html( $geek_theme_options['gk_head_typo']['color'] ); ?>;
    <?php endif; ?>
}
