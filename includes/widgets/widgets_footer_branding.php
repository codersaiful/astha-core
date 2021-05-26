<?php
/**
 * Recent Post Widget Class
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */

final class Astha_Footer_Branding extends WP_Widget{


    /**
     * Constructor
     */
    public function __construct() {
        
        $description = array(
            'description'   =>  __( "Astha Footer Branding", 'astha' ),
            'classname'     =>  'astha-footer-branding',
            //'customize_selective_refresh' => true,
        );
        
        parent::__construct(
                'Astha_Footer_Branding',
                __( 'Astha Footer Branding', 'astha' ),
                $description
                );
    }
    
        
    public function widget( $args, $instance ) {
        $title      = ( ! empty( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : '';
        $logo       = ( ! empty( $instance[ 'logo' ] ) ) ? $instance[ 'logo' ] : '';
        $desc       = ( ! empty( $instance[ 'short-desc' ] ) ) ? $instance[ 'short-desc' ] : '';
        $phone      = ( ! empty( $instance['phone'] ) ) ? absint( $instance['phone'] ) : '';
        $email      = ( ! empty( $instance['email']  ) ) ? $instance['email'] : '';
        $address    = ( ! empty( $instance['address']  ) ) ? $instance['address'] : '';
        echo wp_kses_post( $args['before_widget'] );
        ?>
            <div class="footer-brand">
                <div class="wrapper">
                    <div class="contact-info">
                        <?php if( ! empty( $logo ) ){ ?>
                        <img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" class="footer-logo" />
                        <?php } if( ! empty( $desc ) ){ ?>
                        <p class="about-us"><?php echo esc_html( $desc ); ?></p>
                        <?php } ?>
                        <ul>
                            <?php if( ! empty( $phone ) ){ ?>
                            <li><a href="tel:<?php echo esc_attr( $phone ); ?>"><i class="fas fa-phone"></i> <?php echo esc_html( $phone ); ?></a></li>
                            <?php } if( ! empty( $email ) ){ ?>
                            <li><a href="mailto:<?php echo esc_attr( $email ); ?>"><i class="far fa-envelope"></i> <?php echo esc_attr( $email ); ?></a></li>
                            <?php } if( ! empty( $address ) ){ ?>
                            <li><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $address ); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            
        <?php
        echo wp_kses_post( $args['after_widget'] );
    }
    
    public function form( $instance ) {

        $default = array(
            'title'         => '',
            'logo'          => '',
            'short-desc'    => 'Lorem ipsum dolor sit amet, consectetura adipiscing elit, sed do eiusmod tempor an incididunt ut labore.',
            'phone'         =>  '123 456 7890',
            'email'         =>  'info@codeastrology.com',
            'address'       =>  '59 Street, 1200 Australia',
        );
        $instance = wp_parse_args( $instance, $default );
        
        $title      = ( ! empty( $instance[ 'title' ] )         ? $instance[ 'title' ] : '' );
        $logo       = ( ! empty( $instance[ 'logo' ] )          ? $instance[ 'logo' ] : '' );
        $desc       = ( ! empty( $instance[ 'short-desc' ] )    ? $instance[ 'short-desc' ] : '' );
        $phone      = ( ! empty( $instance['phone'] ) )         ? $instance['phone'] : '';
        $email      = ( ! empty( $instance['email']  ) )        ? $instance['email'] : '';
        $address    = ( ! empty( $instance['address']  ) )      ? $instance['address'] : '';
        ?>
    
            <p class="astha-admin-wedget-item">
                <label
                    for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                    >
                    <?php echo esc_html__( 'Title', 'astha' ); ?>
                </label>
                <input type="tel" 
                       class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                       value="<?php echo esc_attr( $title ); ?>"
                       >
            </p>
            
            <p class="astha-admin-wedget-item">
                <label
                    for="<?php echo esc_attr( $this->get_field_id( 'logo' ) ); ?>"
                    >
                    <?php echo esc_html__( 'Logo', 'astha' ); ?>
                </label>
                <input type="url" 
                       class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'logo' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'logo' ) ); ?>"
                       placeholder="<?php echo esc_attr( __( 'Paste the logo/image link here', 'astha' ) ); ?>"
                       value="<?php echo esc_attr( $logo ); ?>"
                       >
            </p>
            
            <p class="astha-admin-wedget-item">
                <label
                    for="<?php echo esc_attr( $this->get_field_id( 'short-desc' ) ); ?>"
                    >
                    <?php echo esc_html__( 'Short Description', 'astha' ); ?>
                </label>
                <textarea 
                       class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'short-desc' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'short-desc' ) ); ?>"><?php echo esc_html( $desc ); ?></textarea>
            </p> 
            
            <p class="astha-admin-wedget-item">
                <label
                    for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"
                    >
                    <?php echo esc_html__( 'Phone Number', 'astha' ); ?>
                </label>
                <input type="tel" 
                       class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>"
                       value="<?php echo esc_attr( $phone ); ?>"
                       >
            </p>  
            
            <p class="astha-admin-wedget-item">
                <label
                    for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"
                    >
                    <?php echo esc_html__( 'Email Address', 'astha' ); ?>
                </label>
                <input type="email" 
                       class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>"
                       value="<?php echo esc_attr( $email ); ?>"
                       >
            </p>
            
            <p class="astha-admin-wedget-item">
                <label
                    for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"
                    >
                    <?php echo esc_html__( 'Address', 'astha' ); ?>
                </label>
                <input type="text" 
                       class="widefat"
                       id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>"
                       value="<?php echo esc_attr( $address ); ?>"
                       >
            </p>    
            
        <?php
    }
    
    public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']      = !empty( $new_instance['title'] )      ? strip_tags( $new_instance['title'] ) : '';
		$instance['logo']       = !empty( $new_instance['logo'] )       ? strip_tags( $new_instance['logo'] ) : '';
		$instance['short-desc'] = !empty( $new_instance['short-desc'] ) ? strip_tags( $new_instance['short-desc'] ) : '';
		$instance['phone']      = !empty( $new_instance['phone'] )      ? strip_tags( $new_instance['phone'] ) : '';
		$instance['email']      = !empty( $new_instance['email'] )      ? strip_tags( $new_instance['email'] ) : '';
		$instance['address']    = !empty( $new_instance['address'] )    ? strip_tags( $new_instance['address'] ) : '';
		return $instance;
    }
}
