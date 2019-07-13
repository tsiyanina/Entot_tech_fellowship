<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package FotoGraphy
 */
get_header();
?>

<header class="page-header">
    <h1 class="page-title">
        <?php esc_html_e('Oops! That page can&rsquo;t be found.', 'fotography'); ?>
    </h1>
    <?php fotography_pro_breadcrumbs(); ?>
</header> 

<div class="foto-container clearfix">
    <div class="number404">
        <?php esc_html_e('404','fotography'); ?>
        <span><?php esc_html_e('error','fotography'); ?></span>   
    </div>
</div>

<?php get_footer(); 