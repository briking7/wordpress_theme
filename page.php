<?php
/*
Template Name: Default Page & Woocommerce Default Page

WooCommerce uses this as default page for Cart, Checkout, and Account

*/
?>

<?php get_header(); ?>

      


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      
<div class="container content-wrapper">


	<!-- Begin .entry-content -->

	<div class="content clearfix row">

		<!-- Breadcrumb Row -->
		<div class="clearfix row">
			<div id="breadcrumb" class="col-md-12 clearfix" role="breadcrumb">

				<?php get_template_part( 'breadcrumb' ); ?>

			</div>
		</div>
		<!-- End Breadcrumb Row -->
		
		
		<!-- Archive Title Row -->
			<div class="archive-title">

				<div class="clearfix row">
					<div class="col-sm-12 text-center">
						<h1>
							<?php wp_title(" "); ?>
						</h1>
					</div>
				</div>
			</div>
			<!-- End Archive Title Row -->
		
			<div id="content" class="clearfix row">
				<div id="main" class="col-md-10 col-md-offset-1 clearfix" role="main">


						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">
							
									<h1 class="single-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard">
										by <span class="author"><em><?php echo bones_get_the_author_posts_link() ?></em></span> - 
										<time class="updated" datetime="<?php get_the_time('Y-m-j') ?>"><?php echo get_the_time(get_option('date_format')) ?></time>
										<span class="sticky-ind pull-right"><i class="fa fa-star"></i></span>
									</p>
								

							</header> <?php // end article header ?>

						
						
<!--
							<?php global $brew_options; ?>
							<?php if( $brew_options['featured'] == '2' || ( $brew_options['featured'] == '4' && is_single() ) || ( $brew_options['featured'] == '3' && is_home() ) ) { ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-featured' ); ?>
								<?php if ( has_post_thumbnail() ) { ?>
									<section class="featured-content featured-img featured-img-bg" style="background: url('<?php echo $image[0]; ?>')">
								<?php } // end if 
								else { ?>
									<section class="featured-content featured-img">
										<?php if ( has_post_thumbnail() ) { ?>
		                                    <a class="featured-img" href="<?php the_permalink(); ?>">
		                                    	<?php the_post_thumbnail( 'post-featured' ); ?>
		                                    </a>
			                            <?php } // end if 
										else { ?>
			                            	<hr>
			                            <?php } //end else?>
				                <?php } // end else ?>
							<?php } // end if 
							else { ?>
								<section class="boobies featured-img">
							<?php } // end else ?>
							</section>
-->

							<section class="entry-content single-content clearfix" itemprop="articleBody">
								<?php the_content(); ?>
								<?php wp_link_pages(
                                	array(

                                        'before' => '<div class="page-link"><span>' . __( 'Pages:', 'brew' ) . '</span>',
                                        'after' => '</div>'
                                	) 
                                ); ?>
							</section> <?php // end article section ?>

							

						</article> <?php // end article ?>

					

					<?php endwhile; ?>

					<?php else : ?>

						<article id="post-not-found" class="hentry clearfix">
								<header class="article-header">
									<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
										<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
								</footer>
						</article>

					<?php endif; ?>

				</div> <?php // end #main ?>

				

			</div> <?php // end #content ?>

    </div> <?php // end ./container ?>
    
</div> <?php // end ./container content-wrapper ?>

<?php get_footer(); ?>
