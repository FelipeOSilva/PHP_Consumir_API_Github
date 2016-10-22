<?php
require_once "Model/UsuarioModel.php";
/*Classe responsavel pela pesquisa*/
class PesquisarController{
  /*Metodo estatico para facilitar na hora de chamar a pesquisa */
  static function pesquisar($url){
    /*Inicio do Bloco Curl - de instruções para capturar o retorno e trata-lo*/

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $saida = curl_exec($ch);

    curl_close($ch);
    /*Fim do Bloco Curl*/

    return json_decode($saida);
  }

  function pesquisarUsuarios($url){
    $resultado = self::pesquisar($url);
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
