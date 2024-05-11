<?php readfile(__DIR__ . "/views/header.view.html") ?>
<?php require_once __DIR__ . "/inc/functions.php"; ?>
<?php require_once __DIR__ . "/inc/db.connect.inc.php"; ?>
<?php
$count_stmt = $pdo->prepare("SELECT COUNT(*) AS `count` FROM `entries`");
$count_stmt->execute();
$count = $count_stmt->fetch(PDO::FETCH_ASSOC)['count'];

$perPage = (int) 2;
$number_of_pages = ceil($count / $perPage);

$current_page = (int) ($_GET['page'] ?? 1);
if ($current_page < 1) $current_page = 1;
if ($current_page > $number_of_pages) $current_page = (int) $number_of_pages;

$offset = (int) ($current_page - 1) * $perPage;

$stmt = $pdo->prepare('SELECT * FROM `entries` ORDER BY `id` DESC, `date` ASC LIMIT :perPage OFFSET :offset');
$stmt->bindValue('perPage', $perPage, PDO::PARAM_INT);
$stmt->bindValue('offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h1 class="main-heading">Entries</h1>

<?php foreach ($results as $result) : ?>
  <?php include __DIR__ . "/views/cards.view.php"; ?>
<?php endforeach; ?>

<?php require_once __DIR__ . "/views/pagination.view.php"; ?>

<?php readfile(__DIR__ . "/views/footer.view.html");
