<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get(
    '/api/notes',
    function (Request $request, Response $response, array $args) {
        $notes = [
            ['id' => 1, 'name' => 'Spotkanie o 17:00', 'date' => '2021-03-13'],
            ['id' => 2, 'name' => 'Lekcje o 8:00', 'date' => '2021-03-15'],
            ['id' => 3, 'name' => 'Girls go IT!', 'date' => '2021-03-18'],
        ];
        $payload = json_encode($notes);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }
   );

   $app->get(
    '/api/notes/{noteId}',
    function (Request $request, Response $response, array $args) {
        $noteId = $args["noteId"];
        $note =  ['id' => $noteId, 'name' => "Spotkanie o $noteId:00", 'date' => date('Y-m-d')];
        $payload = json_encode($note);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }
);


$app->run();
