<?php 
/*
Template Name: News and Events
*/

get_header();

echo render_component('blog-featured');
echo render_component('latestNews');

get_footer();
?>
