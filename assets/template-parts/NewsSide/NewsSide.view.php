<aside class="popular-posts outline">
    <h4>Popular Posts</h4>
    <?php 
    $popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
    ?>
    <ul class="post-list-small">
        <?php 

        while ( $popularpost->have_posts() ) : 
            $popularpost->the_post();
            $author_id= $popularpost->post_author;  

            $first = get_the_author_meta('first_name');
            $first_initial = substr($first, 0,1);
            $last = get_the_author_meta('last_name');
            $last_initial = substr($last, 0,1);
            ?>
            <li class="post-list-small_item">
                <article class="post-list-small_entry">
                    <div class="post-list-small-img-holder">
                        <div class="thumb-container">
                                <?= $first_initial . '' . $last_initial ?>
                        </div>
                    </div>
                    <div class="post-list-body">
                        <h3 class="post-list-title"><a href="<?php the_permalink() ?>"> <?= the_title() ?></a></h3>
                        <ul class="entry_meta">
                            <li class="entry_author"><span>By </span><?php the_author_meta( 'display_name' , $author_id ); ?></li>
                            <li class="entry_date"><?= get_the_date( 'F j, Y' );  ?></li>                            
                        </ul>
                    </div>
                        
                </article>

            </li>
            <?php 
             endwhile;        

        ?>


    </ul>

</aside>

<aside class="newsletter subscription outline">
    <h4>NewsLetter</h4>
    <p><i class="fas fa-envelope-open-text"></i> Subscribe for our daily news</p>
             <?php echo do_shortcode( '[email-subscribers-form id="1"]' ); ?>
             <!-- <form class="subscription-form" method="POST">
                 <div class="subscription-form-fields">
                    <div class="form-group">
                        <input type="email" nmae="email" placeholder="Your email" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-lg btn-color" value="Sign Up" />
                    </div>
                 </div>
             </form>  -->
</aside>

<aside class="social-media outline">
    <h4>Social Media </h4>
    <?php echo render_component('socialMedia-side'); ?>  
</aside>

<aside class="social-follow outline">
            <h4>Follow Us!</h4>
             <div class="social-follow-wrap">
                <div class="row">
                    <div class="col">
                        <a class="social social-facebook" href="https://www.facebook.com/ipectr/" target="_blank">
                           <i class="fab fa-facebook-f"></i>
                           <span class="social_text">Facebook</span>
                        </a>
                    </div>
                    <div class="col">
                        <a class="social social-twitter" href="https://twitter.com/ipectr" target="_blank">
                        <i class="fab fa-twitter"></i>
                        <span class="social_text">Twitter</span>
                        </a>
                    </div>
                </div>                
             </div>
           
</aside>