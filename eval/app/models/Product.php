<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\OneToMany;
use Ubiquity\attributes\items\ManyToOne;
use Ubiquity\attributes\items\JoinColumn;
use Ubiquity\attributes\items\ManyToMany;
use Ubiquity\attributes\items\JoinTable;

#[Table(name: "product")]
class Product{
	
	#[Id()]
	#[Column(name: "id",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $id;

	
	#[Column(name: "name",dbType: "varchar(60)")]
	#[Validator(type: "length",constraints: ["max"=>60,"notNull"=>true])]
	private $name;

	
	#[Column(name: "comments",nullable: true,dbType: "text")]
	private $comments;

	
	#[Column(name: "stock",dbType: "int(11)")]
	#[Validator(type: "notNull",constraints: [])]
	private $stock;

	
	#[Column(name: "image",nullable: true,dbType: "text")]
	private $image;

	
	#[Column(name: "price",dbType: "decimal(6,2)")]
	#[Validator(type: "notNull",constraints: [])]
	private $price;

	
	#[Column(name: "promotion",dbType: "decimal(6,2)")]
	#[Validator(type: "notNull",constraints: [])]
	private $promotion;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\Section",name: "idSection")]
	private $section;

	
	#[ManyToMany(targetEntity: "models\\Product",inversedBy: "packs")]
	#[JoinTable(name: "pack",joinColumns: ["name"=>"idPack","referencedColumnName"=>"id"])]
	private $packs;


	 public function __construct(){
		$this->packs = [];
	}


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


	public function getComments(){
		return $this->comments;
	}


	public function setComments($comments){
		$this->comments=$comments;
	}


	public function getStock(){
		return $this->stock;
	}


	public function setStock($stock){
		$this->stock=$stock;
	}


	public function getImage(){
		return $this->image;
	}


	public function setImage($image){
		$this->image=$image;
	}


	public function getPrice(){
		return $this->price;
	}


	public function setPrice($price){
		$this->price=$price;
	}


	public function getPromotion(){
		return $this->promotion;
	}


	public function setPromotion($promotion){
		$this->promotion=$promotion;
	}


	public function getSection(){
		return $this->section;
	}


	public function setSection($section){
		$this->section=$section;
	}


	public function getPacks(){
		return $this->packs;
	}


	public function setPacks($packs){
		$this->packs=$packs;
	}


	 public function addPack($pack){
		$this->packs[]=$pack;
	}


	 public function __toString(){
		return $this->name;
	}

}