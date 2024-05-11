<?php
$upload_errors = false;
if (!empty($_FILES) && !empty($_FILES['image']) && $_FILES['image']['error'] === 0 && $_FILES['image']['size'] !== 0) {
  $nameWithoutExtension = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
  $name = preg_replace('/[^a-zA-Z0-9]/', '', $nameWithoutExtension);

  $originalImage = $_FILES['image']['tmp_name'];
  $imageName = $name . '-' . time() . '.jpg';
  $destImage = dirname(__DIR__) . '/uploads/' . $imageName;

  $image_size = getimagesize($originalImage);
  if (!empty($image_size)) {
    [$width, $height] = $image_size;

    $maxDim = 400;
    $scaleFactor = $maxDim / max($width, $height);

    $newWidth = $width * $scaleFactor;
    $newHeight = $height * $scaleFactor;

    $im = imagecreatefromjpeg($originalImage);
    if (!empty($im)) {
      $newImg = imagecreatetruecolor($newWidth, $newHeight);
      imagecopyresampled($newImg, $im, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

      imagejpeg($newImg, $destImage);
      $entered_image = $imageName;
    } else {
      $upload_errors = true;
    }
  } else {
    $upload_errors = true;
  }
}
if ($upload_errors) {
  echo '<h1>Invalid file format!</h1>';
  echo '<br/><hr/><br/>';
  echo '<p>Allowed files: .jpg, .jpeg</p>';
  echo '<br/><hr/><br/>';
  echo '<a href="index.php"><- Continue to the diary</a>';
  die();
}
