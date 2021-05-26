<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
        <style id="astha-core-header-footer-page">
            body.astha-header-footer-body{padding: 0;margin: 0;width: 100%;}
            .header-footer-fullwidth-page{width: 100%;}
            body.astha-header-footer-body div#page{display: block;margin: 0;padding: 0;}
        </style>
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'astha-header-footer-body' ); ?>>
<?php wp_body_open(); ?>

    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'astha' ); ?></a>
<div id="page" class="hfeed site header-footer-fullwidth">
<?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    endif;

wp_footer(); 
?>
    </div><!-- #page -->
</body>
</html>
