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
?> 

