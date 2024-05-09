<?php readfile(__DIR__ . "/views/header.view.html") ?>
<?php require_once __DIR__ . "/inc/functions.php"; ?>
<?php require_once __DIR__ . "/inc/db.connect.inc.php"; ?>
<?php
$images_arr = [
  "pexels-canva-studio-3153199.jpg",
  "pexels-kaushal-moradiya-2781195.jpg",
  "pexels-lumn-167682.jpg",
  "pexels-tranmautritam-68761.jpg",
];

$perPage = (int) 3;
$current_page = (int) ($_GET['page'] ?? 1);
$offset = (int) ($current_page - 1) * $perPage;

$stmt = $pdo->prepare('SELECT * FROM `entries` ORDER BY `date` ASC, `id` ASC LIMIT :perPage OFFSET :offset');
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
