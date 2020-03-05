<section id="content">
    <div class="rvt-container rvt-container--senior rvt-container--center news"> 
        <section id="blog-features">
            <div class="row">
                <div class="blog-features_main column">
                    <div class="card card-featured " >
                    <?php 
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 1, // Number of recent posts thumbnails to display
                            'post_status' => 'publish' // Show only the published posts
                        ));
                        foreach($recent_posts as $post) :
                    ?>
                    <a href="<?= get_permalink( $post['ID'] ); ?>">
                        <div class="img-wrap">
                         <?php echo get_the_post_thumbnail($post['ID']); ?>

                        </div>
                        <div class="card-body">
                        <h3><?= $post['post_title'] ?></h3>
                        <p class="card-text"><?php the_author_meta( 'display_name', $post['post_author'] ); ?> | <?= date( 'F jS', strtotime( $post['post_date'] ) );  ?></p>   
                        </div><!-- card body --> 
                        </a>
                    <?php endforeach; wp_reset_query(); ?>
                   </div><!-- card -->
                </div><!-- blog feature --> 
                <div class="blog-features_side column">
                            <?php $rest_of_recent = wp_get_recent_posts(array(
                                'numberposts' => 3,
                                'post_status' => 'publish',
                                'offset' => 1
                            ));
                            foreach($rest_of_recent as $recent) :
                            ?>

                    <div class="card most-popular_blog ">
                     <a href="<?= get_permalink( $recent['ID'] ); ?>">
                        <div class="card-horizontal">

                            <div class="card-body">
                                <h4 class="card-title"><?= $recent['post_title'] ?></h4>
                                <p class="card-text"><?php the_author_meta( 'display_name', $recent['post_author'] ); ?> | <?= date( 'F jS', strtotime( $recent['post_date'] ) );  ?></p>
                            </div>

                            <div class="img-square-wrapper">
                                 <?php echo get_the_post_thumbnail($recent['ID']); ?>
                            </div>
                            
                        </div><!-- card horizontal -->      
                    </a>            
                    </div><!-- card -->
                            <?php endforeach; wp_reset_query(); ?>
                </div><!-- blog-features_side -->
                     
                
            </div>  <!-- row -->    
           
        </section>
    </div>
</section>