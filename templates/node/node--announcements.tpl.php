<article id="node-<?php print $node->nid; ?>" class="announcement <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>


  <?php if ($content['field_announcement_image']): ?>
  <div class="announcement__image">
    <?php print render($content['field_announcement_image']); ?>
  </div>
  <?php endif; ?>

  <?php if ($content['field_announcement_day']): ?>
  <div class="announcement__day">
    <?php print render($content['field_announcement_day']); ?>
  </div>
  <?php endif; ?>

  <a href="<?php print $node_url; ?>" class="announcement__titlegroup">
    <h3 class="announcement__name"><?php print filter_xss($title); ?></h3>

    <?php if ($content['body']): ?>
    <span class="announcement__title">
      <?php print render($content['body']); ?>
    </span>
    <?php endif; ?>
  </a>

</article>


