<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\ManyToOne;
use Ubiquity\attributes\items\JoinColumn;

#[Table(name: "basket")]
class Basket{
	
	#[Id()]
	#[Column(name: "id",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $id;

	
	#[Column(name: "name",dbType: "varchar(60)")]
	#[Validator(type: "length",constraints: ["max"=>60,"notNull"=>true])]
	private $name;

	
	#[Column(name: "dateCreation",dbType: "timestamp")]
	#[Validator(type: "notNull",constraints: [])]
	private $dateCreation;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\User",name: "idUser")]
	private $user;


	public function getId(){
		return $this->id;
	}


	public function setId($id){
		$this->id=$id;
	}


	public function getName(){
		return $this->name;
	}


	public function setName($name){
		$this->name=$name;
	}


	public function getDateCreation(){
		return $this->dateCreation;
	}


	public function setDateCreation($dateCreation){
		$this->dateCreation=$dateCreation;
	}


	public function getUser(){
		return $this->user;
	}


	public function setUser($user){
		$this->user=$user;
	}


	 public function __toString(){
		return ($this->dateCreation??'no value').'';
	}

}