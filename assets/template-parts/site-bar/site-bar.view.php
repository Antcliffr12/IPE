<div id="branding-bar" class="iu" itemscope="itemscope" itemtype="http://schema.org/CollegeOrUniversity" role="complementary" aria-labelledby="campus-name">
<div class="row pad">
    <img src="//assets.iu.edu/brand/3.x/trident-large.png" alt="IU" />
    <p id="iu-campus">
      <a href="https://www.iu.edu" title="Indiana University">
        <span id="campus-name" class="show-on-desktop" itemprop="name">Indiana University</span>
        <span class="show-on-tablet" itemprop="name">Indiana University</span>
        <span class="show-on-mobile" itemprop="name">IU</span>
      </a>
    </p>
</div>
</div>
  <div id="toggles">
  <div class="row pad">
      <a class="button search-toggle" href="/search" aria-controls="search" aria-expanded="false"><img src="//assets.iu.edu/search/3.x/search.png" alt="Open Search" /></a>
      <button id="dropdown" class="button hide-for-large" data-toggle="offCanvas">Menu</button>
  </div>
</div>

<div id="search" class="search-box" role="search" aria-hidden="true"></div>
<div class="site-bar">
  <div class="container">
    <div class="header-menu-content">
      <a href="/" >
        <img class="img-fluid logo" src="<?= THEME_PATH; ?>/assets/images/Logo-IU-IPE.png" alt="IPE"/>
      </a>
      <div id="main-menu" class="main-menu">
        <?php
      $menuParms = array(
        'theme_location' => 'main',
        'items_wrap'      => '%3$s',
        'depth'           => 0,
        'container'       => FALSE,
         'container_id'    => FALSE,
         'menu_class'      => '',
         'menu_id'         => FALSE,

      );

      echo wp_nav_menu( $menuParms );

        ?>
      </div>
    </div>
  </div>
</div>
