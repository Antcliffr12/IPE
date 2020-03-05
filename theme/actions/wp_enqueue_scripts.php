<?php
function theme_scripts(){
    wp_enqueue_style('themeStyles', get_stylesheet_directory_uri() . '/assets/bundles/styles.css', '1.3');

    wp_enqueue_style('themeIU', get_stylesheet_directory_uri() . '/assets/bundles/rivet.min.css', '1.0');
    wp_enqueue_style('Bootstrap', get_stylesheet_directory_uri() . '/assets/bundles/bootstrap.css', '4.3');
    wp_enqueue_style('IUBrand', get_stylesheet_directory_uri() . '/assets/bundles/brand.css', '4.3');


    wp_register_script('themeScripts', get_stylesheet_directory_uri() . '/assets/bundles/scripts.js', array('jquery'), '1.0', true);

    wp_register_script('themeIU', get_stylesheet_directory_uri() . '/assets/bundles/rivet.min.js', array('jquery'), '1.0', true);
    
    wp_register_script('Bootstrap', get_stylesheet_directory_uri() . '/assets/bundles/bootstrap.js', array('jquery'), '1.0', true);

    wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, true);


    

    wp_localize_script('themeS', 'iu_vars', array(
        'iu_nounce' => wp_create_nonce('iu-nounce'),
        'iu_ajax_url' => admin_url('admin-ajax.php'),
        'rest_api_root' => esc_url_raw( rest_url() ),
    ));
    wp_enqueue_script('themeS');

    
    wp_enqueue_script('Bootstrap');

    wp_enqueue_script('themeScripts');

    wp_enqueue_script('themeIU');

    

}
add_action('wp_enqueue_scripts' , 'theme_scripts', 9);

function admin_scripts(){
    wp_register_script('adminScripts', get_stylesheet_directory_uri() . '/assets/scripts/admin_scripts.js', array('jquery'), '1.0', true);

}

add_action( 'admin_enqueue_scripts', 'admin_scripts' );




 