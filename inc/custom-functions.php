<?php

/**
 * All theme custom functions are delared here
 */

/*************************************************************************************************************************
 * Loads google fonts to the theme
 * Thanks to themeshaper.com
 ************************************************************************************************************************/

if ( ! function_exists( 'spark_news_fonts_url' ) ) :

function spark_news_fonts_url() {
  $spark_fonts_url  = '';
  $spark_merri   = _x( 'on', 'Poppins font: on or off', 'spark-news' );
  $spark_open = _x( 'on', 'Open Sans font: on or off', 'spark-news' );

  if ( 'off' !== $spark_merri || 'off' !== $spark_open ) {
    $spark_font_families = array();

    if ( 'off' !== $spark_merri ) {
      $spark_font_families[] = 'Poppins:wght@300,400,700';
    }

    if ( 'off' !== $spark_open ) {
      $spark_font_families[] = 'Open Sans:wght@300,400,600,700';
    }
  }

  $spark_query_args = array(
    'family' => urlencode( implode( '|', $spark_font_families ) ),
    'subset' => urlencode( 'cyrillic-ext,cyrillic,vietnamese,latin-ext,latin' )
  );

  $spark_fonts_url = add_query_arg( $spark_query_args, 'https://fonts.googleapis.com/css' );

  return esc_url_raw( $spark_fonts_url );
}

endif;

/*************************************************************************************************************************
 * Set the content width
 ************************************************************************************************************************/

if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

/*************************************************************************************************************************
 *  Adds a span tag with dropdown icon after the unordered list
 *  that has a sub menu on the mobile menu.
 ************************************************************************************************************************/

class spark_news_Dropdown_Toggle_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$spark_output, $spark_depth = 0, $spark_args = array() ) {
        $spark_indent = str_repeat( "\t", $spark_depth );
        if( 'mobile_menu' == $spark_args->theme_location ) {
            $spark_output .='<a href="#" class="icofont-caret-down toggle-sub-menu js-toggle-class"></a>';
        }
        $spark_output .= "\n$spark_indent<ul class=\"sub-menu\">\n";
    }
}

/*************************************************************************************************************************
 * Estimated reading time
 ************************************************************************************************************************/

/* Word read count */
function spark_news_post_read_time( $post_id ) {

      // get the post content
      $content = get_post_field( 'post_content', $post_id );

      // count the words
      $word_count = str_word_count( strip_tags( $content ) );

      // reading time itself
      $readingtime = ceil($word_count / 200);

      if ($readingtime == 1) {
       $timer = " Minute read";
      } else {
       $timer = " Minutes read"; // or your version :) I use the same wordings for 1 minute of reading or more
      }

      // I'm going to print 'X minute read' above my post
      $totalreadingtime = $readingtime . $timer;
      echo esc_html( $totalreadingtime, 'spark-news' );

}

/****************************************************************************
 *  Custom Excerpt Length
 ****************************************************************************/

function spark_news_excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

/****************************************************************************
 *  Excerpt Dots change
 ****************************************************************************/
function spark_news_excerpt_more( $more ) {
  return '...';
}

add_filter('excerpt_more', 'spark_news_excerpt_more');

/****************************************************************************
 *  Adds Category Color Picker Field
 ****************************************************************************/
/* Add new colorpicker field to "Add new Category" screen */
function spark_news_colorpicker_field_add_new_category( $taxonomy ) {
  ?>
    <div class="form-field term-colorpicker-wrap">
        <label for="term-colorpicker"><?php echo esc_html_e( 'Select Color', 'spark-news' ); ?></label>
        <input name="_category_color" value="#ffffff" class="colorpicker" id="term-colorpicker" />
        <p><?php esc_html_e( 'Select Specific color for this category','spark-news' ); ?></p>
    </div>
  <?php
}
add_action( 'category_add_form_fields', 'spark_news_colorpicker_field_add_new_category' );

/* Add new colopicker field to "Edit Category" screen */
function spark_news_colorpicker_field_edit_category( $term ) {
    $color = get_term_meta( $term->term_id, '_category_color', true );
    $color = ( ! empty( $color ) ) ? "#{$color}" : '#f6727f';
  ?>
    <tr class="form-field term-colorpicker-wrap">
        <th scope="row"><label for="term-colorpicker"><?php echo esc_html_e( 'Select Color', 'spark-news' ); ?></label></th>
        <td>
            <input name="_category_color" value="<?php echo esc_attr( $color ); ?>" class="colorpicker" id="term-colorpicker" />
            <p class="description"><?php esc_html_e( 'Select Specific color for this category','spark-news' ); ?></p>
        </td>
    </tr>
  <?php
}
add_action( 'category_edit_form_fields', 'spark_news_colorpicker_field_edit_category' );   // Variable Hook Name

/* Term Metadata - Save Created and Edited Term Metadata */
function spark_news_save_termmeta( $term_id ) {

    // Save term color if possible
    if( isset( $_POST['_category_color'] ) && ! empty( $_POST['_category_color'] ) ) {
        $cat_color = sanitize_text_field( wp_unslash( $_POST['_category_color'] ) );
        update_term_meta( $term_id, '_category_color', sanitize_hex_color_no_hash( $cat_color ) );
    } else {
        delete_term_meta( $term_id, '_category_color' );
    }

}
add_action( 'created_category', 'spark_news_save_termmeta' );  // Variable Hook Name
add_action( 'edited_category',  'spark_news_save_termmeta' );  // Variable Hook Name


/* Enqueue wp-color-picker */
function spark_news_category_colorpicker_enqueue( $taxonomy ) {
    // Colorpicker Scripts
    wp_enqueue_script( 'wp-color-picker' );

    // Colorpicker Styles
    wp_enqueue_style( 'wp-color-picker' );

}
add_action( 'admin_enqueue_scripts', 'spark_news_category_colorpicker_enqueue' );

/* Add Display Color Picker */
function spark_news_the_category_colors() {

  $categories = get_the_category();

  $separator = '';
  $output = '';
  if($categories){
  ?>
  <div class="ct-categories">
  <?php
      foreach( $categories as $category ) {
          $color = get_term_meta( $category->term_id, '_category_color', true );
          $color = ( ! empty( $color ) ) ? "#{$color}" : '#f6727f';

          /* translators: %s: Category name */
          $output .= '<span class="ct-category" style="background-color: '.  $color . '; "><a href="'.esc_url( get_category_link($category->term_id ) ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'spark-news' ), $category->name ) ) . '">'.$category->cat_name.'</a></span>'.$separator;
      }
      echo trim( $output, $separator );
  ?>
  </div>
  <?php
  }
}


/*****************************************************************************
* Notice: Premium Version
*****************************************************************************/
/* Setup Transients after theme activation */
if ( ! function_exists( 'spark_news_after_activation' ) ) :

function spark_news_after_activation() {
  // Add Notification Options and Transients
  set_transient( 'ct-times-shown-transient', 1, 843200 ); // 12 hours in SECONDS
  add_option( 'dismissed-ct_premium', 'unset' );
}

endif;
add_action( 'after_switch_theme', 'spark_news_after_activation' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
add_action( 'wp_ajax_ct_premium_notice_handler', 'spark_news_premium_ajax_notice_handler' );
function spark_news_premium_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, 'set' );
    }
}

// Actual Notice
function spark_news_premium_admin_notice() {
    // do nothing
}

add_action( 'admin_notices', 'spark_news_premium_admin_notice' );
