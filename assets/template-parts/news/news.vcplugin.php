<?php

function sc_news($atts, $content = ''){

  	extract( shortcode_atts( array(
      'title' => '',
    ), $atts ));



    return render_component('news', [


    ]);
}

add_shortcode('news', 'sc_news');

if(function_exists('vc_map')) {
  vc_map(array(
    'name' => __('News'),
    'base' => 'news',
    'icon' => THEME_PATH . '/assets/images/icons/newspaper.svg',
    'description' => __('Static News.'),
    'category' => __('IPE Components'),
    'params' => array(


    )


  ));
}
