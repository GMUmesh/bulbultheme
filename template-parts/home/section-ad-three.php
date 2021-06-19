<?php
/**
 * Section for banner Ad
 */
?>

<?php if( is_active_sidebar( 'ct_banner_ad_three' ) ) : ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="text-center ct-banner-ad">
				<?php dynamic_sidebar( 'ct_banner_ad_three' ); ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>