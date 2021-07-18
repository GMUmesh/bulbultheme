<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>

<div class="col-lg-4 col-md-6 grid-item">
  <div class="ct-masonry">
    <?php $spark_news_cats = '';
    if ($spark_news_cats = has_post_thumbnail()) : ?>
      <div class="featured-image">
        <?php if (has_post_thumbnail()) : ?>
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('spark-news-370-3x2'); ?>
          </a>
        <?php endif; ?>
      </div><!-- .featured-image -->
    <?php endif ?>
    <div class="post-content">
      <?php if ($spark_news_cats = has_post_thumbnail()) { ?>
        <div class="post-meta">
          <?php spark_news_the_category_colors(); ?>
        </div><!-- .post-meta -->
      <?php } ?>
      <h2><span class="animated-underline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h2>
      <?php if ($spark_news_cats = !has_post_thumbnail()) {
        spark_news_the_category_colors();
      } ?>
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

            $post_dt = $post_date['date'];

            $post_dt = engDayToNep($post_dt);

            echo $post_date['day'] . ', ' . $post_date['nmonth'] . ' ' . $post_dt . ' गते';
            ?>
        </div><!-- .ct-block -->
      </div><!-- .ct-post-meta -->
      <p class="ct-excerpt"><?php echo esc_html(spark_news_excerpt(35)); ?></p>
      <div class="ct-read-more clearfix">
        <a href="<?php the_permalink(); ?>"><span class="read-more"><?php esc_html_e('थप पढ्नुहोस्', 'spark-news'); ?></span></a>
        <span class="no-comments"><a href="<?php the_permalink(); ?>"><span class="comment-number"><?php echo esc_html(get_comments_number()); ?></span></a></span>
      </div><!-- .ct-ream-more -->
    </div><!-- .post-content -->
  </div><!-- /.ct-masonry -->
</div><!-- .col-md-4 -->