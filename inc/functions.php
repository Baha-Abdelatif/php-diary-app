<?php
function breakline()
{
  echo "<br/><hr/><br/>";
}
function e($text)
{
  echo htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

if (str_starts_with($_SERVER['HTTP_HOST'], 'localhost')) {
  $env = file_get_contents(dirname(__DIR__) . "/.env");
  $lines = explode("\n", $env);

  foreach ($lines as $line) {
    preg_match("/([^#]+)\=(.*)/", $line, $matches);
    if (isset($matches[2])) {
      putenv(trim($line));
    }
  }
}
