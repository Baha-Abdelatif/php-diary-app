<?php readfile(__DIR__ . "/views/header.view.html");
require_once __DIR__ . "/inc/functions.php";
require_once __DIR__ . "/inc/db.connect.inc.php";
if (!empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["message"]) && !empty($_FILES["image"])) {
  $entered_title = (string) $_POST["title"] ?? "";
  $entered_message = (string) $_POST["message"] ?? "";
  $entered_date = (string) $_POST["date"] ?? "";
  $entered_image = null;

  require_once __DIR__ . "/inc/img.upload.inc.php";

  $stmt = $pdo->prepare('INSERT INTO `entries` (`title`,`img_url`, `message`,`date`) VALUES (:enteredtitle, :enteredimage,:enteredmessage, :entereddate)');
  $stmt->bindValue('enteredtitle', $entered_title);
  $stmt->bindValue('enteredimage', $entered_image);
  $stmt->bindValue('enteredmessage', $entered_message);
  $stmt->bindValue('entereddate', $entered_date);
  $stmt->execute();

  echo '<h1>New entry saved!</h1><br/><hr/><br/><a href="index.php"><- Continue to the diary</a>';
  die();
}
?>
<h1 class="main-heading">New Entry</h1>
<form method="POST" action="form.php" enctype="multipart/form-data">
  <div class="form-group">
    <label class="form-group__label" for="title">Title:</label>
    <input required class="form-group__input" type="text" id="title" name="title" />
  </div>
  <div class="form-group">
    <label class="form-group__label" for="image">Image:</label>
    <input class="form-group__input" type="file" id="image" name="image" />
  </div>
  <div class="form-group">
    <label class="form-group__label" for="date">Date:</label>
    <input required class="form-group__input" type="date" id="date" name="date" />
  </div>
  <div class="form-group">
    <label class="form-group__label" for="message">Message:</label>
    <textarea required class="form-group__input" id="message" name="message" rows="6"></textarea>
  </div>
  <div class="form-submit">
    <button class="button">
      <svg class="button__icon" viewBox="0 0 34.7163912799 33.4350009649">
        <g style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2px;">
          <polygon points="20.6844359446 32.4350009649 33.7163912799 1 1 10.3610302393 15.1899978903 17.5208901631 20.6844359446 32.4350009649" />
          <line x1="33.7163912799" y1="1" x2="15.1899978903" y2="17.5208901631" />
        </g>
      </svg>
      Save!
    </button>
  </div>
</form>
<?php readfile(__DIR__ . "/views/footer.view.html");
