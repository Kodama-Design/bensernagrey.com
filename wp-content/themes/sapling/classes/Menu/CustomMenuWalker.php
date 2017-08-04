<?php
namespace Sapling\Menu;


use Walker_Nav_Menu;

class CustomMenuWalker extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = [])
    {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        $output .= "{$n}{$indent}<ul class=\"menu vertical nested\">{$n}";
    }

    public function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 )
    {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
        $classes = empty( $item->classes ) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = [];
        $atts['title']  = ! empty( $item->attr_title )  ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )      ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )         ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )         ? $item->url        : '';
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output = $args['before'];
        $item_output .= '<a'. $attributes .'>';
        $item_output .= '<span class="nav">'.$args['link_before'] . $title . $args['link_after'].'</span>';
        $item_output .= '<span class="description">'.$item->description.'</span>';
        $item_output .= '</a>';
        $item_output .= $args['after'];

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}