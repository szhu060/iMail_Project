<?php

class DBConnection {
	protected $connection;

	public function getConnInstant(){
		if(!isset($this->connection)){
			$this->connection = new PDO("mysql:host=localhost;dbname=rest;charset=utf8mb4","root","root");
		}
		return $this->connection;
	}

	public function addTemplate($content,$name,$vars){
		//TODO : ADD CHECK -

		// ADD TO DB
		$stmt = $this->getConnInstant()->prepare("INSERT INTO templates (tcontent,tname,tvar) VALUES (:content, :name, :vars)");
		$result = $stmt->execute(
			array(
			':content' => $content,
			':name' => $name,
			':vars' => $vars
			)
		);
		return $result;
	}

	public function getAllTemplates(){
		$stmt = $this->getConnInstant()->query("SELECT * FROM templates");
		$templates = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//TODO : ARRAY TO OBJECT MODEL


		$result = array();
		foreach($templates  as $template){
			$temp = array(
				'content' => $template['tcontent'],
				'name' => $template['tname'],
				'vars' => $template['tvar'],
				'id' => $template['tid']
			);
			$result[] = $temp;

		}
		return $result;
	}


// $db = new DBConnection();
// $sth = $db->getAllTemplates();
// var_dump($sth);
	
	public function getTemplateById($id){
		$stmt = $this->getConnInstant()->prepare("SELECT * FROM templates where tid = :tid");
		$stmt->execute(
		array(
			':tid' => $id,
			)
		);

		$template = $stmt->fetch();
		$result = array(
				'content' => $template['tcontent'],
				'name' => $template['tname'],
				'vars' => $template['tvar'],
				'id' => $template['tid']
		);

		return $result;
		}


	



}

	// $db = new DBConnection();
	// $sth = $db->getTemplateById(1);
	// var_dump($sth);




?>