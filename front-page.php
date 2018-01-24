	<?php
	/*
	Template Name: Home Page Template
	*/
	?>

	<?php get_header(); ?>
	
	<!-- Start of Loop -->

	<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
							<!--Title-->

			<section class="homepage-main-title">
				<div class="container content-wrapper">
					<div class="row text-center">

						<div class="col-sm-8 col-sm-offset-2">
							<section class="page-content entry-content clearfix" itemprop="headline">
								
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_quote_field_home("quote_1", "quote_author_1"); ?>

							</section>
						

							</section>
						</div>

					</div>
				</div>
			</section>
			<!-- End Title-->

	<!--Hero-->
<section class="blog-header">
	<div class="container-fluid">
		<div class="row">
			<div id="site-header center-block">
				<?php if ( get_header_image() ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img class="img-responsive" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        </a>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
	

	<!--End Hero-->
	
								<!--Title-->

<!--
			<section class="homepage-main-title">
				<div class="container">
					<div class="row text-center">

						<div class="col-sm-12">
							<section class="page-content entry-content clearfix" itemprop="headline">
								<?php get_main_title('title_main'); ?>

							</section>
						</div>

					</div>
				</div>
			</section>
-->
			<!-- End Title-->

	

<div class="container">

	<div id="content" class="clearfix row">

		<div id="main" class="clearfix" role="main">

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


			
			
<!--
<section class="blog-header">
	<div class="container-fluid">
		<div class="row">
			<div class="blog-header center-block">
				<?php get_custom_image("image_1", "alt_1", "home-image image_1"); ?>
		
			</div>
		</div>
	</div>
</section>
-->
			<!-- Intro Section 1-->

			<section class="section-intro-1">
				<div class="container">
					<div class="row">

						<!-- Column 1-->
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 sec-intro-1">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_text_field_home("text_intro_1", "text-intro-1 text-field-home"); ?>
								

							</section>
						</div>
						<!-- End Column 1-->

						
					</div>
				</div>
			</section>
			<!-- End Intro Section 1-->
			

			<!--Section 1-->
<!--

			<section class="section-1">
				<div class="container">
					<div class="row">

						
						<div class="col-sm-8 col-sm-offset-2 sec1-col2">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_text_field_home("text_2"); ?>

							</section>
						</div>
						

					</div>
				</div>
			</section>
			
-->
			<!-- End Section 1-->
			
			<!--Section 2-->
			<section class="section-2">
				<div class="container">
					<div class="row text-left">
					
						<!-- Column 1-->
						<div class="col-sm-4 sec2">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_custom_image("image_5", "alt_5", "home-image image_5"); ?>
							</section>
						</div>
						<!-- End Column 1-->
					
					<!-- Column 1-->
						<div class="col-sm-4 sec2">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_custom_image("image_2", "alt_2", "home-image image_2"); ?>
							</section>
						</div>
						<!-- End Column 1-->

						<!--Column 2-->
						<div class="col-sm-4 sec2-col2">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_custom_image("image_3", "alt_3", "home-image image_3"); ?>

							</section>
						</div>
						<!-- End Column 2-->
					</div>
				</div>
			</section>
			<!-- End Section 2-->
			
			<!--Section 2-->

			<section class="section-3">
				<div class="container">
					<div class="row text-left">

						<!-- Column 1-->
						<div class="col-sm-3 sec3">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_title_field_home("curious_title"); ?>
								

							</section>
						</div>
						<!-- End Column 1-->

						<!--Column 2-->
						<div class="col-sm-9 sec3-col2">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_text_field_home("text_curious"); ?>

							</section>
						</div>
						<!-- End Column 2-->
						
					</div>
				</div>
			</section>
			<!-- End Section 2-->
			
			<!--Section 3-->

			<section class="section-3">
				<div class="container">
					<div class="row text-left">

						<!-- Column 1-->
						<div class="col-sm-3 sec3">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_title_field_home("customer_title"); ?>
								

							</section>
						</div>
						<!-- End Column 1-->

						<!--Column 2-->
						<div class="col-sm-9 sec3-col2">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_text_field_home("text_customer"); ?>

							</section>
						</div>
						<!-- End Column 2-->
						
					</div>
				</div>
			</section>
			<!-- End Section 3-->
			
						<!--Section 2-->
			<section class="section-2">
				<div class="container">
					<div class="row text-left">
					
					<!-- Column 1-->
						<div class="col-sm-6 sec2">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_custom_image("image_1", "alt_1", "home-image image_1"); ?>
							</section>
						</div>
						<!-- End Column 1-->

						<!--Column 2-->
						<div class="col-sm-6 sec2-col2">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_text_field_home("text_2", "text-2"); ?>

							</section>
						</div>
						<!-- End Column 2-->
					</div>
				</div>
			</section>
			<!-- End Section 2-->
			
						<!--Section 2-->
			<section class="section-2">
				<div class="container">
					<div class="row text-left">
					
					<!-- Column 1-->
					
					<div class="col-sm-6 sec2-col2">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_text_field_home("text_3", "text-3"); ?>

							</section>
						</div>
						
						<!-- End Column 1-->

						<!--Column 2-->
						<div class="col-sm-6 sec2">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_custom_image("image_6", "alt_2", "home-image image_6"); ?>
							</section>
						</div>
						<!-- End Column 2-->
					</div>
				</div>
			</section>
			<!-- End Section 2-->
			
			<!-- Intro Section 1-->

			<section class="section-intro-1">
				<div class="container">
					<div class="row">

						<!-- Column 1-->
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 sec-intro-1">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_main_title("text_intro_2"); ?>
								

							</section>
						</div>
						<!-- End Column 1-->

						
					</div>
				</div>
			</section>
			<!-- End Intro Section 1-->


			<!--Full-Page Image Section-->
			<section class="section-2">
				<div class="container">
					<div class="row text-left">
					
					<!-- Column 1-->
						<div class="col-sm-12">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_custom_image("image_4", "alt_4", "home-image image_4"); ?>
							</section>
						</div>
					
						<!-- End Column 1-->
					</div>
				</div>
			</section>
			<!-- Full-Page Image Section -->

		

			<!--Section 3 Two column Text Fields -->
<!--
			<section class="section-3">
				<div class="container">
					<div class="row text-left">
-->

						<!-- Column 1-->
<!--
						<div class="col-sm-6 sec3">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_text_and_title_field_home("title_3_col1", "text_3_col1"); ?>
							</section>
						</div>
-->
						<!-- End Column 1-->

						<!--Column 2-->
<!--
						<div class="col-sm-6 sec3-col2">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_text_and_title_field_home("title_3_col2", "text_3_col2"); ?>
							</section>
						</div>
-->
						<!-- End Column 2-->
<!--
					</div>
				</div>
			</section>
-->
			<!-- End Section 3 Two column Text Fields-->

		
			<!-- Closing Section-->
<!--

			<section class="section-closing">
				<div class="container">
					<div class="row text-center">
-->

						<!-- Column 1-->
<!--
						<div class="col-sm-8 col-sm-offset-2 sec-closing">
							<section class="page-content entry-content clearfix" itemprop="articleBody">
								<?php get_text_field_home("text_closing", "text-closing text-field-home"); ?>
								

							</section>
						</div>
-->
						<!-- End Column 1-->

						
<!--
					</div>
				</div>
			</section>
-->
			<!-- End Closing Section-->
		
		
		
			</article>
			<!-- end article -->

			<?php endwhile; ?>

			<?php else : ?>

			<article id="post-not-found">
				<header>
					<h1>
						<?php _e("Not Found", "bonestheme"); ?>
					</h1>
				</header>
				<section class="post_content">
					<p>
						<?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?>
					</p>
				</section>
				<footer>
				</footer>
			</article>

			<?php endif; ?>

		</div>
		<!-- end #main -->

		<?php // get_sidebar(); ?>

	</div>
	<!-- end #content -->

</div> <!-- end .container -->




	<?php get_footer(); ?>