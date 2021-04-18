<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

class NotesDB extends SQLite3 {
    function __construct() {
        $this->open('../notes.db');
    }
}
$db = new NotesDB();

$app = AppFactory::create();

$app->get(
    '/api/notes',
    function (Request $request, Response $response, array $args) use($db) {
        $notes = [];
        $result = $db->query('SELECT * FROM note');
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $notes[] = $row;
        }
        $payload = json_encode($notes, JSON_UNESCAPED_UNICODE);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }
);

   $app->get(
    '/api/notes/{noteId}',
    function (Request $request, Response $response, array $args) use($db) {
        $note = $db->query("SELECT * FROM note WHERE id = $args[noteId]")->fetchArray(SQLITE3_ASSOC);
        if ($note) {
            $response->getBody()->write(json_encode($note, JSON_UNESCAPED_UNICODE));
            return $response->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode(['message' => 'Nie ma takiej notatki']));
        return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
    }
);

$app->run();
