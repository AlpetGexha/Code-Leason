<?php 
function shkolla_digjitale_register_styles(){
	$version = wp_get_theme()->get('Version');
	wp_enqueue_style('shkolladigjitale_bootstrap_css',get_template_directory_uri().'/assets/css/bootstrap.min.css',array(),'5.0.0','all');
	wp_enqueue_style('shkolladigjitale_style',get_template_directory_uri().'/style.css',array('shkolladigjitale_bootstrap_css'),$version,'all');}
	add_action('wp_enqueue_scripts','Shkolla_digjitale_register_styles');

function shkolladigjitale_register_scripts(){
	$version=wp_get_theme()->get('Version');
     wp_enqueue_script('shkolladigjitale_bootstrap_js',get_template_directory_uri().'assets/js/bootstrap.min.js');
	wp_enqueue_script('shkolladigjitale_scripts',get_template_directory_uri().'/assets/js/script.js',array('shkolladigjitale_bootstrap_js'),'5.0.0',true);

}
add_action('wp_enqueue_scripts','shkolladigjitale_register_scripts');

function shkolla_digjitale_register_style(){
	$version = wp_get_theme() -> get('Version');
	wp_enqueue_style('shkolladigjitale_style', get_template_directory_uri().'/style.css', array(),$version,'all');
//wp_enqueue_script($haddle $src $dept $vesion $in_footer);
}

//aktivizimi i style.css
add_action('wp_enqueue_style','shkolla_digjitale_register_style');

function shkolladigjital_widget(){
register_sidebar(array(
'before_title'=>'',
'after_title'=>'',
'before_widget'=>'',
'after_widget'=>'',
'name'=>'SidebarArea',
'id'=>'sidebar-1',
'description'=>'...'
));
register_sidebar(array(
'before_title'=>'',
'after_title'=>'',
'before_widget'=>'<ul class="Social-list list-inline py-3 mx_auto" ',
'after_widget'=>'</ul>',
'name'=>'sidebarFooter',
'id'=>'sidebar-2',
'description'=>'Sidebar for Footer'
));
register_sidebar(array(
'before_title'=>'',
'after_title'=>'',
'before_widget'=>'',
'after_widget'=>'',
'name'=>'SidebarArea',
'id'=>'ads',
'description'=>'...'
));
} 
add_action('widgets_init','shkolladigjital_widget');
?>