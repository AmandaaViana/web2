<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\PilotoDao;
use App\Mapper\PilotoMapper;
use App\Service\PilotoService;
use App\Util\MensagemErro;
use \PDOException;

class PilotoController {
   
    private PilotoDao $pilotoDao;
    private PilotoService $pilotoService;
    private PilotoMapper $pilotoMapper;

    public function __construct() {
        $this->pilotoDao = new PilotoDao();
        $this->pilotoService = new PilotoService();
        $this->pilotoMapper = new PilotoMapper();
    }

	public function listar(Request $request, Response $response, array $args): Response {
		$pilotos = $this->pilotoDao->list();
		$json = json_encode($pilotos, 
			JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		$response->getBody()->write($json);

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(200);
    }

    public function inserir(Request $request, Response $response, array $args): Response {
		$pilotoArray = $request->getParsedBody();
		$piloto = $this->pilotoMapper->mapFromJsonToObject($pilotoArray);
		$erro = $this->pilotoService->validar($piloto);
		if($erro) {
			$jsonErro = MensagemErro::getJSONErro($erro,"", 400); //Bad request
			$response->getBody()->write($jsonErro);
			
			return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(400); //Bad request
		}

		try {
			$this->pilotoDao->insert($piloto);

			$json = json_encode($piloto, 
				JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			$response->getBody()->write($json);
			
			return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(201); //Criado
		} catch(PDOException $e) {
			$jsonErro = MensagemErro::getJSONErro("Erro ao inserir o piloto!",
												  $e->getMessage(),
												  500);
			$response->getBody()->write($jsonErro);
			
			return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(500); //Erro no servidor
		}
	}
    public function editar(Request $request, Response $response, array $args): Response {
		$id = $args["id"];
		$piloto = $this->pilotoDao->findById($id);
		
		if($piloto) {
			//1- Receber os dados do JSON e criar o objeto
			$pilotoArray = $request->getParsedBody();
			$piloto = $this->pilotoMapper->mapFromJsonToObject($pilotoArray);

			//2- Validar os dados
			$erro = $this->pilotoService->validar($piloto);
			if($erro) {
				$jsonErro = MensagemErro::getJSONErro($erro,"", 400); //Bad request
				$response->getBody()->write($jsonErro);
				
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(400); //Bad request
			}

			//3- Atualizar no banco (sucesso ou erro)
			try {
				$piloto->setId($id);
				$this->pilotoDao->update($piloto);

				$json = json_encode($piloto, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
				$response->getBody()->write($json);
				
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(200); //OK
			} catch(PDOException $e) {
				$jsonErro = MensagemErro::getJSONErro("Erro ao atualizar o piloto!",
												  $e->getMessage(),
												  500);
				$response->getBody()->write($jsonErro);
				
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(500); //Erro no servidor
			}
		}

		return $response
				->withStatus(404); //Not Found
    }

    public function buscarPorId(Request $request, Response $response, array $args): Response {
		$id = $args["id"];
		$piloto = $this->pilotoDao->findById($id);
		//$response->getBody()->write(print_r($pilotos, true));

		if($piloto) {
			$json = json_encode($piloto, 
				JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			$response->getBody()->write($json);

			return $response
				->withHeader('Content-Type', 'application/json')
				->withStatus(200);
		}
		
		return $response
				->withStatus(404);
    }

    public function excluir(Request $request, Response $response, array $args): Response {
		$id = $args["id"];
		$piloto = $this->pilotoDao->findById($id);
		
		if($piloto) {
			
			try {
				$this->pilotoDao->delete($piloto->getId());
				return $response
					->withStatus(200); //OK
			} catch(PDOException $e) {
				$jsonErro = MensagemErro::getJSONErro("Erro ao excluir o piloto!",
												  $e->getMessage(),
												  500);
				$response->getBody()->write($jsonErro);
				
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(500); //Erro no servidor
			}

		}

		return $response
				->withStatus(404); //Not Found
    }
}
?>