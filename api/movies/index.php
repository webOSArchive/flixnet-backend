<?php
header('Content-Type: application/json');
echo json_encode(array(
    array(
        "id"          => 0,
        "imdb_id"     => "",
        "tmdb_id"     => "",
        "title"       => "Please Update Flixnet",
        "description" => "This version of Flixnet is no longer supported and cannot connect to the movie service. Please visit webosarchive.org to download the latest version.",
        "year"        => "",
        "runtime"     => "",
        "rating"      => "",
        "language"    => "en",
        "identifier"  => "",
        "moviepath"   => "",
        "poster"      => "",
        "backdrop"    => ""
    )
));
?>
