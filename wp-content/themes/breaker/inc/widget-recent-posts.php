<?php
/**
 * WordPress widget class
 *
 * Creates a sample widget "Widget Widget Recent Posts" with a title and recent posts output
 */

class widget_recent_post extends WP_Widget {

    public function __construct() {
        $widget_ops = array('classname' => 'widget widget_recent_entries', 'description' => 'Displays an recent posts' );
        $this->WP_Widget('widget_recent_post', 'Widget recent post', $widget_ops);
    }

    function widget($args, $instance) {
        // PART 1: Extracting the arguments + getting the values
        extract( $args );
        $amount_of_recent_posts = $instance['amount_of_recent_posts'];

        // Before widget code, if any
        echo (isset($before_widget)?$before_widget:'');

        // PART 2: The title and the text output
        echo ( '<div class="widget-recent-post">' );
        if ( !empty($amount_of_recent_posts) ){
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $amount_of_recent_posts,
                'orderby'   => 'date',
                'order' => 'DESC'
            );

            $query = new WP_Query( $args );

// Цикл
            if ( $query->have_posts() ) {
                echo '<ul class="recent-post-list">';
                while ( $query->have_posts() ) {
                    $query->the_post(); ?>
                    <li>
                        <a data-fancybox href="<?php the_field('remote_url')?>" class="block">
                            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
                            <h4><?php the_title() ?></h4>
                        </a>
                    </li>
                <?php
                }
                echo '</ul>';
            } else {
                // Постов не найдено
            }
            /* Возвращаем оригинальные данные поста. Сбрасываем $post. */
            wp_reset_postdata();

        }

        // After widget code, if any
        echo (isset($after_widget)?$after_widget:'');
    }

    public function form( $instance ) {

        // PART 1: Extract the data from the instance variable
        $instance = wp_parse_args( (array) $instance, array( 'amount_of_recent_posts' => '') );
        $amount_of_recent_posts = $instance['amount_of_recent_posts'];


        // PART 2-3: Display the fields
        ?>
        <!-- PART 2: Widget Title field START -->
        <p>
            <label for="<?php echo $this->get_field_id('amount_of_recent_posts'); ?>">Amount of recent posts:
                <input class="widefat" id="<?php echo $this->get_field_id('amount_of_recent_posts'); ?>"
                       name="<?php echo $this->get_field_name('amount_of_recent_posts'); ?>" type="number" min="3" max="6"
                       value="<?php echo ($amount_of_recent_posts); ?>" />
            </label>
        </p>
        <!-- Widget Title field END -->
        <?php

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['amount_of_recent_posts'] = $new_instance['amount_of_recent_posts'];
        return $instance;
    }
}

add_action( 'widgets_init', create_function('', 'return register_widget("widget_recent_post");') );
?>