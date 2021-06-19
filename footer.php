<footer class="footer">
  <?php if (
    is_active_sidebar('spark_blog-footer-left') ||
    is_active_sidebar('spark_blog-footer-middle') ||
    is_active_sidebar('spark_blog-footer-right')
  ) : ?>
    <div class="u-full-width">
      <div class="container ct-footer-widgets">
        <div class="row">
          <div class="col-md-4">
            <?php
            if (is_active_sidebar('spark_blog-footer-left')) {
              dynamic_sidebar('spark_blog-footer-left');
            }
            ?>
          </div><!-- .col-md-4 -->
          <div class="col-md-4">
            <?php
            if (is_active_sidebar('spark_blog-footer-middle')) {
              dynamic_sidebar('spark_blog-footer-middle');
            }
            ?>
          </div><!-- .col-md-4 -->
          <div class="col-md-4">
            <?php
            if (is_active_sidebar('spark_blog-footer-middle')) {
              dynamic_sidebar('spark_blog-footer-right');
            }
            ?>
          </div><!-- .col-md-4 -->
        </div>
      </div><!-- .container -->
    </div>
  <?php endif; ?>
  <div class="ct-credits">
    <p><?php esc_html_e('Copyright', 'spark-news'); ?> <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a><?php esc_html_e('. All rights reserved.', 'spark-news'); ?>
      <span class="footer-info-right">
        <?php echo esc_html__(' | Designed by', 'spark-news') ?> <a href="<?php echo esc_url('https://umeshghartimagar.com.np/', 'spark-news'); ?>"><?php echo esc_html__('AIM Tech', 'spark-news') ?></a>
      </span>
    </p>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>