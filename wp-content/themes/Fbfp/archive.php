<?php get_header();?>
<div class="contenu">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>

    <div class="image">
        <?php the_post_thumbnail() ?>
         
        <div class="resumimg">
        
            <h2><?php the_title();?></h2>

            <?php the_excerpt();?>
            
        </div>
    </div>
<?php endwhile; else: ?>
    <p><?php _e('Pas d\'article(s) à afficher'); ?></p>
<?php endif; ?>

</div>

<?php
paginate_links();
get_footer();?>
