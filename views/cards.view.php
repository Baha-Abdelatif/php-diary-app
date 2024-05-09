<div class="card">
  <div class="card__image-container">
    <img class="card__image" src="images/<?php e($images_arr[$result['id'] - 1]); ?>" alt="" />
  </div>
  <div class="card__desc-container">
    <div class="card__desc-time">
      <?php e($result['date']) ?>
    </div>
    <h2 class="card__heading">
      <?php e($result['title']) ?>
    </h2>
    <p class="card__paragraph">
      <?php ebr($result['message']) ?>
    </p>
  </div>
</div>
