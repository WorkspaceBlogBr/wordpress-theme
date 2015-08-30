<?php get_header(); ?>
				<section id="content" class="list">
				<?php if ( have_posts() ) : ?>
							
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if(!$_i++):?>
					<section class="author bg-gradiente">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), 120 ); ?>
						<h2><?php the_author(); ?></h2>
						<p><?php echo get_the_author_meta( 'description' );?></p>
						<?php workspace_author_links(); ?>
						<span class="meta"><?php printf(_n('1 post', '%s posts', get_the_author_posts()), get_the_author_posts()); ?></span>
						<div class="clear"></div>
					</section>
					<?php endif;?>
					
					<article>
						<div class="thumb">
							<a href="<?php the_permalink(); ?>">
								<?php workspace_thumbnail(); ?>
							</a>
						</div>
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<h6><?php workspace_data_post();?></h6>
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
				<h1><?php echo __('Este autor ainda n&atilde;o fez nenhum post', 'workspace'); ?></h1>
				
				<?php endif; ?>
				
				</section>
<?php get_sidebar(); ?>		
<?php get_footer(); ?>