<?php get_header(); ?>
				<section id="content" class="list">
				<?php

				$list = get_users('exclude=1&orderby=post_count,display_name&posts_per_page=7');
				foreach($list as $author):
						$total = count_user_posts($author->id);

				?>
						<section class="author bg-gradiente">
								<a href="<?php echo get_author_posts_url($author->id);?>" rel="bookmark"><?php echo get_avatar($author->id, 120,'http://workspace.blog.br/wp-content/themes/workspace/images/sem-foto.png'); ?></a>
								<h2><a href="<?php echo get_author_posts_url($author->id);?>" rel="bookmark"><?php echo $author->display_name; ?></a></h2>
								<?php workspace_author_links($author->id); ?>
								<p><?php echo get_the_author_meta( 'description', $author->id );?></p>
								<span class="meta"><a href="<?php echo get_author_posts_url($author->id);?>" rel="bookmark"><?php printf(_n('1 post', '%s posts', $total), $total); ?></a></span>
								<div class="clear"></div>
						</section>

				<?php endforeach; ?>

						<div id="paginacao">
								<?php next_posts_link( __( '<span class="antigos">&laquo; </span>', 'workspace' ) ); ?>
								<?php previous_posts_link( __( '<span class="novos">&raquo;</span>', 'workspace' ) ); ?>
								<div class="clear"></div>
						</div>


				</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
