			</div>
			<footer>
				<div class="margem">
					<span id="footer_left">&copy; <?php echo workspace_copyright_year();?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. <?php echo __( 'Todos os direitos reservados.', 'workspace' ); ?></span>
					<span id="footer_right"><?php printf( __( 'Desenvolvido por %s', 'workspace' ), '<a href="http://falci.me/" target="_blank">Fernando Falci</a>'); ?>.</span>
				</div>
				<div class="clear"></div>
			</footer>
		</div>
	<?php wp_footer(); ?>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-2568035-29']);
	  <?php if(is_single() || is_author()):?>
	  _gaq.push(['_setCampNameKey', 'competicao']);
	  _gaq.push(['_setCampSourceKey', 'blog']);
	  _gaq.push(['_setCampMediumKey', 'post']);
	  _gaq.push(['_setCampTermKey', 'autor']);
	  _gaq.push(['_setCampContentKey', '<?php the_author();?>']);
	  <?php endif;?>
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	</body>
</html>