<?php get_header(); ?>
				<section id="content" class="post">
					<?php while ( have_posts() ) : the_post(); ?>
					<article class="bg-gradiente">
						<header>
							<div class="header-float">
								<h1><?php the_title(); ?></h1>
								<span class="meta-title"><?php workspace_meta();?> <?php workspace_categorias();?></span>
							</div>
							<!-- <div class="comentarios-count"><a href="#comments"><?php comments_number( '0', '1', '%' ); ?></a></div> -->
							<div class="clear"></div>
						</header>
						<div class="post-content">
							<div class="thumb">
								<?php the_post_thumbnail(); ?>
							</div>
						
							<?php the_content(' '); ?>
						</div>
						<div class="clear"></div>
					</article>
					
					<div style="width:615px;margin: -3px auto 0 auto;">
						<script type="text/javascript"><!--
							google_ad_client = "ca-pub-8615389280025105";
							/* Workspace - Post Quadrado */
							google_ad_slot = "2646955202";
							google_ad_width = 300;
							google_ad_height = 250;
							//-->
						</script>
						<!-- <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
						<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script> -->
					</div>
					<section class="author bg-gradiente">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), 120 ); ?>
						</a>
						<h2><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author(); ?></a></h2>
						<span class="meta"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">Veja todos os posts</a></span>
						<p><?php echo get_the_author_meta( 'description' );?></p>
						<div class="clear"></div>
					</section>
					
					<div class="comentarios">
						<!--<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="645" data-num-posts="10"></div>-->
						<?php comments_template( '', true ); ?>
					</div>
					<?php endwhile; ?>
				</section>
<?php get_sidebar(); ?>		

				<div style="width: 100%">
					<script type="text/javascript"><!--
						google_ad_client = "ca-pub-8615389280025105";
						/* Workspace - Rodapé */
						google_ad_slot = "3984087601";
						google_ad_width = 728;
						google_ad_height = 90;
						//-->
					</script>
					<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
				</div>
<?php get_footer(); ?>