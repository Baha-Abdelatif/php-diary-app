<?php

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

$db_charset = "utf8mb4";
$db_host = getenv("DIARY_APP_HOST");
$db_db = getenv("DIARY_APP_DB");
$db_user = getenv("DIARY_APP_DBUSER");
$db_pass = getenv("DIARY_APP_DBPASS");

try {
  $pdo = new PDO("mysql:host=$db_host;dbname=$db_db;charset=$db_charset", $db_user, $db_pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ]);
} catch (PDOException $e) {
  // var_dump($e->getMessage());
  echo 'A problem occured with the database connection...';
  die();
}
