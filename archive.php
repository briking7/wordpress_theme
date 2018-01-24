<?php
/*
Template Name: Archive Page

Main default page for categories and archives
*/
?>


<?php get_header(); ?>

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
		
		<!-- Archive Title Row -->
			<div class="archive-title">

				<div class="clearfix row">
					<div class="col-sm-12 text-center">
						<h1>
							<?php wp_title(" ");?>
						</h1>
					</div>
				</div>
			</div>
			<!-- End Archive Title Row -->

		<div id="main" class="col-md-10 clearfix entry-content" role="main">


			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

				<header class="article-header">
					<div class="row">

						<div class="titlewrap clearfix">

							<div class="col-md-12">

								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<h3 class="post-title entry-title">
										<?php the_title(); ?>
									</h3>
								</a>

							</div>
						</div>
					</div>
				</header>



				<?php // end article header ?>


				<!--	Thumbnail Column	-->

				<!-- Post Content Containing Div -->

				<div class="post-content-row row clearfix">

					<!-- Thumbnail Wrapper Div -->
					<div class="thumbnail-wrapper">
						<div class="col-md-3 col-sm-6 col-xs-12 post-data-image">

							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">

								<?php the_post_thumbnail('thumbnail'); ?>
							</a>

						</div>
					</div>
					<!-- End Thumbnail Wrapper Div -->

					<!--	End Thumbnail Column	-->


					<!--	Meta Data Column	-->
					<div>
						<div class="byline col-md-3 col-sm-6 col-xs-12 vcard post-data-content">

							<h5>Authored by:</h5>
							<p class="author clearfix">
								<em>
									<?php echo bones_get_the_author_posts_link() ?>
								</em>
							</p>
							<h5>Categorized by:</h5>
							<p class="tags clearfix">
								<?php printf( '<span class="">' . __( '%1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?>
							</p>
							<h5>Published on:</h5>
							<p class="time clearfix">
								<time class="updated" datetime="<?php get_the_time('Y-m-j') ?>">
									<?php echo get_the_time(get_option('date_format')) ?>
								</time>
							</p>

							<p class="commentnum pull-right clearfix">
								<a href="<?php comments_link(); ?>">
									<?php comments_number( '<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %' ); ?>
								</a>
							</p>

							<!--							<p class="sticky-ind pull-right"><i class="fa fa-star"></i></p>-->

						</div>

					</div>
					<!--	End Meta Data Column	-->


					<!--	Content Column	-->
					<div>

						<div class="col-md-6 col-sm-12 post-content">

							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">

								<h3 class="post-title entry-title">
									<?php the_title(); ?>
								</h3>

								<p>
									<?php the_excerpt(); ?>
								</p>
							</a>
							<?php wp_link_pages(
                                		array(
                                		
	                                        'before' => '<div class="page-link"><span>' . __( 'Pages:', 'brew' ) . '</span>',
	                                        'after' => '</div>'
                                		) 
                                	); ?>

						</div>

					</div>
					<!--	End Content Column	-->


				</div>
				<!-- End Post Content Containing Div -->

				<?php // end article section ?>

				
<!--
				//Footer displays tags and categories and comments
				// Untag if you want to display them below post content
				
				<footer class="article-footer clearfix">
					
							<span class="tags pull-left">
								<?php printf( '<span class="">' . __( '%1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?>
								<?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' ); ?>
							</span>


												<span class="commentnum pull-right"><a href="<?php comments_link(); ?>"><?php comments_number( '<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %' ); ?></a></span>

				</footer>
-->
				<?php // end article footer ?>

				<?php // comments_template(); // uncomment if you want to use them ?>

			</article>
			<?php // end article ?>

			<?php endwhile; ?>


			<?php if (function_exists("emm_paginate")) { ?>
			<?php emm_paginate(); ?>
			<?php } else { ?>
			<nav class="wp-prev-next">
				<ul class="clearfix">
					<li class="prev-link">
						<?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?>
					</li>
					<li class="next-link">
						<?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?>
					</li>
				</ul>
			</nav>
			<?php } ?>

			<?php else : ?>

			<article id="post-not-found" class="hentry clearfix">
				<header class="article-header">
					<h1>
						<?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?>
					</h1>
				</header>
				<section class="entry-content">
					<p>
						<?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?>
					</p>
				</section>
				<footer class="article-footer">
					<p>
						<?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?>
					</p>
				</footer>
			</article>


			<?php endif; ?>

		</div>
		<!-- End .entry-content -->

		<?php // end #main ?>


		<?php get_sidebar(); ?>


	</div>
	<?php // end #content ?>

</div>
<!-- end Blog Post ./container -->

<?php get_footer();
?>