<?php
/*Classe para armazenar informações sobre os usuarios
do  retorno da pesquisa, realizando os gets e sets*/
class UsuarioModel {
	private $usuario;
	private $avatar;
  private $repositorio;
  private $urlUsuario;

  /*Construtor para receber um json e setar os valores nas devidas variaveis*/
  public function __construct($json){
		$this->setUsuario($json->login);
		$this->setAvatarUrl($json->avatar_url);
    $this->setRepositorio($json->repos_url);
		$this->setUrlUsuario($json->html_url);
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function setAvatarUrl($avatar){
		$this->avatar = $avatar;
	}
	public function getAvatarUrl(){
		return $this->avatar;
	}
  public function setRepositorio($repositorio){
		$this->repositorio = $repositorio;
	}
	public function getRepositorio(){
		return $this->repositorio;
	}
	public function setUrlUsuario($urlUsuario){
		$this->urlUsuario = $urlUsuario;
	}
	public function getUrlUsuario(){
		return $this->urlUsuario;
	}
}
