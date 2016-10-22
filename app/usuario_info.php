<?php
include 'View/header.php';

require "Controller/UsuarioController.php";
require "Controller/RepositorioController.php";

/*Verificando request do usuario clicado*/
if(isset($_REQUEST['usuario']) && $_GET["usuario"]):
  /*Atribuindo à variavel $usuario o valor enviado por get*/
  $usuario = $_GET['usuario'];

	$usuarioController = new UsuarioController;
  $repositorioController = new RepositorioController;

  /*Atribuindo à variavel $usuarios o retorno da pesquisa realizada*/
  $user = $usuarioController->recuperarUsuario('https://api.github.com/users/'.$usuario);
  /*Atribuindo à variavel $repositorios o retorno da pesquisa realizada*/
  /*$user->getRepositorio() retorna o link do repositorio do usuario*/
  $repositorios = $repositorioController->recuperarRepositorios($user->getRepositorio());
?>
      <div class="container">
        <!--Carregando informação do usuario-->
        <div class="usuario">
          <a href="<?php echo $user->getUrlUsuario();?>" target="_self">

          <img src="<?php echo $user->getAvatarUrl();?>" alt="<?php echo $user->getUsuario();?>">
          <h4><?php echo $user->getUsuario();?></h4>
          </a>
          <h3>Repositorios:</h3>
          <!--Verificando se o usuario possi repositorios-->
          <?php if($repositorios):?>
          <!--Exibindo o nome de todos os repositorios que o usuario possua-->
          <?php foreach($repositorios as $repositorio):?>
          <div class="repositorio">
            <a href="<?php echo $repositorio->getUrlRepositorio();?>" target="_self">
              <h4><?php echo $repositorio->getNomeRepositorio();?></h4>
            </a>
           </div>
           <?php endforeach;?>
           <!--Caso o usuario não possua repositório retornarar essa mensagem-->
         <?php else: echo '<h5>O usuario não possui repositórios</h5>';?>
         <?php endif; ?>
      </div>
    </div>
<?php endif;?>
<?php include 'View/footer.php';?>
