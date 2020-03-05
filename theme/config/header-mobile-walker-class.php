<?php
/**
 * Custom Walker
 *
 * @access      public
 * @since       1.0
 * @return      void
 */
class header_mobile_walker extends Walker_Nav_Menu
{
    public function title_to_slug($title) {
        $slug = preg_replace('/\s/', '-', strtolower($title));
        return $slug;
    }

    public function start_lvl(&$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';
        $iurl = trim($item->url, '/');
        $segments = explode('/', $iurl);
        $slug = array_pop($segments);
        $output .= $indent . '<li data-menuid="'. $item->ID . '"' . $value . $class_names .' data-label="'. $slug .'">';

        $icon = $args->walker->has_children == true ? '<i class="submenu-toggle"></i>' : '';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $icon;
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}
