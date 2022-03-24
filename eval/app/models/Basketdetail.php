<?php
namespace models;

use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "basketdetail")]
class Basketdetail{
	
	#[Column(name: "idBasket",dbType: "int(11)")]
	#[Validator(type: "notNull",constraints: [])]
	private $idBasket;

	
	#[Column(name: "idProduct",dbType: "int(11)")]
	#[Validator(type: "notNull",constraints: [])]
	private $idProduct;

	
	#[Column(name: "quantity",dbType: "int(11)")]
	#[Validator(type: "notNull",constraints: [])]
	private $quantity;


	public function getIdBasket(){
		return $this->idBasket;
	}


	public function setIdBasket($idBasket){
		$this->idBasket=$idBasket;
	}


	public function getIdProduct(){
		return $this->idProduct;
	}


	public function setIdProduct($idProduct){
		$this->idProduct=$idProduct;
	}


	public function getQuantity(){
		return $this->quantity;
	}


	public function setQuantity($quantity){
		$this->quantity=$quantity;
	}


	 public function __toString(){
		return ($this->quantity??'no value').'';
	}

}