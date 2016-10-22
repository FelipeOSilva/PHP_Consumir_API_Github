<?php
/*Classe responsavel pela pesquisa*/
class PesquisaController{
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
    /*Verificando se existe usuarios que correspondem a pesquisa*/
    if(($resultado->total_count)<=0){
      return "Não possui usuario com esse nome";
    }
    else{
      return var_dump($resultado);
    }
  }
}
/*Teste da Classe*/
$pesquisaController = new PesquisaController;
$usuariosEncontrados = $pesquisaController->pesquisarUsuarios("https://api.github.com/search/users?q=felipe");
echo $usuariosEncontrados;
?>
