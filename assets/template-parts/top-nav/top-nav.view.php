<div id="top-nav">
  <div class="rvt-container rvt-container--senior rvt-container--center rvt-grid">
  <div class="rvt-header__trident rvt-grid__item-sm">
      <a href="/" class="link-logo">
      <?php 
        if( get_theme_mod( 'your_theme_logo') ) :
      ?>
      <img src="<?= get_theme_mod('your_theme_logo'); ?>" alt="<?= esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
      <?php else : ?>
          <img class="logo" src="<?= THEME_PATH; ?>/assets/images/IPE-White.svg" alt="IPE"/>
      <?php endif; ?>
      </a>
  </div>
    <!-- logo -->
    <div class="Navbar__Link Navbar__Link-toggle">
       <i id="mobile_menu" class="far fa-bars"></i>
    </div>
        <nav class="rvt-header__main-nav rvt-grid__item-sm" role="navigation">
        <?php
          $menuParms = array(
            'theme_location' => 'top',
            'items_wrap' => top_nav_wrap(),
            'depth' => 0, 
            'echo' => false,
            'container' => true,
            

          );
          echo wp_nav_menu( $menuParms );
        ?>
        </nav>

        <!-- top navigation -->

  </div>
</div>