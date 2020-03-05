<?php 
/*
Template Name: 2-Column (Left Sidebar)
*/
get_header();
get_template_part('partials/header-content');
$path = get_page_uri($post->ID);
global $current_path;
$current_path = site_url() . '/' . trim($path, '/') . '/';

$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
$subnav_root_path = '/'. (count($segments) > 1 ? $segments[1] : ''); // Default to second-level page as menu root
//turn segments to 1 on localhoust:8080 0 on DEV and PROD
if (!isset($_GET['hidenav'])) {
    global $menu_tree;
    $menu_tree = new MenuTree('bottom');
}
global $extra_body_classes;
$extra_body_classes = 'page-layout-two-column';
?>

<section id="content">
    <div class="rvt-container rvt-container--senior rvt-container--center rvt-grid page">
        <div class="rvt-grid__item-8 ">
        <?php
            the_post();
            the_content();
        ?>
        </div>
        <div class="rvt-grid__item-4">
        <nav role="navigation" aria-label="Sidebar Navigation" class="menu-wrapper">
                <ul class="menu" data-menudepth="0">
                   
				<?= isset($section_switcher) ? $section_switcher : ''; ?>
                <?php if (!isset($_GET['hidenav'])) { ?>
				<?= render_component('sidebar-nav', [
					'items' => $menu_tree->setScope($subnav_root_path)->setMaxDepth(4)->render(['skip_root' => false]),
				    'current_path' => $current_path,
				]); ?>
                <?php } ?>
                
                </ul>
            </nav>
        </div>
    </div>
</section>

<?php get_footer(); ?>