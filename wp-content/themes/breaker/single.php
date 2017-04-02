<?php
/**
 * The main template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme-template
 */

get_header(); ?>
    <h3 class="section-name container"><?php the_field(directors_section, 7); ?></h3>
    <div class="single-director">
        <div class="container flex">
        <?php
        // output posts
        if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
                <div class="avatar-wrap">
                <?php
                $image = get_field('avatar');
                if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" class="avatar-img" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>
                <h2><?php the_title(); ?></h2>
                </div>
                <div class="description-wrap">
                    <p><?php the_field(description)?></p>
                    <div class="videos-wrap">
                        <span><?php the_field(work_title, 7)?></span>
                        <?php

                        // check if the repeater field has rows of data
                        if( have_rows('directors_video_fields') ):
                        ?>
                        <ul>
                            <?php
                            // loop through the rows of data
                            while ( have_rows('directors_video_fields') ) : the_row();
                                ?>
                                <li>
                                    <a data-fancybox href="<?php the_sub_field('directors_video_url'); ?>"><?php the_sub_field('video_title')?></a>
                                </li>
                            <?php

                            endwhile;

                        else :

                            // no rows found

                        endif;

                        ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php wp_reset_query(); ?>
        </div>
    </div>

<?php get_footer(); ?>