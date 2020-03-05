<div class="slider">
  <div class="container">
    <div class="box-row row">
        <div class="col-md-8 d-flex">
          <img src="<?= $image_url ?>" alt=""/>
        </div>
        <div class="col-md-4 intro-title-box">
          <div id="slider">
          <div class="text">
            <h1><?= $title ?></h1>
            <span>Health care requires</span>
            <div class="holder_options">
              <?php
              
                if(count($slider) > 0){
                  foreach($slider as $sliders){
                    $data = wp_get_attachment_image_src($sliders['image']);
                    $image_url = $data[0];
                    $file_parts = pathinfo($image_url);
                    print_r($file_parts);
                    ?>
                      <p>
                        <?=
                        $sliders['content_text'];
                        ?>
                      </p>
                    <?php
                  }
                }
                ?>
            </div>

          </div>
        </div>
          <div class="buttons d-flex">
            <a class="control_next" id="prev" href="#"><img src="<?= THEME_PATH ?>/assets/images/Button-Previous-White.png" alt="Previous"/></a>
            <a class="control_prev" id="next" href="#"><img src="<?= THEME_PATH ?>/assets/images/Button-Next-White.png" alt="Next"/></a>
          </div>
        </div>
      </div>
  </div>
</div>
