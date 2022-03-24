<?php
namespace models;

use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "orderdetail")]
class Orderdetail{
	
	#[Column(name: "idOrder",dbType: "int(11)")]
	#[Validator(type: "notNull",constraints: [])]
	private $idOrder;

	
	#[Column(name: "idProduct",dbType: "int(11)")]
	#[Validator(type: "notNull",constraints: [])]
	private $idProduct;

	
	#[Column(name: "quantity",dbType: "decimal(6,2)")]
	#[Validator(type: "notNull",constraints: [])]
	private $quantity;

	
	#[Column(name: "prepared",dbType: "tinyint(1)")]
	#[Validator(type: "isBool",constraints: ["notNull"=>true])]
	private $prepared;


	public function getIdOrder(){
		return $this->idOrder;
	}


	public function setIdOrder($idOrder){
		$this->idOrder=$idOrder;
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


	public function getPrepared(){
		return $this->prepared;
	}


	public function setPrepared($prepared){
		$this->prepared=$prepared;
	}


	 public function __toString(){
		return ($this->prepared??'no value').'';
	}

}