<?php

function bulbul_widgets_init() {

    register_sidebar( array(
        'name'          => esc_html__( 'Homepage Ad Section Three', 'spark-news' ),
        'id'            => 'ct_banner_ad_three',
        'description'   => esc_html__( 'Add widgets here to appear on the homepage banner ad section.', 'spark-news' ),
        'before_widget' => '<div id="%1$s" class="%2$s text-center ct-banner-ad widgetarea">',
        'after_widget'  => '</div><!-- /.widgetarea -->',
        'before_title'  => '<h2 class="widget-title ct-title">',
        'after_title'   => '</h2>',
    ) );

}


add_action( 'widgets_init', 'bulbul_widgets_init' );