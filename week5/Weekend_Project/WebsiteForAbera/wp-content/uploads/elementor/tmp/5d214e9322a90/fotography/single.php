<?php
/**
* The template for displaying all single posts.
*
* @package FotoGraphy
*/
get_header();

$post_format = get_post_format();

if($post_format != 'image'){
do_action('fotography_title');
} 
?>

<div class="foto-container clearfix">
  <div id="primary" class="content-area">
     <?php while (have_posts()) : the_post(); ?>
         <?php get_template_part('template-parts/content', 'single'); ?>
        
         <?php the_post_navigation(); ?>

     <?php endwhile; // End of the loop. ?>
  </div>

  <?php 
  if($post_format != 'image'){
    get_sidebar(); 
  }
  ?>  
</div>

<?php get_footer(); ?> 