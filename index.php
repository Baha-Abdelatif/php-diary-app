<?php readfile(__DIR__ . "/views/header.html") ?>
<?php require_once __DIR__ . "/inc/functions.php"; ?>
<?php
$dummy_entries = [
  "images/pexels-canva-studio-3153199.jpg",
  "images/pexels-tranmautritam-68761.jpg",
  "images/pexels-lumn-167682.jpg",
  "images/pexels-kaushal-moradiya-2781195.jpg",
]
?>
<?php require_once __DIR__ . "/inc/db.connect.inc.php"; ?>
<div class="container">
  <h1 class="main-heading">Entries</h1>

  <?php foreach ($dummy_entries as $entry) : ?>
    <div class="card">
      <div class="card__image-container">
        <img class="card__image" src="<?php e($entry); ?>" alt="" />
      </div>
      <div class="card__desc-container">
        <div class="card__desc-time">Week 1</div>
        <h2 class="card__heading">PHP is amazing!</h2>
        <p class="card__paragraph">
          PHP, a widely used server-side scripting language, stands out for its remarkable
          ease of use, extensive community support, and flexibility. It integrates
          seamlessly with HTML, making it ideal for web development, and offers a vast array
          of frameworks that streamline the development process. PHP's compatibility with
          various databases, its cost-effectiveness (being open-source), and its constant
          evolution with regular updates contribute to its enduring popularity and cool
          factor in the web development world.
        </p>
      </div>
    </div>
  <?php endforeach; ?>

  <ul class="pagination">
    <li class="pagination__li">
      <a class="pagination__link" href="#">⏴</a>
    </li>
    <li class="pagination__li">
      <a class="pagination__link pagination__link--active" href="#">1</a>
    </li>
    <li class="pagination__li">
      <a class="pagination__link" href="#">2</a>
    </li>
    <li class="pagination__li">
      <a class="pagination__link" href="#">3</a>
    </li>
    <li class="pagination__li">
      <a class="pagination__link" href="#">⏵</a>
    </li>
  </ul>
</div>
<?php readfile(__DIR__ . "/views/footer.html");
