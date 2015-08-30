<?php get_header(); ?>
				<section id="content" class="list">
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					
					<article>
						<div class="thumb">
							<a href="<?php the_permalink(); ?>">
								<?php workspace_thumbnail(); ?>
							</a>
						</div>
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<h6><?php workspace_meta();?></h6>
						<?php the_excerpt(); ?>
						<div class="article-footer">
							<span><?php workspace_categorias();?></span>
							<div class="comentarios-count"><a href="<?php the_permalink(); ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></div>
						</div>
					</article>
					
				<?php endwhile; ?>
					
					<div id="paginacao">
						<?php next_posts_link( __( '<span class="antigos">&laquo; Posts mais antigos</span>', 'workspace' ) ); ?>
						<?php previous_posts_link( __( '<span class="novos">Posts mais novos &raquo;</span>', 'workspace' ) ); ?>
						<div class="clear"></div>
					</div>
					
				<?php else: ?>
				<h1><?php echo __('Nenhum post encontrado', 'workspace'); ?></h1>
				
				<?php endif; ?>
				
				</section>
<?php get_sidebar(); ?>		
<?php get_footer(); ?>