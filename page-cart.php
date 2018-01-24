<?php
/*
Template Name: Woocommerce Cart Page

WooCommerce uses this as default page for Cart, Checkout, and Account

*/
?>

<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!--Hero-->
      
<section class="products-page-header">
	<div class="container-fluid">
		<div class="row">
			<div class="center-block">


				<?php if ( has_post_thumbnail() ) : ?>

				<?php the_post_thumbnail('product-page-header'); ?>
		
			</div>
			<?php endif; ?>

		</div>
	</div>
</section>

<!--End Hero-->

      
<div class="container content-wrapper">


	<!-- Begin .entry-content -->

	<div id="content" class="clearfix row">

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



					<?php if ( is_single() ) {?>
					  <div id="single-post-nav">
					    <ul class="pager">

					      <?php $trunc_limit = 30; ?>

					      <?php if( '' != get_previous_post() ) { ?>
					        <li class="previous">
					          <?php previous_post_link( '<span class="previous-page">%link</span>', __( '<i class="fa fa-caret-left"></i>', 'bones' ) . '&nbsp;' . brew_truncate_text( get_previous_post()->post_title, $trunc_limit ) ); ?>
					        </li>
					      <?php } // end if ?>

					      <?php if( '' != get_next_post() ) { ?>
					        <li class="next">
					          <?php next_post_link( '<span class="no-previous-page-link next-page">%link</span>', '&nbsp;' . brew_truncate_text( get_next_post()->post_title, $trunc_limit ) . '&nbsp;' . __( '<i class="fa fa-caret-right"></i>', 'bones' ) ); ?>
					        </li>
					      <?php } // end if ?>

					    </ul>
					  </div><!-- /#single-post-nav -->
					<?php } ?>

          
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
