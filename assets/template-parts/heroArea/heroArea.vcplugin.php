<?php

function sc_heroArea($atts, $content = ''){

  	extract( shortcode_atts( array(
      'image' => false,
          'image_url' => 'http://placehold.it/360x240',
      'title' => '',
      'slider' => '',
    ), $atts ));

    $slider = iusm_get_valid_items($slider, 'image');

    if($image){
      $img_id= preg_replace( '/[^\d]/', '', $image );
      $data = wp_get_attachment_url($img_id);
      $image_url = $data;
    }
    

    return render_component('heroArea', [
      'title' => $title,
      'image_url' => $image_url,
      'body' => $content,
      'slider' => $slider,
    ]);
}

add_shortcode('heroArea', 'sc_heroArea');

if(function_exists('vc_map')) {
  vc_map(array(
    'name' => __('Hero Area'),
    'base' => 'heroArea',
    'icon' => THEME_PATH . '/assets/images/icons/sliders-h-square.svg',
    'description' => __('Slider for Home Page.'),
    'category' => __('IPE Components'),
    'params' => array(  
  
      array_merge($vc_shared_params_iu_text_group, [
          'group' => '',
          
        ]),


    )


  ));
}
