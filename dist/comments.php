<?php

if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _n( 'Um coment&aacute;rio:', '%1$s coment&aacute;rios:', get_comments_number(), 'workspace' ), get_comments_number());
			?>
		</h2>

			<?php wp_list_comments( array( 'callback' => 'workspace_comment' ) ); ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Coment&aacute;rios', 'workspace' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Coment&aacute;rios antigos', 'workspace' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Novos coment&aacute;rios &rarr;', 'workspace' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Coment&aacuterios fechados.' , 'workspace' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments .comments-area -->