<h3 class="section-name container"><?php the_field(directors_section, 7); ?></h3>
<div class="directors">
    <?php $query = new WP_Query( array(
        'post_type' => 'directors',
        'order'   => 'ASC'
    ) );
    ?>
    <ul class="directors-list">
        <?php
        while ( $query->have_posts() ) {
            $query->the_post(); ?>
            <li class="directors-info">
                <ul>
                    <li><h4 class="director"><?php the_title()?></h4></li>
                    <li><a data-fancybox href="<?php the_field('directors_video')?>"><div class="image-wrap"><?php the_post_thumbnail() ?></div></a></li>
                    <li><a href="<?php the_permalink()?>"><p class="bio"><?php the_field( 'directors_bio' ); ?></p></a></li>
                </ul>
            </li>
        <?php } wp_reset_postdata(); ?>
    </ul>
</div>