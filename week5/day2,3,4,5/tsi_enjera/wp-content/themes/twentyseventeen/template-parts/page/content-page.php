<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php twentyseventeen_edit_link( get_the_ID() ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
					'after'  => '</div>',
				)
			);
			?>


	<div class ="entry-image">
	<img  class ="entry-image-Style" src ="http://www.recipe4living.com/assets/itemimages/400/400/3/default_200823933d6af23cbeaec570c38d8737_dreamstimesmall_33679038.jpg" width ="70px" >
	<img  class ="entry-image-Style" src ="http://www.recipe4living.com/assets/itemimages/400/400/3/default_200823933d6af23cbeaec570c38d8737_dreamstimesmall_33679038.jpg"  width ="70px">
	<img  class ="entry-image-Style" src ="http://www.recipe4living.com/assets/itemimages/400/400/3/default_200823933d6af23cbeaec570c38d8737_dreamstimesmall_33679038.jpg"  width ="70px">
	</div>
	</div><!-- .entry-content -->
	
</article><!-- #post-<?php the_ID(); ?> -->
