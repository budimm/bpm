<?php
    $right_sidebar = esc_attr(onetone_option('right_sidebar_blog_posts',''));

	 if ( $right_sidebar && is_active_sidebar( $right_sidebar ) ){
	    dynamic_sidebar( $right_sidebar );
	 }
	 elseif( is_active_sidebar( 'default_sidebar' ) ) {
	    dynamic_sidebar('default_sidebar');
	 }else{
		onetone_get_default_sidebar();
	 }