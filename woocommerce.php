<?php
/*
Template Name: Woocommerce Product Page
*/
?>

<?php get_header(); ?>

<!--
<section class="shop-pages-header">
	<div class="container-fluid">
		<div class="row">
			<div id="shop-pages-header center-block">
			
			<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
			
			
			<?php echo "start"; ?>
			<?php get_shop_header_image("product_header_image", "alt_header_image"); ?>
			<?php echo "end"; ?>
			

			<?php endwhile; ?>
			
			<?php endif; ?>

			</div>
		</div>
	</div>
</section>
-->

<div class="container content-wrapper">


	<!-- Begin .entry-content -->

	<div id="content" class="clearfix row">

		<!-- Breadcrumb Row -->
		<div class="clearfix row">
			<div id="breadcrumb" class="col-md-12 clearfix" role="breadcrumb">

				<?php get_template_part( 'breadcrumb' ); ?>

			</div>
		</div>
		<!-- End Breadcrumb Row -->
		

		<div id="main" class="col-md-10 col-md-offset-1 clearfix entry-content" role="main">

            <?php woocommerce_content(); ?>
        
          </div> <!-- end #main -->
			
      
        </div> <!-- end #content -->

      </div> <!-- end .container -->

<?php get_footer(); ?>