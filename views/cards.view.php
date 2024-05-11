<?php date_default_timezone_set('america/new_york');
setlocale(LC_TIME, 'en_US.UTF-8');
$date_exploded = explode('-', $result['date']);
$timestamp = mktime(12, 0, 0, $date_exploded[1], $date_exploded[2], $date_exploded[0]);

?>
<div class="card">
  <?php if (!empty($result['img_url'])) : ?>
    <div class="card__image-container">
      <img class="card__image" src="uploads/<?php e($result['img_url']); ?>" alt="" />
    </div>
  <?php endif; ?>
  <div class="card__desc-container">
    <div class="card__desc-time">
      <?php e(date('l jS \of F Y', $timestamp)); ?>
    </div>
    <h2 class="card__heading">
      <?php e($result['title']) ?>
    </h2>
    <p class="card__paragraph">
      <?php ebr($result['message']) ?>
    </p>
  </div>
</div>
