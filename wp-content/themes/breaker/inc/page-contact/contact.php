<section>
    <h3 class="section-name container"><?php the_field(contacts_header, 11); ?></h3>
    <div class="contact-wrap">
        <?php $query = new WP_Query( array(
            'post_type' => 'contact',
            'order'   => 'ASC'
        ) );
        ?>
        <ul class="contact-list container">
            <?php
        while ( $query->have_posts() ) {
            $query->the_post(); ?>
            <li class="contact-element">
                <?php the_post_thumbnail() ?>
                <h4><?php the_title()?></h4>
                <div class="contacts">
                    <?php the_content();?>
                </div>
            </li>
        <?php } wp_reset_postdata(); ?>
        </ul>
    </div>
    <div class="contact-member">
        <?php $query = new WP_Query( array(
            'post_type' => 'members',
            'order'   => 'ASC'
        ) );
        ?>
        <ul class="contact-list container">
            <?php
            while ( $query->have_posts() ) {
                $query->the_post(); ?>
                <li class="contact-element member-contacts">
                    <h4><?php the_title()?></h4>
                    <div class="contacts">
                        <?php the_content();?>
                    </div>
                </li>
            <?php } wp_reset_postdata(); ?>
        </ul>
    </div>
</section>