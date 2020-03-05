<!--

Title
Content 
// metabox leadership_title get_post_meta
//metabox leadership_exec get_post_meta
-->
<div id="leadership">
    <h2 class="mt-4">Staff</h2>
    <span class="border-top"></span>
    <div class="rvt-container rvt-container--senior rvt-container--center">
           
        <div class="row">
            <?php 
             $loop = new WP_Query(array(
                'post_type' => 'Leadership',
                'posts_per_page' => -1,
                'post_status' => 'publish', 
                'orderby' => 'menu_order', 
                'order' => 'ASC', 
                'meta_query'=> array(
                    array(
                        'key' => 'leadership_exec', // this key will change!
                        'compare' => '=',
                        'value' => 'no',
                    ),
                   
                ),
            ));           
            
        ?>
      
        <?php 
         while ( $loop->have_posts() ) : $loop->the_post(); ?>
       
         
            <div class="col-sm-6 col-md-4 pb-2 mb-4 mobile-leadership">
                <a data-toggle="modal" data-target="#exampleModal-<?=get_the_ID(); ?>" style="cursor:pointer;" data-whatever="<?=get_the_ID() ?>">
                    <div class="team-member">
                        <div class="team-member-icon">
                            <div class="team-icon">                                
                            </div><!-- team icon -->
                        </div><!-- team member icon -->
                        <div class="team-member-info">
                            <div class="team-member-name info-team">
                                <?= the_title(); ?>
                            </div><!-- team member name  -->


                            <?php if(empty(get_post_meta( get_the_ID(), 'leadership_title', true ))) {
                                echo '';
                                }else{
                                ?>
                                <div class="team-member-title info-team">
                                    <?= get_post_meta( get_the_ID(), 'leadership_title', true ); ?>
                                </div><!-- title -->
                                <?php 
                            }                           
                          ?>                        
                        </div><!-- team member info -->
                            
                  
                            <div class="team-member-img-wrap">
                                <?php 
                                if(has_post_thumbnail()){
                                   echo the_post_thumbnail('medium', ['class' => 'd-block head-shot']); 
                                }else{
                                    echo '<img class="d-block head-shot" src="https://via.placeholder.com/214x300" />';
                                }
                                ?>
                            </div><!-- image wrap -->


                    </div><!-- team-member -->
                </a>
            </div><!-- col sm 3 -->
         

            <!-- modal -->

            <div class="modal fade" id="exampleModal-<?=get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        <div class="modal-header">
                
                                <div class="img-wrap">
                                  <?=  the_post_thumbnail('full', ['class' => 'd-block modal-head-shot']);  ?>
                                </div>
                                <div class="modal_team_member_info">

                                    <div class="modal-team-member-name info-team">
                                        <h2><?= the_title(); ?></h2>
                                    </div><!-- team member name  -->

                                 <?php if(empty(get_post_meta( get_the_ID(), 'leadership_title', true ))) {
                                echo '';
                                }else{
                                ?>
                                <div class="modal-team-member-title info-team">
                                    <?= get_post_meta( get_the_ID(), 'leadership_title', true ); ?>
                                </div><!-- title -->
                               <?php 
                                   }                           
                                ?>                        
                                    
                                </div>
                               
                        
                           
                            
                        </div>
                        <div class="modal-body">
                            <p><?= the_content() ?></p> 
                        </div>
            
                    </div>
                </div>
            </div>
              
            
            <?php endwhile; wp_reset_query(); ?>

        </div><!-- row -->
        
    </div>
</div>


