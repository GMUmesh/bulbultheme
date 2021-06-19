<?php
    $spark_news_sidebar = get_theme_mod( 'spark_news_single_page_image_setting', 'right-sidebar' );
?>
<div id="content" class="container ct-single-content-container">
    <div class="row">
        <?php if ( $spark_news_sidebar == 'no-sidebar' ) : ?>
        <div class="col-md-10 offset-md-1">
        <?php elseif ( $spark_news_sidebar == 'left-sidebar' ) : ?>
        <div class="col-md-4 ct-sidebar-widget">
            <?php get_sidebar(); ?>
        </div>
        <div class="col-md-8 offset-md-right-1">
        <?php else : ?>
        <div class="col-md-8">
        <?php endif; ?>
            <div class="ct-post-meta">
                <span class="ct-author-wrap">
                    <span class="ct-icon icofont-user-alt-3"></span>
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="ct-meta ct-author"><?php the_author(); ?></span><!-- .prr-author --></a>
                </span>
                
                <span class="ct-icon icofont-clock-time"></span>
                <span class="ct-meta ct-times-read"><?php echo esc_html( get_the_date() ); ?></span>
                <span class="post-view-counter"><?= get_post_view(); ?></span>

            </div><!-- .prr-post-meta -->

            <?php if( is_active_sidebar( 'ct_single_ad_one' ) ) : ?>
            <div class="ct-single-top-ad-section">
                <?php dynamic_sidebar( 'ct_single_ad_one' ); ?>
            </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php the_content(); ?>
                <div class="post-tags">
                    <?php
                        if( $spark_tags = get_the_tags() ) {
                            foreach( $spark_tags as $spark_tags ) {
                            $spark_sep = ( $spark_tags === end( $spark_tags ) ) ? '' : ' ';
                            echo '<a href="' . esc_url( get_term_link( $spark_tags, $spark_tags->taxonomy ) ) . '">#' . esc_html( $spark_tags->name ) . '</a>' . esc_html( $spark_sep );
                            }
                        }
                    ?>
                </div><!-- .post-tags -->
            </div><!-- /.entry-content -->

            <?php if( is_active_sidebar( 'ct_single_ad_two' ) ) : ?>
            <div class="ct-single-bottom-ad-section">
                <?php dynamic_sidebar( 'ct_single_ad_two' ); ?>
            </div>
            <?php endif; ?>

            <div class="container">
                <div class="pagination-single">
                    <div class="pagination-nav clearfix">
                        <?php $spark_news_prev_post = get_adjacent_post( false, '', false ); ?>
                        <?php if ( is_a( $spark_news_prev_post, 'WP_Post' ) ) { ?>
                        <div class="previous-post-wrap">
                            <div class="previous-post">
                                <?php esc_html_e( 'Previous Post', 'spark-news' ); ?>
                            </div><!-- /.previous-post -->

                            <span class="animated-underline">
                                <a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', false)->ID ) ); ?>" class="prev"><?php echo esc_html( get_the_title( $spark_news_prev_post->ID ) ); ?></a>
                            </span>
                        </div><!-- /.previous-post-wrap -->
                        <?php } ?>

                        <?php $spark_news_next_post = get_adjacent_post( false, '', true ); ?>
                        <?php if ( is_a( $spark_news_next_post, 'WP_Post' ) ) { ?>
                        <div class="next-post-wrap">
                            <div class="next-post">
                                <?php esc_html_e( 'Next Post', 'spark-news' ); ?>
                            </div><!-- /.next-post -->

                            <span class="animated-underline">
                                <a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', true)->ID ) ); ?>" class="next"><?php echo esc_html( get_the_title( $spark_news_next_post->ID ) ); ?></a>
                            </span>
                        </div><!-- /.next-post-wrap -->
                        <?php } ?>
                    </div><!-- /.pagination-nav -->
                </div><!-- /.pagination-single-->
            </div><!-- /.container -->

            <?php
                $spark_news_author_image_class = '';
                if ( get_the_author_meta( 'description' ) ) {
                    $spark_news_author_image_class = "ct-has-description";
                }
            ?>

            <div class="entry-footer">
                <div class="author-info vertical-align">
                    <div class="author-image <?php echo esc_attr( $spark_news_author_image_class ); ?>">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                    </div><!-- /.author-image -->
                    <div class="author-details">
                        <p class="entry-author-label"><?php echo esc_html__( 'About the author', 'spark-news' ) ?></p>
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="author-name"><?php the_author(); ?></span><!-- /.author-name --></a>
                        <?php if ( get_the_author_meta( 'description' ) ) : ?>
                            <p><?php the_author_meta( 'description' ); ?></p>
                        <?php endif; ?>
                        <div class="author-link">
                            <?php if ( get_the_author_meta( 'user_url' ) ): ?>
                                <a href="<?php the_author_meta( 'user_url' ); ?>"><?php esc_html_e( 'Visit Website', 'spark-news' );?></a>
                            <?php endif ?>
                        </div><!-- /.author-link -->
                    </div><!-- /.author-details -->
                </div><!-- /.author-info -->
            </div><!-- /.entry-footer -->
            <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            ?>
        </div><!-- /.col-md-8 -->
        <?php if ( $spark_news_sidebar == 'right-sidebar' ) : ?>
        <div class="col-md-4 ct-sidebar-widget">
            <?php get_sidebar(); ?>
        </div>
        <?php endif ?>

    </div><!-- /.row -->
</div><!-- .container -->

