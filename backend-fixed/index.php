<?php
$pdo = new PDO("sqlite:database.sqlite");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$cols = $pdo->query("PRAGMA table_info(media)")->fetchAll(PDO::FETCH_COLUMN, 1);

$sql = "SELECT media.id,
               media.name AS title,
               type.name  AS type
        FROM media
        LEFT JOIN type ON media.type = type.id";

$statement = $pdo->query($sql);             
$medias = $statement->fetchAll(PDO::FETCH_ASSOC);

$basePath = __DIR__ . '/images';
$baseUrl  = 'http://localhost:8000/images';

foreach ($medias as &$m) {
    $id = (int)$m['id'];

    $coverPath = $basePath . "/{$id}_cover.jpg";
    $titlePath = $basePath . "/{$id}_title.png";
    $hoverPath = $basePath . "/{$id}_hover.png";

    $m['cover_url']     = file_exists($coverPath) ? $baseUrl . "/{$id}_cover.jpg" : null;
    $m['title_url']     = file_exists($titlePath) ? $baseUrl . "/{$id}_title.png" : null;
    $m['character_url'] = file_exists($hoverPath) ? $baseUrl . "/{$id}_hover.png" : null;
}
unset($m);

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');
echo json_encode($medias, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

