<?php

/**
 * Template part for displaying Top section in homepage
 */
$spark_cat_id = intval(get_theme_mod('spark_top_section_category_setting', 1));

$spark_list_args = array(
    'post_type'         =>  'post',
    'posts_per_page'    =>  4,
    'cat'               =>  $spark_cat_id,
    'offset'            =>  5,
);

$spark_list_item  = new WP_Query($spark_list_args);
?>
<?php $spark_cat_id2 = intval(get_theme_mod('spark_top_list_section_category_setting', 1));
$spark_block_args = array(
    'post_type'         =>  'post',
    'posts_per_page'    =>  5,
    'cat'               =>  $spark_cat_id2,
    'ignore_sticky_posts' => 1
);

$spark_block_item  = new WP_Query($spark_block_args);
?>
<div id="content" class="container header-slider">
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="ct-slider-container">
                <div class="ct-slider">
                    <?php
                    if ($spark_block_item->have_posts()) :
                        while ($spark_block_item->have_posts()) : $spark_block_item->the_post();
                    ?>
                            <div class="ct-slide">
                                <div class="ct-slide-bg" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat scroll center center / cover;"></div>
                                <div class="ct-slide-content">
                                    <?php spark_news_the_category_colors(); ?>
                                    <h1><a href="<?php the_permalink(); ?>"><span class="animated-underline"><?php the_title(); ?></span></a></h1>
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
                                </div>
                            </div><!-- /.ct-slide -->
                    <?php
                        endwhile;
                    else :
                        get_template_part('template-parts/post/content', 'none');
                    endif;

                    wp_reset_postdata();
                    ?>
                </div><!-- /.ct-slider -->

                <div class="ct-slider-arrow">
                    <div class="prev icofont-rounded-left"></div>
                    <div class="next icofont-rounded-right"></div>
                </div><!-- /.ct-slider-arrow -->
            </div><!-- /.ct-slider-container -->
        </div><!-- /.col-md-6 -->


        <div class="col-lg-4 col-md-12">
            <div class="header-sidebar">
                <?php
                if ($spark_list_item->have_posts()) :
                    while ($spark_list_item->have_posts()) : $spark_list_item->the_post();
                ?>
                        <div class="ct-sbs-post-excerpt clearfix">
                            <div class="content-left">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('spark-news-150-1x1') ?></a>
                                <?php endif ?>
                            </div><!-- .content-left -->
                            <div class="content-right">
                                <?php spark_news_the_category_colors(); ?>
                                <h3><span class="animated-underline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h3>
                            </div><!-- .content-right -->
                        </div><!-- .ct-sbs-post-excerpt -->
                <?php
                    endwhile;
                else :
                    get_template_part('template-parts/post/content', 'none');
                endif;

                wp_reset_postdata();
                ?>
            </div><!-- /.header-sidebar -->
        </div><!-- /.col-md-4 -->
    </div><!-- /.row -->
</div><!-- /.container -->