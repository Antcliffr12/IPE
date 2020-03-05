<div class="director-message">
  <div class="container">
    <div class="box-row row">
      <div class="image">
          <img class="img-fluid" src="<?= $image_url ?>"/>
      </div>
      <div class="col-sm">
        <div class="faculty-info">
          <h2>Message from the Director</h2>
          <h4><?= $title ?></h4>
          <p><?php
          $more = '... <a href="#" class="red-link">Read</a>';
          echo wp_trim_words( $body, 32, $more );

           ?> </p>
        </div>
      </div>
    </div>
  </div>
  <img class="building-image" src="<?= THEME_PATH ?>/assets/images/Photo-Home-IPE-Faded-Building.png" alt="building"/>
</div>
