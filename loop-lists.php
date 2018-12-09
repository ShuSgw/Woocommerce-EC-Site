<?php
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 10,
        );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
        ++$counter; ?>
        <?php if (wp_is_mobile()) : ?>
        <div class="thumbs__thumb">
            <div class="thumbs__thumb__box">
                <h2><?php the_title('<h2 class="thumbs__thumb__title">', '</h2>'); ?></h2>
                <p class="thumbs__thumb__content"><?php  echo mb_substr(get_the_excerpt(), 0, 30); ?>...</p>
                <a class="thumbs__thumb__detailsBtn" href=<?php the_permalink(); ?>>See details</a>
            </div>
            <?php the_post_thumbnail('normal'); ?>
        </div>
        <?php else: ?>
        <div class="thumbs__thumb">
            <div class="thumbs__thumb__box">
                <h2><?php the_title('<h2 class="thumbs__thumb__title">', '</h2>'); ?></h2>
                <p class="thumbs__thumb__content"><?php  echo mb_substr(get_the_excerpt(), 0, 30); ?>...</p>
                <a class="thumbs__thumb__detailsBtn" href=<?php the_permalink(); ?>>See details</a>
            </div>
            <div class="thumbs__thumb__image">
                <?php if ($counter == 1) :?>
                    <?php the_post_thumbnail('normal'); ?>
                <?php elseif ($counter == 2) :; ?>
                    <?php the_post_thumbnail('small'); ?>
                <?php elseif ($counter == 3) :; ?>
                    <?php the_post_thumbnail('small'); ?>
                <?php elseif ($counter == 4) :; ?>
                    <?php the_post_thumbnail('long'); ?>
                <?php elseif ($counter == 5) :; ?>
                    <?php the_post_thumbnail('small'); ?>
                <?php elseif ($counter == 6) :; ?>
                    <?php the_post_thumbnail('small'); ?>
                <?php elseif ($counter == 7) :; ?>
                    <?php the_post_thumbnail('long'); ?>
                <?php elseif ($counter == 8) :; ?>
                    <?php the_post_thumbnail('big'); ?>
                <?php elseif ($counter == 9) :; ?>
                    <?php the_post_thumbnail('small'); ?>
                <?php elseif ($counter == 10) :; ?>
                    <?php the_post_thumbnail('small'); ?>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    <?php
        endwhile;
    else:
        echo __('No products found');
    endif;
    wp_reset_postdata();

// add_image_size('normal', 536, 307, true);
// add_image_size('long', 260, 691, true);
// add_image_size('small', 260, 307, true);
// add_image_size('big', 536, 627, true);
// if ($hoge == 1):
//  $foo = 1;
//  else:
//  $foo = 2 ;
//  endif;

// wc_get_template_part('content', 'product');
