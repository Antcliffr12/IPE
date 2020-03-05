<?php
function RegisterMenus(){
  register_nav_menus(array(
    'top' => __('Top Navigation', 'IPE'),
    'bottom' => __('Bottom Navigation', 'IPE'),

  ));
}

add_action('init', 'RegisterMenus');
