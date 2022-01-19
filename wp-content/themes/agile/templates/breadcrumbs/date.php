<?php

$arc_year = get_the_time('Y');
$arc_month = get_the_time('F');

$arc_day = get_the_time('d');
$arc_day_full = get_the_time('l');

$url_year = get_year_link($arc_year);
$url_month = get_month_link($arc_year, $arc_month);

if (is_day()) {
    echo '<a href="' . esc_url($url_year) . '">' . esc_html($arc_year) . '</a> ' . $delimiter . ' ';
    echo '<a href="' . esc_url($url_month) . '">' . esc_html($arc_month) . '</a> ' . $delimiter . $arc_day . ' (' . $arc_day_full . ')';
}
elseif (is_month()) {
    echo '<a href="' . esc_url($url_year) . '">' . esc_html($arc_year) . '</a> ' . $delimiter . $arc_month;
}
elseif (is_year()) {
    echo get_the_time('Y');
}

?>