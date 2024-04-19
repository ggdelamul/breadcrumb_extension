<?php 
/* 
Plugin Name: My breadcrumb  
Description: Fil d'Ariane pour les articles et les pages  
Version: 1.0  
 
*/
function breadCrumb(){       
 global $post;  
 $fil="";       
 if (!is_front_page()) {       
   $fil = '<div id="fil">Vous êtes ici : ';    
   $fil.= '<a href="'.get_bloginfo('wpurl').'">';    
   $fil.= get_bloginfo('name');    
   $fil.= '</a> > ';         
   $parents = array_reverse(get_ancestors($post->ID,'page'));   
     foreach($parents as $parent){     
       $fil.='<a href="'.get_permalink($parent).'">';    
       $fil.= get_the_title($parent);    
       $fil.= '</a> > ';    
     }  
          
   $fil.= $post->post_title;    
    
   $fil.= '</div>';    
  }              
  return $fil;   
}
function add_script(){  
              wp_register_style('my_breadcrumb', plugins_url('/assets/css/plugin.css', __FILE__));  
              wp_enqueue_style('my_breadcrumb');   
} 
add_action('init', 'add_script');
add_shortcode( 'mybreadcrumb', 'breadCrumb');


//function qui gèrera l'affichage du contenu du menu
function showContent ()
  {
    echo '<div>';
    echo '<h1>Breadcrumb</h1>';
    echo '<h2>Mettre en place la fonction breadCrumb sur le header.php avec le code suivant dans les thème classique</h2>';
    echo '<code>
            
            if(function_exists("breadCrumb")){
            echo breadCrumb();
            }
       
          </code>';
    echo '<h2>Utilisez le short code pour les thèmes à base de bloc</h2>';
    echo '<p>ajoutez le code court dans le modèle header du thème</p>';
    echo '<code>[mybreadcrumb]</code>';
    echo '<h2>Ajout du bloc code court à l’en-tête avec l’extension Elementor Header & Footer Builder</h2>';
    echo '<code>[mybreadcrumb]</code>';
    echo '</div>';
  }
//declaration menu extension 
function addMenuAdmin()
{
  add_menu_page('breadcrumb_extension', 'extension_breadcrumb','manage_options', 'extension_breadcrumb', 'showContent','dashicons-arrow-right', 75);
}
add_action('admin_menu', 'addMenuAdmin');
// Ajout style admin 
function custom_admin_styles() {
    wp_enqueue_style('custom-admin-styles', plugin_dir_url(__FILE__) . 'assets/css/admin-styles.css');
}
add_action('admin_enqueue_scripts', 'custom_admin_styles');
?> 

