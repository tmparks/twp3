<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="tile"><?php the_post_thumbnail(); ?><br/><?php the_title(); ?></div>
<?php endwhile; ?>
<?php else : ?>
<?php _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); ?>
<?php endif; ?>
<?php get_footer(); ?>
