<div class="rvt-grid__item-lg">
  <div class="rvt-box">
    <div class="rvt-box__body">
        <h2><?= $title; ?></h2>
        <span class="line"></span>
        <p>
          <?= $intro ?>
        </p>
        <?php if (count($buttons) > 0) { ?>
        <div class="grid-button">
          <?php foreach($buttons as $button) { ?>
          <a class="btn btn-primary <?= isset($button['iu_logo']) ? " {$button['iu_logo']}" : '' ?>" data-style="default" href="<?= $button['button_link'] ?>"<?= isset($button['button_link_target']) ? ' target="'.$button['button_link_target'].'"' : '' ?>><?= $button['button_text'] ?></a>
        <?php } ?>
        </div>
        <?php } ?>

    </div>
  </div>
</div>