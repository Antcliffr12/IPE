<div id="heroArea">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="true">
    <ol class="carousel-indicators">
    <?php     
    foreach($slider as $key => $value){
        ?>
        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key; ?>" class="active"></li>
        <?php 
    }
    ?>
    </ol>
    <div class="carousel-inner">
        <!-- start -->
       <?php 
       $id = 0;
            foreach($slider as $key => $value){
                $active = ($key == 0) ? " active" : "";

                $class = 'carousel-item';

                $content_heading = isset($value['content_heading']) ? $value['content_heading'] : '';
                $content_text = isset($value['content_text']) ? $value['content_text'] : '';
                $data = wp_get_attachment_url($value['image']);
                $image_url = $data;
                $file_parts = pathinfo($image_url);
                $button_text = isset($value['button_text']) ? $value['button_text'] : '';
                $button_link = isset($value['button_link']) ? $value['button_link'] : '';

              
                ?>  
            <div class='carousel-item <?= $active ?>'>  
                <div class="background-slider slider-<?= $id; ?>">
                <?php 
                // print_r($file_parts['extension']);
                    get_extension($file_parts['extension'], $image_url, $content_heading, $content_text, $button_text, $button_link, $id)
                ?>
                </div>
            </div>
                <?php 
                $id++;  
            }            
        ?>
       <!-- stop -->
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</div>
