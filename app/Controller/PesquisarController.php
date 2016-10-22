<?php
require "Model/UsuarioModel.php";
/*Classe responsavel pela pesquisa*/
class PesquisarController{
  function pesquisarUsuarios($url){
    /*Inicio do Bloco Curl - de instruções para capturar o retorno e trata-lo*/
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $saida = curl_exec($ch);

    curl_close($ch);

    $resultado = json_decode($saida);
    /*Fim do Bloco Curl*/
    /*Verificando se existe usuarios que correspondem a pesquisa, caso não exista retorna false*/
    if(!($resultado->items)){
      return false;
    }
    else{
      /*Criando uma variavel do tipo array para
      definir um array de objetos do tipo UsuarioModel*/
      $usuarioModel = array();
      /*Criando o array de objetos do tipo UsuarioModel*/
      foreach($resultado->items as $result){
        $usuarioModel[] = new UsuarioModel($result);
      }
      /*Retornando o array de objetos usuarioModel*/
      return $usuarioModel;
    }
  }
}
/*Teste da Classe*/
/*
$pesquisarController = new PesquisarController;
$usuariosEncontrados = $pesquisarController->pesquisarUsuarios("https://api.github.com/search/users?q=felipe");
echo var_dump($usuariosEncontrados);
*/
?>
