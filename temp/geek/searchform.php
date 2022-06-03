<?php
/**
 * default search form
 */
?>
<form role="search" id="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" class="form-control" autocomplete="off" name="s" placeholder="<?php echo __( 'Search&#46;&#46;&#46;', 'geek' ); ?>" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>">
    <button type="submit" id="search-submit" class="btn"><i class="fa fa-search"></i></button>
</form>
