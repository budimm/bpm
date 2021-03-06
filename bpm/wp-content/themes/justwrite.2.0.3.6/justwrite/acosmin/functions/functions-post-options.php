<?php
/* ------------------------------------------------------------------------- *
 *  Custom post options
 *	___________________
 *
 *	This will help us display a few meta options when you write a post:
 *	- Mark this post as featured
 *	- Display post thumbnail in single view
 *	- Post layout
/* ------------------------------------------------------------------------- */



/*  Add a metabox to display options
/* ------------------------------------ */
add_action('admin_menu', 'ac_options_box');
function ac_options_box() {
	add_meta_box(
		'ac_post_side_meta',
		esc_html__('Post Options:', 'justwrite'),
		'ac_post_options',
		'post', 'side', 'high',
		array(
			'__block_editor_compatible_meta_box' => false,
		)
	);
}



/*  Metabox output
/* ------------------------------------ */
function ac_post_options() {
	global $post;
	$ac_post_layout_customizer	= get_theme_mod( 'ac_single_post_layout_select', 'ac_post_layout_normal' );
	$ac_featured_article 		= get_post_meta( $post->ID, 'ac_featured_article', true );
	$ac_show_post_thumbnail 	= get_post_meta( $post->ID, 'ac_show_post_thumbnail', true );
	$ac_post_layout_options 	= get_post_meta( $post->ID, 'ac_post_layout_options', true );
	$ac_cover_overlay_opacity 	= get_post_meta( $post->ID, 'ac_cover_overlay_opacity', true );
	?>
    <form>
		<p>
			<input type="checkbox" class="checkbox" name="ac_featured_article" <?php checked( $ac_featured_article, 1 ); ?> /><label for="ac_featured_article"><?php _e( 'Mark this post as featured', 'justwrite' ) ?></label>
		<br />
			<input type="checkbox" class="checkbox" name="ac_show_post_thumbnail" <?php checked( $ac_show_post_thumbnail, 1 ); ?> /><label for="ac_show_post_thumbnail"><?php _e( 'Post thumbnail in single view', 'justwrite' ) ?></label>
		</p>
        <p>
            <label for="ac_post_layout_options"><b><?php _e( 'Post Layout:', 'justwrite' ); ?></b></label><br />
            <select name="ac_post_layout_options" id="ac_post_layout_options" class="widefat">
                <option value="ac_post_layout_normal"<?php selected( $ac_post_layout_options, 'ac_post_layout_normal' ); ac_spl_selected( 'ac_post_layout_normal' ); ?>><?php _e( 'Normal', 'justwrite' ); ac_sp_layout_default( 'ac_post_layout_normal' ); ?></option>
                <option value="ac_post_layout_cover"<?php selected( $ac_post_layout_options, 'ac_post_layout_cover' ); ac_spl_selected( 'ac_post_layout_cover' ); ?>><?php _e( 'Billboard', 'justwrite' ); ac_sp_layout_default( 'ac_post_layout_cover' ); ?></option>
            </select>
        </p>
        <div id="ac_overlay_options">
        	<p>
            	<label><b><?php _e( 'Notice:', 'justwrite' ); ?></b></label><br />
                <?php _e( 'Bilboard option: Your featured image must be at least 1800x900px to display correctly.', 'justwrite' ); ?>
            </p>
            <p>
            	<label for="ac_cover_overlay_opacity"><b><?php _e( 'Billboard Overlay Opacity:', 'justwrite' ); ?></b></label><br />
				<select name="ac_cover_overlay_opacity" id="ac_cover_overlay_opacity" class="widefat">
                    <option value="transparent"<?php selected( $ac_cover_overlay_opacity, 'transparent' ); ac_spt_selected( 'transparent' ); ?>><?php _e( 'Transparent', 'justwrite' ); ac_sp_opacity_default( 'transparent' ); ?></option>
                    <option value="0.1"<?php selected( $ac_cover_overlay_opacity, '0.1' ); ac_spt_selected( '0.1' ); ?>><?php _e( '10%', 'justwrite' ); ac_sp_opacity_default( '0.1' ); ?></option>
                    <option value="0.2"<?php selected( $ac_cover_overlay_opacity, '0.2' ); ac_spt_selected( '0.2' ); ?>><?php _e( '20%', 'justwrite' ); ac_sp_opacity_default( '0.2' ); ?></option>
                    <option value="0.3"<?php selected( $ac_cover_overlay_opacity, '0.3' ); ac_spt_selected( '0.3' ); ?>><?php _e( '30%', 'justwrite' ); ac_sp_opacity_default( '0.3' ); ?></option>
                    <option value="0.4"<?php selected( $ac_cover_overlay_opacity, '0.4' ); ac_spt_selected( '0.4' ); ?>><?php _e( '40%', 'justwrite' ); ac_sp_opacity_default( '0.4' ); ?></option>
                    <option value="0.5"<?php selected( $ac_cover_overlay_opacity, '0.5' ); ac_spt_selected( '0.5' ); ?>><?php _e( '50%', 'justwrite' ); ac_sp_opacity_default( '0.5' ); ?></option>
                    <option value="0.6"<?php selected( $ac_cover_overlay_opacity, '0.6' ); ac_spt_selected( '0.6' ); ?>><?php _e( '60%', 'justwrite' ); ac_sp_opacity_default( '0.6' ); ?></option>
                    <option value="0.7"<?php selected( $ac_cover_overlay_opacity, '0.7' ); ac_spt_selected( '0.7' ); ?>><?php _e( '70%', 'justwrite' ); ac_sp_opacity_default( '0.7' ); ?></option>
                    <option value="0.8"<?php selected( $ac_cover_overlay_opacity, '0.8' ); ac_spt_selected( '0.8' ); ?>><?php _e( '80%', 'justwrite' ); ac_sp_opacity_default( '0.8' ); ?></option>
                    <option value="0.9"<?php selected( $ac_cover_overlay_opacity, '0.9' ); ac_spt_selected( '0.9' ); ?>><?php _e( '90%', 'justwrite' ); ac_sp_opacity_default( '0.9' ); ?></option>
                    <option value="1"<?php selected( $ac_cover_overlay_opacity, '1' ); ac_spt_selected( '1' ); ?>><?php _e( '100%', 'justwrite' ); ac_sp_opacity_default( '1' ); ?></option>
                </select>
            </p>
		</div>
    </form>

    <?php
}



/*  Save meta information
/* ------------------------------------ */
function ac_save_added_options( $postID ) {
	global $post;
	$ac_featured_article 		= ! empty( $_POST['ac_featured_article'] ) ? 1 : 0;
	$ac_show_post_thumbnail 	= ! empty( $_POST['ac_show_post_thumbnail'] ) ? 1 : 0;
	$ac_post_layout_options 	= ! empty( $_POST['ac_post_layout_options'] ) ? $_POST['ac_post_layout_options'] : '';
	$ac_color_field_select 		= ! empty( $_POST['ac_color_field_select'] ) ? $_POST['ac_color_field_select'] : '';
	$ac_cover_overlay_opacity 	= ! empty( $_POST['ac_cover_overlay_opacity'] ) ? $_POST['ac_cover_overlay_opacity'] : '';

	if( $parent_id = wp_is_post_revision( $postID ) ) {
	  $postID = $parent_id;
	}

	if ( isset( $_POST[ 'save' ] ) || isset( $_POST[ 'publish' ] ) ) {
		ac_update_this_custom_meta( $postID, absint( $ac_featured_article ), 'ac_featured_article' );
		ac_update_this_custom_meta( $postID, absint( $ac_show_post_thumbnail ), 'ac_show_post_thumbnail' );
		ac_update_this_custom_meta( $postID, esc_html( $ac_post_layout_options ), 'ac_post_layout_options' );
		ac_update_this_custom_meta( $postID, esc_html( $ac_cover_overlay_opacity ), 'ac_cover_overlay_opacity' );
	}

}
add_action( 'save_post', 'ac_save_added_options' );



/*  Update meta information
/* ------------------------------------ */
function ac_update_this_custom_meta( $postID, $newvalue, $field_name ) {
	if( ! get_post_meta( $postID, $field_name ) ) {
		add_post_meta( $postID, $field_name, $newvalue );
	} else {
		update_post_meta( $postID, $field_name, $newvalue );
	}
}



/*  Check colorpicker color
/* ------------------------------------ */
function ac_check_colorpiker_color( $value ) {
    if ( preg_match( '/^#[a-f0-9]{6}$/i', $value ) ) {
        return true;
    }
    return false;
}



/*  Check single post layout default
/* ------------------------------------ */
function ac_sp_layout_default( $selected_option = 'ac_post_layout_normal' ) {
	$global_default = get_theme_mod( 'ac_single_post_layout_select', 'ac_post_layout_normal' );
	if( $selected_option == $global_default ) {
		echo ' - ' . __( 'Default', 'justwrite' );
	}
}



/*  Check billboard overlay default
/* ------------------------------------ */
function ac_sp_opacity_default( $selected_option = '0.5' ) {
	$global_default = get_theme_mod( 'ac_single_post_opacity_select', '0.5' );
	if( $selected_option == $global_default ) {
		echo ' - ' . __( 'Default', 'justwrite' );
	}
}



/*  Check single post layout default
/* ------------------------------------ */
function ac_spl_selected( $option_name ) {
	global $post;
	$option = get_post_meta( $post->ID, 'ac_post_layout_options', true );
	$post_layout_customizer = get_theme_mod( 'ac_single_post_layout_select', 'ac_post_layout_normal' );
	$selected = ' selected="selected"';

	if( $option == '' ) {
		$new_option = $post_layout_customizer;
	} else {
		$new_option = $option;
	}

	if( $new_option == $option_name ) {
		echo $selected;
	} elseif ( $new_option == $option_name ) {
		echo $selected;
	} elseif ( $new_option == $option_name ) {
		echo $selected;
	}
}



/*  Check cover opacity default
/* ------------------------------------ */
function ac_spt_selected( $option_name ) {
	global $post;
	$option = get_post_meta( $post->ID, 'ac_cover_overlay_opacity', true );
	$cover_opacity_customizer = get_theme_mod( 'ac_single_post_opacity_select', '0.5' );
	$selected = ' selected="selected"';

	if( $option == '' ) {
		$new_option = $cover_opacity_customizer;
	} else {
		$new_option = $option;
	}

	if( $new_option == $option_name ) {
		echo $selected;
	} elseif ( $new_option == $option_name ) {
		echo $selected;
	} elseif ( $new_option == $option_name ) {
		echo $selected;
	}
}
?>
