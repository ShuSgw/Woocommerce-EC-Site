<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()):the_post(); ?>
<div class="prof">
    <?php the_post_thumbnail('pageThum'); ?>
    <div class="prof__description">
        <h2 class="prof__description__title"><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>​
