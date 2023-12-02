<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MultimedijalniSistemi
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
<style>
/* Style for Population */
.population {
    background-color: #f1f1f1;
    padding: 10px;
}

/* Style for Land Area */
.land-area {
    background-color: #e0e0e0;
    padding: 10px;
}

/* Style for Local Time */
.local-time {
    background-color: #d0d0d0;
    padding: 10px;
}

/* Style for ZIP Codes */
.zip-codes {
    background-color: #c0c0c0;
    padding: 10px;
}

/* Style for Weather */
.weather {
    background-color: #b0b0b0;
    padding: 10px;
}



</style>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				multimedijalnisistemi_posted_on();
				multimedijalnisistemi_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php
	if (has_post_thumbnail()) {
		echo '<div class="post-thumbnail">';
		echo get_the_post_thumbnail(get_the_ID(), 'custom-size', array('class' => 'slika', 'alt' => 'food'));
		echo '</div>';
	}
	?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'multimedijalnisistemi' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
		<div class="basic">
		<div class="population">
        <h2>Description: <?php echo get_field('description'); ?> </h2>
    </div>
    <div class="population">
        <h2>Population: <?php echo get_field('population'); ?> </h2>
    </div>

    <div class="land-area">
        <h2>Land Area: <?php echo get_field('land_area'); ?> </h2>
    </div>

    <div class="local-time">
        <h2>Local time: <?php echo get_field('local_time'); ?> </h2>
    </div>

    <div class="zip-codes">
        <h2>ZIP Codes: <?php echo get_field('zip_codes'); ?> </h2>
    </div>

    <div class="weather">
        <h2>Weather: <?php echo get_field('weather'); ?> </h2>
    </div>
</div>
		
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'multimedijalnisistemi' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php multimedijalnisistemi_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
