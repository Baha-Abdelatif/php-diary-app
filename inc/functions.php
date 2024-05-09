<?php
function breakline()
{
  echo "<br/><hr/><br/>";
}
function e($text)
{
  echo htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}
function ebr($text)
{
  echo nl2br(htmlspecialchars($text, ENT_QUOTES, 'UTF-8'));
}

function randomDate($firstDate = '2000-01-01', $secondDate = '2049-12-31', $format = 'Y-m-d'): string
{
  $firstDateTimeStamp = strtotime($firstDate);
  $secondDateTimeStamp = strtotime($secondDate);

  if ($firstDateTimeStamp < $secondDateTimeStamp) {
    return date($format, mt_rand($firstDateTimeStamp, $secondDateTimeStamp));
  }

  return date($format, mt_rand($secondDateTimeStamp, $firstDateTimeStamp));
}
