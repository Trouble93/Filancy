<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page([
        'page_title'  => 'Theme Footer Settings',
        'menu_title'  => 'Footer',
        'menu_slug'  => 'footer',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);

}
function styles_theme_name_scripts()
{
    wp_enqueue_script('script-name', get_template_directory_uri() . '/js/script.js', ['jquery'], time(), true);
    wp_enqueue_style('app-style', get_template_directory_uri() . '/dest/app.css');
    wp_localize_script('script-name', 'MyAjax', [
        'ajaxurl' => admin_url("admin-ajax.php")
    ]);
}


add_action('wp_enqueue_scripts', 'styles_theme_name_scripts');



function init_menu()
{
    register_nav_menu('init_menu', __('Header Menu'));
}

add_action('init', 'init_menu');


add_theme_support('custom-logo', [
    'height'               => 57,
    'width'                => 151,
    'flex-width'           => false,
    'flex-height'          => false,
    'header-text'          => '',
    'unlink-homepage-logo' => false,
]);




function create_posttype() {

    register_post_type( 'apartments',
        // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Номера' ),
                'singular_name' => __( 'Номера' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'apartments'),
            'show_in_rest' => true,

        )
    );
}

add_action( 'init', 'create_posttype' );


function load_more_images() {
    $pageID = get_option('page_on_front');
    $fields = get_field('gallery', $pageID);


    wp_send_json($fields);
    wp_die();
}

add_action('wp_ajax_load_more_images', 'load_more_images');
add_action('wp_ajax_nopriv_load_more_images', 'load_more_images');








