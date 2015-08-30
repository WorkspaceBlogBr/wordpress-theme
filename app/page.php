<?php get_header(); ?>
				<section id="content" class="post">
					<?php while ( have_posts() ) : the_post(); ?>
					<article class="bg-gradiente">
						<header>
							<div class="header-float">
								<h1><?php the_title(); ?></h1>
								<span class="meta"><?php workspace_data_post();?></span>
							</div>
							<div class="clear"></div>
						</header>
						<div class="post-content">
							<?php the_content(' '); ?>
						</div>
						<div class="clear"></div>
					</article>
					
					<?php endwhile; ?>
				</section>
<?php get_sidebar(); ?>		
<?php get_footer(); ?>