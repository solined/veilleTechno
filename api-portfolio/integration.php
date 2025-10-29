<?php
// integration.php
// Exemple d'intégration REST + GraphQL

function getBooks(): array {
    $response = file_get_contents('https://mon-api.test/api/books');
    return json_decode($response, true);
}

function getSpaceXLaunches(): array {
    $query = '{ launchesPast(limit: 3) { mission_name launch_date_utc } }';
    $opts = [
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/json",
            'content' => json_encode(['query' => $query])
        ]
    ];
    $context  = stream_context_create($opts);
    $response = file_get_contents('https://api.spacex.land/graphql/', false, $context);
    return json_decode($response, true)['data']['launchesPast'];
}

$books = getBooks();
$launches = getSpaceXLaunches();

echo json_encode([
    'books' => $books,
    'latest_launches' => $launches
], JSON_PRETTY_PRINT);
