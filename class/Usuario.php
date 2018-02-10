<?php

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function __construct($login = "", $pass = "") //adcionando "" nao torna o método obrigatório
	{
		$this->setDeslogin($login);
		$this->setDessenha($pass);
	}
	function setData($data){
		$this->setIdusuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));
	}

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
			$this->setData($result[0]);
		}
	}	

	public static function getLista(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
	}

	public static function search($login){
		$sql = new Sql();
		return $sql->select ("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", 
			array(':SEARCH' =>"%".$login."%"));
	}

	public function login($login, $pass){		
		$sql = new Sql();
		$result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASS", array(
			":LOGIN"=>$login,
			":PASS"=>$pass
		));
		if (count($result) > 0) {
			$this->setData($result[0]);
		} else {
			throw new Exception("Usuário e/ou senha inválidos!");
		}
	}

	public function insert(){
		$sql = new Sql();
		$result = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASS)", array(
			':LOGIN'=>$this->getDeslogin(),
			':PASS'=>$this->getDessenha()
		));
		if (count($result) > 0) {
			$this->setData($result[0]);
		}
	}

	public function update($login, $pass){
		$this->setDeslogin($login);
		$this->setDessenha($pass);
		$sql = new Sql();
		$result = $sql->query("UPDATE tb_usuarios SET deslogin =:LOGIN, dessenha = :PASS WHERE idusuario = :ID" , array(
			':LOGIN'=>$this->getDeslogin(),
			':PASS'=>$this->getDessenha(),
			':ID'=>$this->getIdusuario()
		));
	}

	public function delete(){
		$sql = new Sql();
		$result =$sql->query("DELETE FROM tb_usuarios WHERE idusuario =:ID", array(
			':ID'=>$this->getIdusuario()
		));
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