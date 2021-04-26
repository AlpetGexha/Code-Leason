  
<?php
function shkolla_digjitale_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('shkolladigjitale_bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0.0', 'all');
    wp_enqueue_style('shkolladigjitale_style', get_template_directory_uri() . '/style.css', array('shkolladigjitale_bootstrap_css'), $version, 'all');
}
add_action('wp_enqueue_scripts', 'Shkolla_digjitale_register_styles');

function shkolladigjitale_register_scripts()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('shkolladigjitale_bootstrap_js', get_template_directory_uri() . 'assets/js/bootstrap.min.js');
    wp_enqueue_script('shkolladigjitale_scripts', get_template_directory_uri() . '/assets/js/script.js', array('shkolladigjitale_bootstrap_js'), '5.0.0', true);
}
add_action('wp_enqueue_scripts', 'shkolladigjitale_register_scripts');

function shkolladigjitale_menus()
{
    $location = array(
        'primary' => 'Desktop primary top navbar',
        'footer' => 'Footer meny items'
    );
    register_nav_menus($location);
}
add_action('init', 'shkolladigjitale_menus');

function shkolladigjitale_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'shkolladigjitale_theme_support');


function shkolladigjital_widget()
{
    register_sidebar(array(
        'before_title' => '',
        'after_title' => '',
        'before_widget' => '',
        'after_widget' => '',
        'name' => 'SidebarArea',
        'id' => 'sidebar-1',
        'description' => '...'
    ));
    register_sidebar(array(
        'before_title' => '',
        'after_title' => '',
        'before_widget' => '<ul class="Social-list list-inline py-3 mx_auto" ',
        'after_widget' => '</ul>',
        'name' => 'sidebarFooter',
        'id' => 'sidebar-2',
        'description' => 'Sidebar for Footer'
    ));
    register_sidebar(array(
        'before_title' => '',
        'after_title' => '',
        'before_widget' => '',
        'after_widget' => '',
        'name' => 'SidebarArea',
        'id' => 'ads',
        'description' => '...'
    ));
} /*
add_action('widgets_init','shkolladigjital_widget');

function createpostype(){
	register_post_type('movies',array(
		'labels'=> array('name'=>__('Movies'),
		'singular_name' => __('Movie')),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'movies'),
		'show_in_rest' => true,


	)
	);

}

add_action('init','createpostype');
*/

function custom_post_type()
{
    $labels = array(
        'name'                => _x('Movies', 'Post Type General Name', 'twentytwenty'),
        'singular_name'       => _x('Movie', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name'    => __('Movies', 'twentytwenty'),
        'parent_item_colon'   => __('Parent Movie', 'twentytwenty'),
        'all_items'           => __('All Movies', 'twentytwenty'),
        'view_item'           => __('View Movie', 'twentytwenty'),
        'add_new_item'        => __('Add New Movie', 'twentytwenty'),
        'add_new'             => __('Add New', 'twentytwenty'),
        'edit_item'           => __('Edit Movie', 'twentytwenty'),
        'update_item'         => __('Update Movie', 'twentytwenty'),
        'search_items'        => __('Search Movie', 'twentytwenty'),
        'not_found'           => __('Not Found', 'twentytwenty'),
        'not_found_in_trash'  => __('Not found in Trash', 'twentytwenty'),
    );
    $args = array(
        'label'               => __('movies', 'twentytwenty'),
        'description'         => __('Movie news and reviews', 'twentytwenty'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'taxonomies'          => array('genres'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );
    register_post_type('movies', $args);
}
add_action('init', 'custom_post_type', 0);

?>
<?php
/*
//wp_enqueue_style($haddle $src $dept $vesion);

function shkolla_digjitale_register_style(){
	$version = wp_get_theme() -> get('Version');
	wp_enqueue_style('shkolladigjitale_style', get_template_directory_uri().'/style.css', array(),$version,'all');
//wp_enqueue_script($haddle $src $dept $vesion $in_footer);
}

//aktivizimi i style.css
add_action('wp_enqueue_style','shkolla_digjitale_register_style');

function shkolla_digjitale_register_script(){
	wp_enqueue_script('shkolladigjitale_scripts', get_template_directory_uri().'/assets/js/main.js',array(),'1.0',true);
}
//aktivizimi i script.js(main.js)
add_action('wp_enqueue_scripts','shkolla_digjitale_register_script'); 
// Add menu Appearance
function shkolla_digjitale_menus(){
	$location = array(
		'Primary'=>'Destop primary top navbar',
	    'footer'=> 'fptter meny items'
	);
	register_nav_menus($location);
}

//aktivizimi i menus 
add_action('init' ,'shkolla_digjitale_menus');

//thumbnails
function shkolladigjitale_theme_support(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','shkolladigjitale_theme_support');
*/
?>

 