 <?php
/**
 * The template for Comments.
 *
 */


// Bail if password protected and user hasn't entered password
if ( post_password_required() ) return;

// Comments are closed and empty, do nothing
if ( !comments_open() && get_comment_pages_count() == 0 ) return; ?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) { ?>
		<h2 id="comments-title" class="heading">
			<span>
				<?php
				// Display Comments Title
				$comments_number = number_format_i18n( get_comments_number() );
				if ( '1' == $comments_number ) {
					$comments_title = __( 'This article has 1 comment', 'pg' );
				} else {
					$comments_title = sprintf( __( 'This article has %s comments', 'pg' ), $comments_number );
				}
				$comments_title = apply_filters( 'pg_comments_title', $comments_title );
				echo $comments_title; ?>
			</span>
		</h2>
		<ol class="commentlist">
			<?php wp_list_comments( array(
				'callback'	=> 'pg_comment',
			) ); ?>
		</ol><!-- .commentlist -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<nav class="navigation comment-navigation row clr" role="navigation">
				<h4 class="assistive-text section-heading heading"><span><?php _e( 'Comment navigation', 'pg' ); ?></span></h4>
				<div class="nav-previous span_12 col clr-margin"><?php previous_comments_link( __( '&larr; Older Comments', 'pg' ) ); ?></div>
				<div class="nav-next span_12 col"><?php next_comments_link( __( 'Newer Comments &rarr;', 'pg' ) ); ?></div>
			</nav>
		<?php } ?>
	<?php } // have_comments() ?>
	<?php comment_form(); ?>
</div><!-- #comments -->