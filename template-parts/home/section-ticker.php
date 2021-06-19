<?php
/**
 * Template part for displaying Top section in homepage
 */

  $spark_list_args = array(
    'post_type'         =>  'post',
    'posts_per_page'    =>  4,
  );
  $spark_list_item  = new WP_Query( $spark_list_args );
?>
<div class="container">
  <div class="ct-news-ticker">
    <div class="ct-exclusive-posts clearfix">
      <div class="ct-exclusive-now">
        <div class="ct-spinner">
          <div class="ct-spinner-effect1"></div>
          <div class="ct-spinner-effect2"></div>
        </div>
        <span><?php esc_html_e( 'ताजा समाचार','spark-news' ); ?></span>
      </div>
      <div class="ct-exclusive-slider">
        <div class="ct-marquee">
        <?php
          if ( $spark_list_item->have_posts() ) :
              while ( $spark_list_item->have_posts() ) : $spark_list_item->the_post();
        ?>
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail(); ?>
            <?php endif; ?>
            <?php the_title(); ?>
          </a>
          <?php
            endwhile;
            else :
                get_template_part( 'template-parts/post/content', 'none' );
            endif;

            wp_reset_postdata();
          ?>
        </div>
      </div>
    </div>
 </div>
</div>
