<nav id="bottom-nav">
    <div class="rvt-container rvt-container--senior rvt-container--center rvt-grid">
         <nav class="rvt-header__main-nav rvt-grid__item-lg" role="navigation">
         <?php 
                $bottomParms = array(
                    'theme_location' => 'bottom',
                    'items_wrap' => bottom_nav_wrap(),
                    'depth'           => 0,
                    'container'       => FALSE,
                    'container_id'    => FALSE,
                    'menu_class'      => '',
                    'menu_id'         => FALSE,
                    'walker' => new WalkerNavSidebar()

                );

                echo wp_nav_menu( $bottomParms );
            ?>
         </nav>
    </div>
</nav>