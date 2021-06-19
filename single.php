<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header();
?>

<?php set_post_view(); ?>

<div class="main-container">
    <div class="container ct-single-title-container">
        <div class="row">
            <div class="col-md-12">
                <?php spark_news_the_category_colors(); ?>
                <div class="entry-title">
                    <h1><span class="ct-title"><?php the_title(); ?></span></h1>
                </div><!-- /.entry-title -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    
    <?php if ( has_post_thumbnail()) : ?>
    <div class="featured-single-image adjusted-image">
        <?php the_post_thumbnail(); ?>
    </div>
    <?php else: ?>
        <div class="no-featured-image"></div>
    <?php endif; ?>

    <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content/content', 'single' );
            endwhile; // End of the loop.
            else :
                get_template_part( 'template-parts/content/content', 'none' );
            endif;
        ?>
</div>
<?php get_footer();
