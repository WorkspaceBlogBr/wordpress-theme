
				<nav id="sidebar">
					<section>
						<div class="content adsense">
							<script type="text/javascript"><!--
								google_ad_client = "ca-pub-8615389280025105";
								/* Workspace */
								google_ad_slot = "6450300008";
								google_ad_width = 250;
								google_ad_height = 250;
								//-->
							</script>
							<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
						</div>
					</section>
					<section>
						<ul class="subscribe_icons">
							<li class="github"><a href="https://github.com/WorkspaceBlogBr" rel="nofollow">GitHub</a>
							<li class="twitter"><a href="https://twitter.com/WorkspaceBlogBr" rel="nofollow">Twitter</a>
							<li class="facebook"><a href="https://www.facebook.com/workspace.blog.br" rel="nofollow">Facebook</a>
							<li class="rss"><a href="http://feeds.feedburner.com/WorkspaceBlogBr" rel="nofollow">RSS</a>
						</ul>
					</section>
					<section class="nobg">
						<ul class="tab">
							<li class="active"><a href="#autor">Autor</a>
							<li><a href="#popular">Popular</a>
							<li><a href="#comentarios">Comentários</a>
							<li><a href="#tags">Tags</a>
						</ul>
						<div class="tab autor active">
							<?php workspace_sidebar_author(); ?>
						</div>
						<div class="tab popular">
							<?php workspace_sidebar_popular(); ?>
						</div>
						<div class="tab comentarios">
							<?php workspace_sidebar_comments(); ?>
						</div>
						<div class="tab tags">	
							<div class="content">
								<?php wp_tag_cloud(); ?>
							</div>
						</div>
						<div class="clear"></div>
					</section>
					<section class="fb-like">
						<h2 class="bg-gradiente">Facebook</h2>
						<div class="bg-gradiente">
						    <div class="fb-margem">
								<div class="fb-like-box" data-href="http://www.facebook.com/workspace.blog.br" data-width="300" data-show-faces="true" data-stream="false" data-header="false" data-border-color="#D0D0D0"></div>
							</div>
						</div>
					</section>
				</nav>