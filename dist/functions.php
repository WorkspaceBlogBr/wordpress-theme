<?php

function workspace_setup(){
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 200, 200 );
	
}
add_action( 'after_setup_theme', 'workspace_setup' );

function workspace_data_post($print=true){
	$html = sprintf('<time class="entry-date" datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	
	if($print){
		print $html;
	} else {
		return $html;
	}
	
}

function workspace_copyright_year(){
	$atual = date("Y");
	if( $atual == 2013){
		return 2013;
	}
	
	return "2013 - $atual";
}

function workspace_meta(){
	$autor_posts_link = sprintf('<a href="%1$s" title="%2$s" rel="author">%3$s</a>', 
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
		sprintf( __('Veja mais posts de %s','workspace'), get_the_author()), 
		get_the_author() 
	);
	
	$data = workspace_data_post(false);
		
	printf( __('Postado por %1$s em %2$s.','workspace'), $autor_posts_link, $data);
}

function workspace_categorias(){
	printf( __('Categoria(s): %s', 'workspace'), get_the_category_list( __( ', ', 'workspace' ) ));
}

function workspace_thumbnail(){
	if ( has_post_thumbnail() ) {
		the_post_thumbnail();
		
	} else {
		$category_name = get_the_category();
		$category_name = $category_name[0]->slug;
		printf('<img width="200" src="%s/images/category/%s.png" />', get_bloginfo( 'stylesheet_directory' ), $category_name);
	}
}

function workspace_author_links($id = null){
	$email = get_the_author_meta( 'user_email', $id );
	$skype = get_the_author_meta( 'skype', $id );
	$face = get_the_author_meta( 'facebook', $id );
	$in = get_the_author_meta( 'linkedin', $id );
	$skype = get_the_author_meta( 'skype', $id );
	$site  = get_the_author_meta( 'url', $id );
	
	$html  = '<ul class="autor-links">';
	if($email) $html .= sprintf('<li class="email"><a href="mailto:%1$s" target="_blank">%1$s</a></li>', $email);
	if($site) $html .= sprintf('<li class="site"><a href="%1$s" target="_blank">%1$s</a></li>', $site);
	if($in) $html .= sprintf('<li class="linkedin"><a href="http://br.linkedin.com/in/%1$s/" target="_blank">%1$s</a></li>', $in);
	if($skype) $html .= sprintf('<li class="skype"><a href="skype:%1$s?call">%1$s</a></li>', $skype);
	if($face) $html .= sprintf('<li class="facebook"><a href="http://fb.com/%1$s" target="_blank">%1$s</a></li>', $face);
	$html .= '</ul>';
	
	print $html;
}

function workspace_sidebar_author(){

	print '<ul>';
	$list = get_users('exclude=1&orderby=post_count&posts_per_page=7');
	
	foreach($list as $author){
		$total = count_user_posts($author->id);
		if($total < 1) continue;
		printf('<li><a href="%1$s" rel="bookmark">%2$s</a><div class="info"><a href="%1$s" rel="bookmark">%3$s</a><span class="meta"><a href="%1$s" rel="bookmark">%4$s<a/></span></div></li>',
				 get_author_posts_url($author->id), 
				 get_avatar($author->id, 54), 
				 $author->display_name, 
				 sprintf(_n('1 post', '%s posts',$total),$total) 
		);
	}
	
	print '</ul>';
}

function workspace_sidebar_popular(){
	print '<ul>';

	$popular = new WP_Query('orderby=comment_count&posts_per_page=7');
	while ($popular->have_posts()) : 
		$popular->the_post(); ?>
		
			<li>
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php workspace_thumbnail();?></a>
				<div class="info">
					<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title();?></a>
					<span class="meta"><a href="<?php the_permalink() ?>#comments"><?php comments_number('0 coment&aacute;rio','1 coment&aacute;rio','% coment&aacute;rios'); ?><a/></span>
				</div>
			</li> 
	<?php endwhile;
	print '</ul>';
}

function workspace_sidebar_comments(){
	print '<ul>';
	$comentarios = get_comments( 'status=approve&number=10' );
	
	foreach($comentarios as $comm): 	
	
		$url = get_permalink($comm->comment_post_ID).'#comment-'.$comm->comment_ID;
		$comm_txt = strlen($comm->comment_content) > 100? substr($comm->comment_content,0,100).'...':$comm->comment_content;
		
		?>	
		<li>
			<a href="<?php echo $url ?>" rel="bookmark"><?php echo get_avatar($comm->comment_author_email, 54);?></a>
			<div class="info nohover">
				<a href="<?php echo $url ?>" rel="bookmark"><strong><?php echo $comm->comment_author ?>:</strong> <?php echo $comm_txt;?></a>
				<span class="meta"><a href="<?php echo $url ?>"><?php comment_date( 'd/m/Y H:i', $comm ); ?><a/></span>
			</div>
		</li> 
			
	<?php endforeach;
	print '</ul>';

}

function workspace_title(){
	if(is_category()){
		echo get_category(get_query_var('cat'),false)->name;
		
	} elseif(is_author()){
		if(get_query_var('author_name')) :
			$curauth = get_user_by('slug', get_query_var('author_name'));
		else :
			$curauth = get_userdata(get_query_var('author'));
		endif;
		echo $curauth->display_name;

	} elseif( is_single() ){
		the_title();
		echo " | ";
		$post = get_post(get_query_var('id'));
		echo get_userdata($post->post_author)->display_name;
	
	} elseif(is_page()){
		the_title();
		
	}
	
	echo " | ";
	bloginfo( 'name' );
}

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
	<h3><?php _e("Informa&ccedil;&otilde;es Adicionais", "workspace"); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="facebook">Facebook</label></th>
			<td>
			<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description"><?php printf(__('Exemplo: %s', 'workspace'), 'http://facebook.com/<strong>workspace.blog.br</strong>'); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="skype">Skype</label></th>
			<td>
			<input type="text" name="skype" id="skype" value="<?php echo esc_attr( get_the_author_meta( 'skype', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description"><?php _e("Por favor informe o seu Skype"); ?></span>
			</td>
			</tr>
		<tr>
			<th><label for="linkedin">Linkedin</label></th>
			<td>
			<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description"><?php printf(__('Exemplo: %s', 'workspace'), 'http://br.linkedin.com/in/<strong>fernandofalci</strong>/'); ?></span>
			</td>
		</tr>
	</table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

	$face     = str_replace(array("http:", "https:", "fb.com", "facebook.com", "/"), "", $_POST['facebook']);
	$linkedin = str_replace(array("http:", "https:", "br.", "linkedin.com", "/in/", "/"), "", $_POST['linkedin']);
	
	update_user_meta( $user_id, 'facebook', $face );
	update_user_meta( $user_id, 'linkedin', $linkedin );
	update_user_meta( $user_id, 'skype', $_POST['skype'] );
}

add_filter('comment_form_default_fields', 'workspace_comment_changes'); 
function workspace_comment_changes( $my_fields ) {
	$my_fields['author'] = str_replace('/>', ' required />', $my_fields['author']);
	$my_fields['email'] = str_replace(array('/>', 'type="text"'), array(' required />', 'type="email"'), $my_fields['email']);
	$my_fields['url'] = str_replace('type="text"', 'type="url"', $my_fields['url']);

    return $my_fields;
}


if ( ! function_exists( 'workspace_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own workspace_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function workspace_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'workspace' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'workspace' ), '<span class="edit-link">', '</span>' ); ?></p>
	</div>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						( $comment->comment_author_email === get_the_author_meta( 'user_email' ) ) ? '<small>(' . __( 'Autor', 'workspace' ) . ')</small>' : ''
					);
					
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s as %2$s', 'workspace' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Editar', 'workspace' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Seu coment&aacute;rio est&aacute; aguardando aprova&ccedil;&atilde;o.', 'workspace' ); ?></p>
			<?php endif; ?>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Responder', 'workspace' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;