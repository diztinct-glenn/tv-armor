<?php
/**
 * Loop Error Template
 *
 * Displays an error message when no posts are found.
 *
 * @package Cosmic
 * @subpackage Template
 */
?>
<div id="post-0" <?php post_class(); ?>>

	<div class="entry-content">

		<p><?php esc_html_e( 'No posts were found with the criteria specified. Try searching again.', 'livemesh-agile-shortcodes' ); ?></p>

						<?php get_search_form(); // Loads the searchform.php template. ?>

	</div><!-- .entry-content -->

</div><!-- .hentry .error -->