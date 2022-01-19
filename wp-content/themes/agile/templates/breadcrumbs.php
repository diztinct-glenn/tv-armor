<?php


$disable_breadcrumbs = mo_get_theme_option('mo_disable_breadcrumbs');
$disable_breadcrumbs_for_entry = get_post_meta(get_queried_object_id(), 'mo_disable_breadcrumbs_for_entry', true);
if (!empty($disable_breadcrumbs) || !empty($disable_breadcrumbs_for_entry))
    return;

$delimiter = apply_filters('mo_breadcrumb_delimiter', '<span class="sep"> / </span>');

//Use dashes for same level categories ( parent - parent )
$separator = apply_filters('mo_breadcrumb_category_separator', '<span class="delimiter1"> - </span>');

$post_title = get_the_title();

$display_title = "";

//Display only the first 30 characters of the post title to save space.
if (strlen(strip_tags($post_title)) > 30)
    $display_title = trim(substr(strip_tags($post_title), 0, 30)) . ' ...';
else
    $display_title = $post_title;
?>

<div id="breadcrumbs">

    <?php

    global $post;

    echo '<a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'agile') . '</a>' . $delimiter;

    if (is_attachment()) {
        // No breadcrumbs for attachments
    }
    elseif (is_single()) {
        mo_get_template_part('templates/breadcrumbs/single', null,
            array('delimiter' => $delimiter,
                  'separator' => $separator,
                  'display_title' => $display_title));
    }
    elseif (is_category()) {

        $cat = get_queried_object();
        echo '' . get_category_parents($cat->term_id, true, ' ' . $delimiter . ' ');

    }
    elseif (is_tag()) {

        echo '' . single_tag_title("", false);

    }
    elseif (is_date()) {

        mo_get_template_part('templates/breadcrumbs/date', null,
            array('delimiter' => $delimiter));
    }
    elseif (is_search()) {

        echo esc_html__('Search Results for: ', 'agile') . get_search_query() . '';

    }
    elseif (is_page()) {

        mo_get_template_part('templates/breadcrumbs/page', null,
            array('delimiter' => $delimiter));
    }
    elseif (is_author()) {
        global $author;
        $user_info = get_userdata($author);
        echo esc_html__('Posts by ', 'agile') . $user_info->display_name;
    }
    elseif (is_404()) { //checks if 404 error is being displayed
        echo esc_html__('Error 404 - Not Found.', 'agile');
    }
    elseif (is_tax()) {
        $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
        echo esc_attr($term->name);
    }
    else {
        //All other cases that I missed. No Breadcrumb trail.
    }
    ?>

</div><!-- #breadcrumbs -->