<?php get_header();
 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<h2>
    <?php the_title() ?>
</h2>


<?php the_content() ?>





<?php endwhile; else: ?>
<p><?php _e('Pas d\'article(s) à afficher'); ?></p>
<?php endif; ?>

<?php get_footer();?>
