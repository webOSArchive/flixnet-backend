<?php
// Exports all movies with their genre IDs for bundling into the app.
// Run once and commit the output; the app loads it directly without a backend.
//
// Usage: curl https://flixnet.webosarchive.org/utils/export-app-data.php -o enyo-app/data/movies.json
include "../database.php";
$conn = connectDB();
header('Content-Type: application/json');

$sql = "SELECT * FROM tbl_movies ORDER BY title";
$stmt = $conn->prepare($sql);
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_OBJ);

$sql = "SELECT movie_id, genre_id FROM tbl_movie_genres";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_OBJ);

$genreMap = array();
foreach ($rows as $row) {
    $mid = $row->movie_id;
    if (!isset($genreMap[$mid])) {
        $genreMap[$mid] = array();
    }
    $genreMap[$mid][] = (int)$row->genre_id;
}

foreach ($movies as $movie) {
    $movie->genre_ids = isset($genreMap[$movie->id]) ? $genreMap[$movie->id] : array();
}

echo json_encode($movies);
?>
