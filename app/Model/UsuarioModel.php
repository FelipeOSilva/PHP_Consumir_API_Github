<?php
/*Classe para armazenar informações sobre os usuarios
do  retorno da pesquisa, realizando os gets e sets*/
class UsuarioModel {
	private $usuario;
	private $avatar;

  /*Construtor para receber um json e setar os valores nas devidas variaveis*/
  public function __construct($json){
		$this->setUsuario($json->login);
		$this->setAvatarUrl($json->avatar_url);
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
}
