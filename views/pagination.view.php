<?php
$count_stmt = $pdo->prepare("SELECT COUNT(*) AS `count` FROM `entries`");
$count_stmt->execute();
$count = $count_stmt->fetch(PDO::FETCH_ASSOC)['count'];
$number_of_pages = ceil($count / $perPage) / 10;
?>

<ul class="pagination">
  <?php if ($current_page > 1) : ?>
    <li class="pagination__li">
      <a class="pagination__link" href="/?<?php echo http_build_query(['page' => $current_page - 1]); ?>">⏴</a>
    </li>
  <?php endif; ?>
  <?php for ($x = 1; $x <= $number_of_pages; $x++) : ?>
    <li class="pagination__li">
      <a class="pagination__link pagination__link<?php echo $x === $current_page ? "--active" : ""; ?>" href="/?<?php echo http_build_query(['page' => $x]); ?>">
        <?php e($x); ?>
      </a>
    </li>
  <?php endfor; ?>
  <?php if ($current_page < $number_of_pages) : ?>
    <li class="pagination__li">
      <a class="pagination__link" href="/?<?php echo http_build_query(['page' => $current_page + 1]); ?>">⏵</a>
    </li>
  <?php endif; ?>


</ul>
