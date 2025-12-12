<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\HttpNotFoundException;

use App\Controller\PilotoController;
use App\Controller\EquipeController;
use App\Controller\MontadoraController;
use App\Controller\SeriesController; 

require_once(__DIR__ . '/vendor/autoload.php');

$app = AppFactory::create();
$app->setBasePath("/pilotos_api"); 

$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true); 

//rotas para piloto
$pilotoController = PilotoController::class;
$app->get("/pilotos", $pilotoController . ":listar");
$app->get("/pilotos/{id}", $pilotoController . ":buscarPorId"); 
$app->post("/pilotos", $pilotoController . ":inserir");
$app->put("/pilotos/{id}", $pilotoController . ":editar"); 
$app->delete("/pilotos/{id}", $pilotoController . ":excluir");

// Rota de Teste
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("API de Pilotos Funcionando!");
    return $response;
});

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});

$app->run();