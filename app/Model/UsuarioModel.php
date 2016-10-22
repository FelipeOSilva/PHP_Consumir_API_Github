<?php
/*Classe para armazenar informações sobre os usuarios
do  retorno da pesquisa, realizando os gets e sets*/
class UsuarioModel {
	private $usuario;
	private $avatar;

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
