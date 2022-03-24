<?php
namespace models;

use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "associatedproduct")]
class Associatedproduct{
	
	#[Column(name: "idProduct",dbType: "int(11)")]
	#[Validator(type: "notNull",constraints: [])]
	private $idProduct;

	
	#[Column(name: "idAssoProduct",dbType: "int(11)")]
	#[Validator(type: "notNull",constraints: [])]
	private $idAssoProduct;


	public function getIdProduct(){
		return $this->idProduct;
	}


	public function setIdProduct($idProduct){
		$this->idProduct=$idProduct;
	}


	public function getIdAssoProduct(){
		return $this->idAssoProduct;
	}


	public function setIdAssoProduct($idAssoProduct){
		$this->idAssoProduct=$idAssoProduct;
	}


	 public function __toString(){
		return ($this->idAssoProduct??'no value').'';
	}

}