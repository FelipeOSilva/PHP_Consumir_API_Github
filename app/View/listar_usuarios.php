<?php
require "Controller/PesquisarController.php";

/*Verificando request do campo de busca do usuario*/
if(isset($_REQUEST['usuario']) && $_GET["usuario"]):
  /*Atribuindo à variavel $usuario o valor enviado por get*/
  $usuario = $_GET['usuario'];
  $usuario = str_replace(" ","",$usuario);
  $pesquisarController = new PesquisarController;
  /*Atribuindo à variavel $usuarios o retorno da pesquisa realizada*/
  $usuarios = $pesquisarController->pesquisarUsuarios('https://api.github.com/search/users?q='.$usuario);

?>
<div class="ghcontent">
  <ul>
    <!--Verificando se usuario existe e caso exita realiza um foreach para cada objeto retornado-->
    <?php if($usuarios):?>
      <?php foreach ($usuarios as $user):?>
      <li>
          <div class="usuarios">
            <a href="usuario_info.php?usuario=<?php echo $user->getUsuario();?>" target="_self">
            <img src="<?php echo $user->getAvatarUrl();?>" width="80" height="80" alt="<?php echo $user->getUsuario();?>">
            <h4><?php echo $user->getUsuario();?></h4>
          </a>
          </div>
      </li>
      <?php endforeach; ?>
    <!--Caso não haja usuarios cadastrados que correspondam ao nome buscado, é retornado essa mensagem.-->
    <?php else: echo "Nome de usuário não encontrado";?>
  <?php endif; ?>
  </ul>
</div>
<?php endif;?>
