<?php

$video_url = get_post_meta(get_the_ID(), 'mo_video_thumbnail_url', true);

if (!empty($video_url)) : ?>

    <div class="video-box">

        <?php if (strpos($video_url, 'vimeo.com') > 0) {

            preg_match('#(?:http://)?(?:www\.)?vimeo\.com/([A-Za-z0-9\-_]+)#', $video_url, $matches);

            $video_url = "https://player.vimeo.com/video/" . $matches[1];
        }
        if (strpos($video_url, 'youtube.com') > 0 || strpos($video_url, 'youtu.be') > 0) {

            preg_match('#(?:https?(?:a|vh?)?://)?youtu\.be/([A-Za-z0-9\-_]+)#', $video_url, $matches);

            $video_url = "https://www.youtube.com/embed/" . $matches[1];

        } ?>

        <iframe parent-selector=#content src="<?php echo esc_url($video_url); ?>" frameborder="0" webkitAllowFullScreen
                mozallowfullscreen allowFullScreen></iframe>


    </div><!-- .video-box -->

<?php

endif;

?>