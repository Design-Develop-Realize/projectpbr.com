<?php
/**
 * Contribute
 */
?>

<div id="contribute" class="unicons-tab-pane">

	<h1><?php esc_html_e( 'How can I contribute?', 'unicons' ); ?></h1>

	<hr/>

	<div class="unicons-tab-pane-half unicons-tab-pane-first-half">

		<p><strong><?php esc_html_e( 'Found a bug? Want to contribute with a fix?','unicons'); ?></strong></p>

		<p><?php esc_html_e( 'Contact us!','unicons' ); ?></p>

		<p>
			<a href="<?php echo esc_url( 'http://themes4wp.com/contact/' ); ?>" class="contribute-button button button-primary"><?php printf( esc_html__( '%s contact page', 'unicons' ), 'unicons' ); ?></a>
		</p>

		<hr>

	</div>
	<div class="unicons-tab-pane-half">

		<p><strong><?php printf( esc_html__( 'Are you a polyglot? Want to translate %s into your own language?', 'unicons' ), 'unicons' ); ?></strong></p>

		<p><?php esc_html_e( 'Get involved at WordPress.org.', 'unicons' ); ?></p>

		<p>
			<a href="<?php echo esc_url( 'https://translate.wordpress.org/projects/wp-themes/unicons/' ); ?>" class="translate-button button button-primary"><?php printf( esc_html__( 'Translate %s', 'unicons' ), 'unicons' ); ?></a>
		</p>

	</div>

	<div>

		<h4><?php printf( esc_html__( 'Are you enjoying %s?', 'unicons' ), 'unicons' ); ?></h4>

		<p class="review-link"><?php printf( esc_html__( 'Rate our theme on %s. We\'d really appreciate it!', 'unicons' ), '<a href="https://wordpress.org/support/view/theme-reviews/unicons?filter=5">' . esc_html( 'WordPress.org', 'unicons' ) . '</a>' ); ?></p>

		<p><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></p>

	</div>

</div>
