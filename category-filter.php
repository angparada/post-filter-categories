<?php

if (!function_exists('enqueue_post_category_scripts')) {
    /**
     * Enolar estylos css y js
     */
    function enqueue_post_category_scripts()
    {
        // Post Category CSS
        wp_register_style('post-category', get_stylesheet_directory_uri() . '/shortcode/assets/css/shortcode.css', false, false);
        wp_enqueue_style('post-category');
        wp_register_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css', false, '9.3.1');
        wp_enqueue_style('swiper');

        // Post category JS
        wp_register_script('post-category-script', get_stylesheet_directory_uri() . '/shortcode/assets/js/script.js', array('jquery'), '1', true);
        wp_enqueue_script('post-category-script');

        wp_register_script('swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', [], '9.3.1', true);
        wp_enqueue_script('swiper-bundle');

        // Loaclize script para Ajax acción
        wp_localize_script('post-category-script', 'site_vars', ['ajaxurl' => admin_url('admin-ajax.php')]);
    }

    add_action('wp_enqueue_scripts', 'enqueue_post_category_scripts');
}


if (!function_exists('post_category_filter_shortcode')) {
    /**
     * Add Shortcode
     * 
     * @param $atts array attributes
     * 
     * return string
     */
    function post_category_filter_shortcode($atts)
    {

        // Attributes
        $atts = shortcode_atts(
            array(
                'post_type' => 'post',
                'taxonomy' => 'category',
            ),
            $atts,
            'post_category_filter'
        );

        // obtenemos las categorias principales
        $terms = get_terms(['taxonomy' => $atts['taxonomy'], 'hide_empty' => false, 'exclude' => 1, 'parent'    => 0]);

        // Lista de los 10 Post mas recientes
        $posts = get_posts(['post_type' => [$atts['post_type']], 'posts_per_page' => 10, 'orderby' => 'date', 'order' => 'DESC']);

        $iconSVG = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none"><mask id="mask0_380_9632" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="32" height="32"><rect width="32" height="32" fill="#D9D9D9"/></mask><g mask="url(#mask0_380_9632)"><path d="M17.733 23.0334C17.4663 22.7668 17.3383 22.4445 17.349 22.0668C17.3606 21.689 17.4997 21.3668 17.7663 21.1001L21.533 17.3334H6.66634C6.28856 17.3334 5.97167 17.2054 5.71567 16.9494C5.46056 16.6943 5.33301 16.3779 5.33301 16.0001C5.33301 15.6223 5.46056 15.3054 5.71567 15.0494C5.97167 14.7943 6.28856 14.6668 6.66634 14.6668H21.533L17.733 10.8668C17.4663 10.6001 17.333 10.2832 17.333 9.91611C17.333 9.54988 17.4663 9.23344 17.733 8.96677C17.9997 8.70011 18.3166 8.56677 18.6837 8.56677C19.0499 8.56677 19.3663 8.70011 19.633 8.96677L25.733 15.0668C25.8663 15.2001 25.961 15.3446 26.017 15.5001C26.0721 15.6557 26.0997 15.8223 26.0997 16.0001C26.0997 16.1779 26.0721 16.3446 26.017 16.5001C25.961 16.6557 25.8663 16.8001 25.733 16.9334L19.5997 23.0668C19.3552 23.3112 19.0499 23.4334 18.6837 23.4334C18.3166 23.4334 17.9997 23.3001 17.733 23.0334Z" fill="#004236"/></g></svg>';

        $html = '';

        ob_start();

        require_once dirname(__FILE__) . '/view/category-filter.php';

        return ob_get_clean();
    }
    add_shortcode('post_category_filter', 'post_category_filter_shortcode');
}

if (!function_exists('post_filters_content')) {
    /**
     * Consulta de tipo ajax hacia la web
     */
    function post_filters_content()
    {
        $request = (string) isset($_POST['term_name']) ? $_POST['term_name'] : '';
        $html = '';

        $iconSVG = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none"><mask id="mask0_380_9632" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="32" height="32"><rect width="32" height="32" fill="#D9D9D9"/></mask><g mask="url(#mask0_380_9632)"><path d="M17.733 23.0334C17.4663 22.7668 17.3383 22.4445 17.349 22.0668C17.3606 21.689 17.4997 21.3668 17.7663 21.1001L21.533 17.3334H6.66634C6.28856 17.3334 5.97167 17.2054 5.71567 16.9494C5.46056 16.6943 5.33301 16.3779 5.33301 16.0001C5.33301 15.6223 5.46056 15.3054 5.71567 15.0494C5.97167 14.7943 6.28856 14.6668 6.66634 14.6668H21.533L17.733 10.8668C17.4663 10.6001 17.333 10.2832 17.333 9.91611C17.333 9.54988 17.4663 9.23344 17.733 8.96677C17.9997 8.70011 18.3166 8.56677 18.6837 8.56677C19.0499 8.56677 19.3663 8.70011 19.633 8.96677L25.733 15.0668C25.8663 15.2001 25.961 15.3446 26.017 15.5001C26.0721 15.6557 26.0997 15.8223 26.0997 16.0001C26.0997 16.1779 26.0721 16.3446 26.017 16.5001C25.961 16.6557 25.8663 16.8001 25.733 16.9334L19.5997 23.0668C19.3552 23.3112 19.0499 23.4334 18.6837 23.4334C18.3166 23.4334 17.9997 23.3001 17.733 23.0334Z" fill="#004236"/></g></svg>';
        if ('all' === $request) {
            $args = [
                'taxonomy'    => 'category',
                'hide_empty'    => false,
                'exclude'    => 1,
                'parent'    => 0,
                'orderby' => 'name',
                'order' => 'ASC',
            ];

            $parents = get_terms($args);

            if ($parents) {
                foreach ($parents as $parent) {
                    $childs = get_term_children($parent->term_id, 'category');
                    $categoryIcon = get_term_meta($parent->term_id, 'image', true);
                    if ($categoryIcon) {
                        $icon = sprintf('<span>%s</span>', wp_get_attachment_image($categoryIcon, 'thumbnail'));
                    } else {
                        $icon = '';
                    }
                    $html .= sprintf('<article class="category-item category-item-%s">', $parent->term_id);
                    $html .= '<div class="category-heading">';
                    $html .= sprintf('<h2>%s %s</h2>', $icon, $parent->name);
                    $html .= sprintf('<a href="%s" class="category-link">%s <i class="icon">%s</i></a>', get_category_link($parent->term_id), __('Ver todo'), $iconSVG);
                    $html .= '</div>';
                    if ($childs) {
                        $html .= '<div class="category-body">';
                        foreach ($childs as $child) {
                            $category =  get_term($child, 'category');
                            $image = get_term_meta($category->term_id, 'image', true);
                            $html .= sprintf('<div class="item">');
                            if ($image) {
                                $html .= sprintf('<a href="%s" class="category-image">%s</a>', get_category_link($child), wp_get_attachment_image($image));
                            } else {
                                $html .= sprintf('<a href="%s" class="category-image"><img src="https://placehold.co/116x100" alt="%s" width="116" height="100" /></a>', get_category_link($child), $category->name);
                            }
                            $html .= sprintf('<h4>%s</h4>', $category->name);
                            $html .= sprintf('<span>%s %s</span>', $category->count, ($category->count === 1) ? __('archivo') : __('archivos'));
                            $html .= '</div>';
                        }
                        $html .= '<div>';
                    }
                    $html .= '</article>';
                }
            }
        } else if (isset($_POST['orderby'])) {
            $args = [
                'taxonomy'    => 'category',
                'hide_empty'    => false,
                'exclude'    => 1,
                'parent'    => 0,
            ];

            if ( 'title_asc' === $_POST['orderby']) {
                $args['orderby'] = 'name';
                $args['order'] = 'ASC';
            }
            if ( 'title_desc' === $_POST['orderby']) {
                $args['orderby'] = 'name';
                $args['order'] = 'DESC';
            }

            if ( 'ASC' === $_POST['orderby']) {
                $args['orderby'] = 'name';
                $args['order'] = 'ASC';
            }
            if ( 'date' === $_POST['orderby']) {
                $args['orderby'] = 'name';
                $args['order'] = 'DESC';
            }

            $parents = get_terms($args);

            if ($parents) {
                foreach ($parents as $parent) {
                    $childs = get_term_children($parent->term_id, 'category');
                    $categoryIcon = get_term_meta($parent->term_id, 'image', true);
                    if ($categoryIcon) {
                        $icon = sprintf('<span>%s</span>', wp_get_attachment_image($categoryIcon, 'thumbnail'));
                    } else {
                        $icon = '';
                    }
                    $html .= sprintf('<article class="category-item category-item-%s">', $parent->term_id);
                    $html .= '<div class="category-heading">';
                    $html .= sprintf('<h2>%s %s</h2>', $icon, $parent->name);
                    $html .= sprintf('<a href="%s" class="category-link">%s <i class="icon">%s</i></a>', get_category_link($parent->term_id), __('Ver todo'), $iconSVG);
                    $html .= '</div>';
                    if ($childs) {
                        $html .= '<div class="category-body">';
                        foreach ($childs as $child) {
                            $category =  get_term($child, 'category');
                            $image = get_term_meta($category->term_id, 'image', true);
                            $html .= sprintf('<div class="item">');
                            if ($image) {
                                $html .= sprintf('<a href="%s" class="category-image">%s</a>', get_category_link($child), wp_get_attachment_image($image));
                            } else {
                                $html .= sprintf('<a href="%s" class="category-image"><img src="https://placehold.co/116x100" alt="%s" width="116" height="100" /></a>', get_category_link($child), $category->name);
                            }
                            $html .= sprintf('<h4>%s</h4>', $category->name);
                            $html .= sprintf('<span>%s %s</span>', $category->count, ($category->count === 1) ? __('archivo') : __('archivos'));
                            $html .= '</div>';
                        }
                        $html .= '<div>';
                    }
                    $html .= '</article>';
                }
            }
        } else {

            $term = get_term_by('slug', $request, 'category');

            if ($term) {
                $childs = get_term_children($term->term_id, 'category');
                $categoryIcon = get_term_meta($term->term_id, 'image', true);
                if ($categoryIcon) {
                    $icon = sprintf('<span>%s</span>', wp_get_attachment_image($categoryIcon, 'thumbnail'));
                } else {
                    $icon = '';
                }
                $html .= sprintf('<article class="category-item category-item-%s">', $term->term_id);
                $html .= '<div class="category-heading">';
                $html .= sprintf('<h2>%s %s</h2>', $icon, $term->name);
                $html .= sprintf('<a href="%s" class="category-link">%s <i class="icon">%s</i></a>', get_category_link($term->term_id), __('Ver todo'), $iconSVG);
                $html .= '</div>';
                if ($childs) {
                    $html .= '<div class="category-body">';
                    foreach ($childs as $child) {
                        $category =  get_term($child, 'category');
                        $image = get_term_meta($category->term_id, 'image', true);
                        $html .= sprintf('<div class="item">');
                        if ($image) {
                            $html .= sprintf('<a href="%s" class="category-image">%s</a>', get_category_link($child), wp_get_attachment_image($image));
                        } else {
                            $html .= sprintf('<a href="%s" class="category-image"><img src="https://placehold.co/116x100" alt="%s" width="116" height="100" /></a>', get_category_link($child), $category->name);
                        }
                        $html .= sprintf('<h4>%s</h4>', $category->name);
                        $html .= sprintf('<span>%s %s</span>', $category->count, ($category->count === 1) ? __('archivo') : __('archivos'));
                        $html .= '</div>';
                    }
                    $html .= '<div>';
                }
                $html .= '</article>';
            }
        }

        sleep(1);

        wp_send_json($html);

        wp_die();
    }

    add_action('wp_ajax_nopriv_ajax_post_filters', 'post_filters_content');
    add_action('wp_ajax_ajax_post_filters', 'post_filters_content');
}
