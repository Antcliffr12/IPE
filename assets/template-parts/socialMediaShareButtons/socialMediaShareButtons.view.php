<?php 

        global $post;

        $post_url = urlencode(esc_url( get_permalink($post->ID) ) );

        $post_title = urlencode($post->post_title);

        $facebook_link = sprintf( 'https://www.facebook.com/sharer/sharer.php?u=%1$s', $post_url );
        $twitter_link     = sprintf( 'https://twitter.com/intent/tweet?text=%2$s&url=%1$s', $post_url, $post_title );


         // Wrap the buttons
    $output = '<ul>';
    
    // Add the links inside the wrapper
    $output .= '<li>';
    $output .= '<a target="_blank" href="' . $facebook_link . '" class="social social-facebook">
        <i class="fab fa-facebook-f"></i>
        <span class="social_text">Facebook</span>
    </a>';
    $output .= '</li>';
    $output .= '<li>';
    $output .= '<a target="_blank" href="' . $twitter_link . '" class="social social-twitter">
    <i class="fab fa-twitter"></i>
    <span class="social_text">Twitter</span>
    </a>';
    $output .= '</li>';

    $output .= '</ul>';

    echo $output;

?>