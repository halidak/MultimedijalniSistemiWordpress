<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mms
 */

?>
<style>
	.site-footer{
		background-color: #8A70C2;
		bottom: 0;
		width: 100%;
		color: blue;
		padding: 0 20px;
		position: absolute;
	}
	.site-info{
		margin: auto;
		display: flex;
		justify-content: center;
		
	}
	h3{
		color : #fff;
	}
</style>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<h3>Home</h3>
			</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
