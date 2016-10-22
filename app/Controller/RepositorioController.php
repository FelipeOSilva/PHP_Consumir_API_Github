<?php
require "Model/RepositorioModel.php";
require "Controller/PesquisarController.php";

class RepositorioController{
  function recuperarRepositorios($url){
    $resultado = PesquisarController::pesquisar($url);
    /*Verificando se o usuario possue repositorio, caso nao possua false*/
    if(!$resultado){
      return false;
    }
    /*Criando uma variavel do tipo array para
    definir um array de objetos do tipo RespositorioModel*/
    $repositorioModel = array();
    foreach($resultado as $result){
      $repositorioModel[] = new RepositorioModel($result);
    }
    return $repositorioModel;
  }
}
/*Teste da Classe*/
/*
$repositorioController = new RepositorioController;
$repositoriosEncontrados = $repositorioController->recuperarRepositorios("https://api.github.com/users/felipeosilva/repos");
echo var_dump($repositoriosEncontrados);
*/
?>
