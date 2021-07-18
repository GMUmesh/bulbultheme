<?php

/**
 * Template part for displaying Top section in homepage
 */
$spark_cat_id = intval(get_theme_mod('spark_grid_section_category_setting', 1));
$spark_block_args = array(
    'post_type'         =>  'post',
    'posts_per_page'    =>  10,
    'cat'               =>  $spark_cat_id,
    'ignore_sticky_posts' => 1
);

$spark_block_item  = new WP_Query($spark_block_args);
?>
<div class="container block-slider-container">
    <div class="ct-block-slider">
        <?php
        if ($spark_block_item->have_posts()) :
            while ($spark_block_item->have_posts()) : $spark_block_item->the_post();
        ?>
                <div class="ct-slide">
                    <div class="ct-slide-container">
                        <div class="ct-slide-bg" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat scroll center center / cover;"></div>

                        <div class="ct-slide-content">
                            <?php spark_news_the_category_colors(); ?>
                            <h2><span class="animated-underline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h2>
                            <div class="ct-post-meta">
                                <div class="ct-block">
                                    <span class="ct-icon icofont-user-alt-3"></span>
                                    <span class="ct-meta ct-author"><?php the_author(); ?></span><!-- .ct-author -->
                                </div><!-- /.ct-block -->
                                <div class="ct-block">
                                    <span class="ct-icon icofont-clock-time"></span>
                                    <span class="ct-meta ct-times-read">
                                        <?php
                                        $cal = new Nepali_Calendar();

                                        $day = get_the_date("d");
                                        $month = get_the_date("m");
                                        $year = get_the_date("Y");

                                        $post_date = $cal->eng_to_nep($year, $month, $day);

                                        // convert into nepali text
                                        $post_dt = engDayToNep($post_date['date']);
                                        $post_year = engYearToNep($post_date['year']);

                                        echo $post_date['nmonth'] . ' ' . $post_dt . ', ' . $post_year;
                                        ?>
                                    </span>
                                </div><!-- .ct-block -->
                            </div><!-- .ct-post-meta -->
                        </div><!-- /.ct-slide-content -->
                    </div><!-- /.ct-slide-container -->
                </div><!-- /.ct-slide -->
        <?php
            endwhile;
        else :
            get_template_part('template-parts/post/content', 'none');
        endif;

        wp_reset_postdata();
        ?>
    </div><!-- /.ct-block-slider -->

    <div class="ct-slider-arrow">
        <div class="prev icofont-rounded-left"></div>
        <div class="next icofont-rounded-right"></div>
    </div><!-- /.ct-slider-arrow -->
</div><!-- /.block-slider-container -->