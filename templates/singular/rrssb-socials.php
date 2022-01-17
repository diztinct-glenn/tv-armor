<?php

if (empty($post_id))
    $post_id = get_the_ID();
$post_title = get_the_title($post_id);
$post_url = get_permalink($post_id);
$post_excerpt = get_the_excerpt();
$featured_image_id = get_post_thumbnail_id($post_id);
$feature_image_src = wp_get_attachment_image_src($featured_image_id, 'full');
if ($feature_image_src)
    $feature_image_src = $feature_image_src[0];

?>

<ul class="rrssb-buttons">
    <li class="rrssb-email">
        <!-- Replace subject with your message using URL Endocding: http://meyerweb.com/eric/tools/dencoder/ -->
        <a href="mailto:?subject=<?php echo urlencode($post_title); ?>&amp;body=<?php echo urlencode($post_url); ?>">
            <span class="rrssb-icon">
                <i class="icon-envelope"></i>
            </span>
            <span class="rrssb-text">email</span>
        </a>
    </li>
    <li class="rrssb-facebook">
        <!--  Replace with your URL. For best results, make sure you page has the proper FB Open Graph tags in header:
              https://developers.facebook.com/docs/opengraph/howtos/maximizing-distribution-media-content/ -->
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($post_url); ?>"
           class="popup">
            <span class="rrssb-icon">
                <i class="icon-facebook"></i>
            </span>
            <span class="rrssb-text">facebook</span>
        </a>
    </li>
    <li class="rrssb-linkedin">
        <!-- Replace href with your meta and URL information -->
        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode($post_url); ?>&amp;title=<?php echo urlencode($post_title); ?>&amp;summary=<?php echo urlencode($post_excerpt); ?>"
           class="popup">
            <span class="rrssb-icon">
                <i class="icon-linkedin"></i>
            </span>
            <span class="rrssb-text">linkedin</span>
        </a>
    </li>
    <li class="rrssb-twitter">
        <!-- Replace href with your Meta and URL information  -->
        <a href="http://twitter.com/home?status=<?php echo urlencode($post_title); ?>%3A%20<?php echo urlencode($post_url); ?>"
           class="popup">
            <span class="rrssb-icon">
                <i class="icon-twitter"></i>
            </span>
            <span class="rrssb-text">twitter</span>
        </a>
    </li>
    <li class="rrssb-googleplus">
        <!-- Replace href with your meta and URL information.  -->
        <a href="https://plus.google.com/share?url=<?php echo urlencode($post_title); ?>%20<?php echo urlencode($post_url); ?>"
           class="popup">
            <span class="rrssb-icon">
                <i class="icon-google-plus"></i>
            </span>
            <span class="rrssb-text">google+</span>
        </a>
    </li>
    <li class="rrssb-pinterest">
        <!-- Replace href with your meta and URL information.  -->
        <a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode($post_url); ?>&amp;media=<?php echo urlencode($feature_image_src); ?>&amp;description=<?php echo urlencode($post_title); ?>">
            <span class="rrssb-icon">
                <i class="icon-pinterest-p"></i>
            </span>
            <span class="rrssb-text">pinterest</span>
        </a>
    </li>
</ul>
<!-- Buttons end here -->