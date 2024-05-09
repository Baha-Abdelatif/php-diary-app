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
