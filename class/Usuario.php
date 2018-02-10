<?php

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}
	public function setIdusuario($i){
		$this->idusuario=$i;
	}
	public function getDeslogin(){
		return $this->deslogin;
	}
	public function setDeslogin($dl){
		$this->deslogin=$dl;
	}
	public function getDessenha(){
		return $this->dessenha;
	}
	public function setDessenha($ds){
		$this->dessenha=$ds;
	}
	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	public function setDtcadastro($dt){
		$this->dtcadastro=$dt;
	}


	public function loadById($id){
		
		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario =:ID", array(
			":ID"=>$id
		));

		if (count($result) > 0) {
			$row = $result[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}

	}	
	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s") 
		));
	}
				

}