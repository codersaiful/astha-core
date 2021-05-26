<?php
/**
 * Recent Post Widget Class
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */


final class Astha_Feedback extends WP_Widget{
    

    /**
     * Constructor
     */
    public function __construct() {
        
        $description = array(
            'description'   =>  __( "Feedback Form", 'astha' ),
            'classname'     =>  'astha-feedback-form',
            'customize_selective_refresh' => true,
        );
        
        parent::__construct(
                'Astha_Feedback',
                __( 'Astha Feedback Form', 'astha' ),
                $description
                );
    }
    
    public function widget( $args, $instance ) {
        
        //var_dump($args, $instance);
        $title  = ( ! empty( $instance['title']  ) ) ? $instance['title'] : __( 'Need Advice?', 'astha' );
        $code = ( ! empty( $instance['code'] ) ) ? $instance['code'] : '';
        echo wp_kses_post( $args['before_widget'] );
        if( ! empty( $code ) ){
        ?>
        <div class="feedback-widget default">
            <h2 class="custom-widget-title"><?php echo esc_html( $title );?></h2>
            <?php
            echo do_shortcode( $code );
            ?>
        </div>
        <?php
        }
        echo wp_kses_post( $args['after_widget'] );
    }
    
    public function form( $instance ) {

        $default = array(
            'title'     =>  '',
            'code'    =>  '',
        );
        $instance = wp_parse_args( $instance, $default );

        $title  = ( ! empty( $instance['title']  ) ) ? $instance['title'] : __( 'Need Advice?', 'astha' );
        $code = ( ! empty( $instance['code'] ) ) ? $instance['code'] : '';

        ?>
            <p>
                <label
                    for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                    >
                    <?php echo esc_html__( 'Title', 'astha' ); ?>
                </label>
                <input type="text" 
                       class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                       value="<?php echo esc_attr( $title ); ?>">
            </p>
            
            <p>
                <label
                    for="<?php echo esc_attr( $this->get_field_id( 'code' ) ); ?>"
                    >
                    <?php echo esc_html__( 'Paste Your Shortcode', 'astha' ); ?>
                </label>
                <textarea type="text" 
                       class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'code' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'code' ) ); ?>"
                       style="width: 100%;min-height: 200px;"
                       ><?php echo wp_kses_post( $code ); ?></textarea>
            </p>    
            
        <?php
    }
    
    public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['code'] = !empty( $new_instance['code'] ) ? $new_instance['code'] : '';
		return $instance;
    }
}