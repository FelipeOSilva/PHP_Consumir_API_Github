<?php

class RepositorioModel {
	private $nomeRepositorio;
	private $urlRepositorio;

	public function __construct($json){
		$this->setNomeRepositorio($json->name);
		$this->setUrlRepositorio($json->html_url);
	}

	public function setNomeRepositorio($nomeRepositorio){
		$this->nomeRepositorio = $nomeRepositorio;
	}
	public function getNomeRepositorio(){
		return $this->nomeRepositorio;
	}

	public function setUrlRepositorio($urlRepositorio){
		$this->urlRepositorio = $urlRepositorio;
	}
	public function getUrlRepositorio(){
		return $this->urlRepositorio;
	}

}
?>
