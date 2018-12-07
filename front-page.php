<?php get_header(); ?>
<?php echo do_shortcode('[metaslider id="2041"]'); ?>
<?php //echo do_shortcode('[metaslider id="160"]');?>
<div id="page" class="hfeed site">
    <div class="thumbs">
        <?php get_template_part('loop', 'lists'); ?>
    </div>
<?php get_footer(); ?>

