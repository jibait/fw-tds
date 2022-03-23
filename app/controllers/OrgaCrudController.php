<?php
namespace controllers;
use controllers\crud\datas\OrgaCrudControllerDatas;
use Ubiquity\controllers\crud\CRUDDatas;
use controllers\crud\viewers\OrgaCrudControllerViewer;
use Ubiquity\controllers\crud\viewers\ModelViewer;
use controllers\crud\events\OrgaCrudControllerEvents;
use Ubiquity\controllers\crud\CRUDEvents;
use controllers\crud\files\OrgaCrudControllerFiles;
use Ubiquity\controllers\crud\CRUDFiles;
use Ubiquity\attributes\items\router\Route;

#[Route(path: "/orgas",inherited: true,automated: true)]
class OrgaCrudController extends \Ubiquity\controllers\crud\CRUDController{

	public function __construct(){
		parent::__construct();
		\Ubiquity\orm\DAO::start();
		$this->model='models\\Organization';
		$this->style='';
	}

	public function _getBaseRoute(): string {
		return '/orgas';
	}
	
	protected function getAdminData(): CRUDDatas{
		return new OrgaCrudControllerDatas($this);
	}

	protected function getModelViewer(): ModelViewer{
		return new OrgaCrudControllerViewer($this,$this->style);
	}

	protected function getEvents(): CRUDEvents{
		return new OrgaCrudControllerEvents($this);
	}

	protected function getFiles(): CRUDFiles{
		return new OrgaCrudControllerFiles();
	}


}
