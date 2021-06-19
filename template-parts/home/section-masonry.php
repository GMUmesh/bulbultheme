<?php
/**
 * Template part for displaying Top section in homepage
 */

    $spark_news_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $spark_block_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  9,
        'ignore_sticky_posts' => 1,
        'paged'             =>  $spark_news_paged
    );

    $spark_block_item  = new WP_Query( $spark_block_args );
?>
<div class="container ct-masonry-container">
    <div class="row grid">
          <?php
            if ( $spark_block_item->have_posts() ) :
                while ( $spark_block_item->have_posts() ) : $spark_block_item->the_post();
          ?>
         <div class="col-lg-4 col-md-6 grid-item">
              <div class="ct-masonry">
                <?php $spark_news_cats='';
                    if ( $spark_news_cats = has_post_thumbnail() ): ?>
                    <div class="featured-image">
                      <?php if ( has_post_thumbnail() ): ?>
                        <a href="<?php the_permalink(); ?>">
                              <?php the_post_thumbnail( 'spark-news-370-3x2' ); ?>
                        </a>
                      <?php endif; ?>
                    </div><!-- .featured-image -->
                  <?php endif ?>
                    <div class="post-content">
                        <?php if ( $spark_news_cats = has_post_thumbnail() ){ ?>
                         <div class="post-meta">
                          <?php spark_news_the_category_colors(); ?>
                         </div><!-- .post-meta -->
                        <?php } ?>
                         <h2><span class="animated-underline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h2>
                         <?php if ( $spark_news_cats = !has_post_thumbnail() ){
                            spark_news_the_category_colors();
                          } ?>
                         <div class="ct-post-meta">
                             <div class="ct-block">
                                 <span class="ct-icon icofont-user-alt-3"></span>
                                 <span class="ct-meta ct-author"><?php the_author(); ?></span><!-- .ct-author -->
                             </div><!-- /.ct-block -->
                             <div class="ct-block">
                                 <span class="ct-icon icofont-clock-time"></span>
                                 <span class="ct-meta ct-times-read"><?php echo esc_html( get_the_date() ); ?></span>
                             </div><!-- .ct-block -->
                         </div><!-- .ct-post-meta -->
                         <p class="ct-excerpt"><?php echo esc_html( spark_news_excerpt( 35 ) ); ?></p>
                         <div class="ct-read-more clearfix">
                              <a href="<?php the_permalink(); ?>"><span class="read-more"><?php esc_html_e( 'थप पढ्नुहोस्', 'spark-news' ); ?></span></a>
                              <span class="no-comments"><a href="<?php the_permalink(); ?>"><span class="comment-number"><?php echo esc_html( get_comments_number() ); ?></span></a></span>
                         </div><!-- .ct-ream-more -->
                    </div><!-- .post-content -->
              </div><!-- /.ct-masonry -->
         </div><!-- .col-md-4 -->
        <?php
            endwhile;
            else :
                get_template_part( 'template-parts/post/content', 'none' );
            endif;

            wp_reset_postdata();
        ?>
    </div><!-- .row -->
  </div><!-- /.container /.ct-masonry-container -->
  <!-- Pagination -->
<?php get_template_part( 'template-parts/pagination/pagination', get_post_format() ); ?>

</div><!-- /.main-container -->

