<?php
/**
 * Recent Post Widget Class
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */


final class Astha_Newsletter_Wid extends WP_Widget{
    

    /**
     * Constructor
     */
    public function __construct() {
        
        $description = array(
            'description'   =>  __( "Newsletter", 'astha' ),
            'classname'     =>  'astha-newsletter',
            //'customize_selective_refresh' => true,
        );
        
        parent::__construct(
                'Astha_Newsletter_Wid',
                __( 'Astha Newsletter Box', 'astha' ),
                $description
                );
    }
    
    public function widget( $args, $instance ) {
        
//        var_dump($args, $instance);
        $title  = ( ! empty( $instance['title']  ) ) ? $instance['title'] : ''; //__( 'Join Our Newsletter', 'astha' )
        $code = ( ! empty( $instance['code'] ) ) ? $instance['code'] : '';
        $description = ( ! empty( $instance['description'] ) ) ? $instance['description'] : '';
        $bg_url = ( ! empty( $instance['bg_url'] ) ) ? $instance['bg_url'] : ''; 
        echo wp_kses_post( $args['before_widget'] );

        ?>
            <div class="newsletter-box" style="background-image: url(<?php echo esc_attr( $bg_url ); ?>)">
                <?php if( ! empty( $title ) ){
                ?>
                    <h2><?php echo esc_html( $title ); ?></h2>    
                <?php
                } ?>
                <?php if( ! empty( $description ) ){
                ?>
                    <p><?php echo esc_html( $description ); ?></p>    
                <?php
                } ?>
                <?php if( ! empty( $code ) ){
                    echo do_shortcode( $code );
                } ?>
            </div>
        <?php
        echo wp_kses_post( $args['after_widget'] );
        }
    
    public function form( $instance ) {

        $default = array(
            'title'     =>  '',
            'description'     =>  __( 'Lend us your email and we\'ll keep you in touch on our product launch. And we promise no spam.', 'astha' ),
            'code'    =>  '',
            'bg_url'    =>  esc_attr( get_template_directory_uri() ) . '/assets/images/newsletter_bg.jpg',
        );
        $instance = wp_parse_args( $instance, $default );

        $title  = ( ! empty( $instance['title']  ) ) ? $instance['title'] : "";
        $description  = ( ! empty( $instance['description']  ) ) ? $instance['description'] : '';
        $code = ( ! empty( $instance['code'] ) ) ? $instance['code'] : '';
        $bg_url = ( ! empty( $instance['bg_url'] ) ) ? $instance['bg_url'] : ''; ?>
            <p class="astha-admin-widget-item">
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                    <?php echo esc_html__( 'Title', 'astha' ); ?>
                </label>
                <input type="text" 
                       class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                       value="<?php echo esc_attr( $title ); ?>" />
            </p>
            
            <p class="astha-admin-widget-item">
                <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>">
                    <?php echo esc_html__( 'Intro Text', 'astha' ); ?>
                </label>
                <textarea 
                       class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_html( $description ); ?></textarea>
            </p>    
            
            <p class="astha-admin-widget-item">
                <label for="<?php echo esc_attr( $this->get_field_id( 'code' ) ); ?>">
                    <?php echo esc_html__( 'Shortcode or HTML Form Code', 'astha' ); ?>
                </label>
                <textarea 
                       class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'code' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'code' ) ); ?>"
                       style="width: 100%;min-height: 200px;"><?php echo wp_kses_post( $code ); ?></textarea>
            </p>
            
            <p class="astha-admin-widget-item">
                <label for="<?php echo esc_attr( $this->get_field_id( 'bg_url' ) ); ?>">
                    <?php echo esc_html__( 'Background Image URL', 'astha' ); ?>
                </label>
                <input type="url" 
                       class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'bg_url' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'bg_url' ) ); ?>"
                       value="<?php echo esc_attr( $bg_url ); ?>" />
            </p>
            
        <?php
    }
    
    public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['code'] = !empty( $new_instance['code'] ) ? $new_instance['code'] : '';
		$instance['description'] = !empty( $new_instance['description'] ) ? $new_instance['description'] : '';
		$instance['bg_url'] = !empty( $new_instance['bg_url'] ) ? $new_instance['bg_url'] : '';
		return $instance;
    }
}