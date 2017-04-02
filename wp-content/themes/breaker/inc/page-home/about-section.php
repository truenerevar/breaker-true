<div class="container about">
    <?php $query = new WP_Query( array(
        'post_type' => 'about',
        'order'   => 'ASC'
    ) );

    while ( $query->have_posts() ) {
        $query->the_post(); ?>
        <div class="about-content">
            <?php the_content();?>
        </div>
    <?php } wp_reset_postdata(); ?>
</div>