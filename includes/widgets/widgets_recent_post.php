<?php
/**
 * Recent Post Widget Class
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */


final class Astha_Recent_Post extends WP_Widget{
    
    private $description;

    public function __construct() {
        $description = array(
            'description'   =>  __( "Recent Post List", 'astha' ),
            'classname'     =>  'astha-recent-post',
            'customize_selective_refresh' => true,
        );
        
        parent::__construct(
                'astha_recent_post',
                __( 'Astha Recent Posts', 'astha' ),
                $description
                );
    }

    
    public function widget( $args, $instance ) {

        $title  = ( ! empty( $instance['title']  ) ) ? $instance['title'] : __( 'Recent Posts', 'astha' );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        $hide_date = isset( $instance['hide_date'] ) ? (bool) $instance['hide_date'] : false;
        $hide_thumbs = isset( $instance['hide_thumbs'] ) ? (bool) $instance['hide_thumbs'] : false;
        $cat    = ( ! empty( $instance['cat'] ) ) ? sanitize_text_field( $instance['cat'] ) : false;
        $post_type    = ( ! empty( $instance['post_type'] ) ) ? sanitize_text_field( $instance['post_type'] ) : false;

        $query_args = array(
            'post_type'         => $post_type,
            'post_status'       => 'publish',
            'posts_per_page'    =>  $number,
            'ignore_sticky_posts'=> true,
        );
        if( ! empty( $cat ) ){
            $cat_arr = explode(',', $cat);
            $query_args['category_name'] = $cat;
        }
        
        $query_args = apply_filters( 'astha_recent_post_args', $query_args );
        
        $posts = new WP_Query( $query_args );
        
        if ( $posts->have_posts() ) : 
            echo wp_kses_post( $args['before_widget'] );

        if ( ! empty( $title ) ) {

            echo $args['before_title'] . $title . $args['after_title'];
	}
            
        echo '<ul class="astha-recent-post-list post-type-' . esc_attr( $post_type ) . '">';
        while ($posts->have_posts()): $posts->the_post();

        $thumbnail = ASTHA_CORE_BASE_URL . 'assets/images/no-image-thumbnail.jpg';
        if( has_post_thumbnail() ){
            $thumbnail = get_the_post_thumbnail_url( null, array( 100, 100 ) );
        }
        
        $xtra_class = '';
        if( $hide_date ){
            $xtra_class .= ' hide_date ';
        }
        
        if( $hide_thumbs ){
            $xtra_class .= ' show_thumbnail ';
        }
        
        ?>

        <li class="astha-each-item <?php echo esc_attr( $xtra_class ); ?>">
            <article class="post-format-standard">
                <?php if( ! $hide_thumbs ){ ?>
                <div class="mini-post-img">
                    <a class="mini-post-image-link" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
                        <img class="astha-rcnt-post-image" 
                             src="<?php echo esc_url( $thumbnail ); ?>" 
                             width="85" height="85" alt="<?php echo esc_attr( get_the_title() ); ?>"
                             srcset="" style="will-change: auto;">
                    </a>
                </div>
                <?php } ?>
                <div class="post-content">
                    <?php if( ! $hide_date ){ ?>
                    <time class="astha-rcnt-post-time text-secondary" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><i class="far fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></time>
                    <?php } ?>
                    <a class="astha-rcnt-content-link" href="<?php echo esc_attr( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                </div>
            </article>
        </li>

            <?php
        endwhile;
        echo '</ul>';
        echo wp_kses_post( $args['after_widget'] );
        endif;
        
        //Reset postdata and query
        wp_reset_postdata();
        wp_reset_query();
    }
    
    /**
     * Outputs the settings form for the Recent Posts widget.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
            $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
            $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
            $hide_date = isset( $instance['hide_date'] ) ? (bool) $instance['hide_date'] : false;
            $hide_thumbs = isset( $instance['hide_thumbs'] ) ? (bool) $instance['hide_thumbs'] : false;
            $cat        = isset( $instance['cat'] ) ? (string) $instance['cat'] : false;
            $post_type        = isset( $instance['post_type'] ) ? (string) $instance['post_type'] : 'post';

            ?>
            <p>
                    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'astha' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>

            <p>
                    <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'astha' ); ?></label>
                    <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
            </p>
            
            
            <p>
                    <input class="checkbox" type="checkbox"<?php checked( $hide_date ); ?> id="<?php echo $this->get_field_id( 'hide_date' ); ?>" name="<?php echo $this->get_field_name( 'hide_date' ); ?>" />
                    <label for="<?php echo $this->get_field_id( 'hide_date' ); ?>"><?php _e( 'Hide post date?' ); ?></label>
            </p>
            
            
            <p>
                    <input class="checkbox" type="checkbox"<?php checked( $hide_thumbs ); ?> id="<?php echo $this->get_field_id( 'hide_thumbs' ); ?>" name="<?php echo $this->get_field_name( 'hide_thumbs' ); ?>" />
                    <label for="<?php echo $this->get_field_id( 'hide_thumbs' ); ?>"><?php _e( 'Hide post thumbnail?' ); ?></label>
            </p>
            
            <p>
                    <label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( 'Category Slug:', 'astha' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" type="text" value="<?php echo $cat; ?>" />
            </p>
            
            
            
            <p>
                    <label for="<?php echo $this->get_field_id( 'post_type' ); ?>"><?php _e( 'Post Type', 'astha' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>" type="text" value="<?php echo $post_type; ?>" placeholder="<?php _e( 'eg: post', 'astha' ); ?>" />
            </p>
            
            
            
            <?php
    }
    
    
    
    
}