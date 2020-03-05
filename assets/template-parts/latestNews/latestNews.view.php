<div class="rvt-container rvt-container--senior rvt-container--center news"> 
    <div class="latestNews">
        <div class="row">
            <div class="col-lg-8 col-sm-12 latestNewsWrap">
                <div class="title-wrap-line">
                    <h2>Lastest News</h2>                    
                </div><!-- title wrap line -->
                     <div class="latestNews-grid">
                        <div class="row card-row">
                               <!-- js page -->
                        </div>
                        
                    </div><!-- latest news grid -->

                    <?php global $post; ?>

                    <div class="button-wrap col text-center">
                        <button class="btn btn-loadMore" id="load-more">Load More</button>
                     </div>
                    
                     <div class="events">
                         <h2>Upcoming Events</h2> 
                    </div>
                    <div class="btn-wrap">
                        <button type="button" id="btn-load-more" class="btn btn-secondary event_load">Load More</button>
                    </div><!-- btn wrap -->
                </div><!-- left col -->
            
            <div class="col-lg-4 col-sm-12 sidebar-right">
                <?php echo render_component('NewsSide'); ?>
            </div>
        </div>
    </div>
</div><!-- container -->

