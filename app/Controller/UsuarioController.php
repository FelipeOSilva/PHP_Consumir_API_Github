<?php
require "Controller/PesquisarController.php";

class UsuarioController{
  function recuperarUsuario($url){
    $resultado = PesquisarController::pesquisar($url);

    $usuarioModel= new UsuarioModel($resultado);
    return $usuarioModel;
  }
}
/*Teste da Classe*/
/*
$usuarioController = new UsuarioController;
$usuarioEncontrado = $usuarioController->recuperarUsuario("https://api.github.com/users/felipeosilva");
echo var_dump($usuarioEncontrado);
*/

?>
