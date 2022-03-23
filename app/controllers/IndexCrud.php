<?php
namespace controllers;
use controllers\crud\datas\IndexCrudDatas;
use Ubiquity\controllers\crud\CRUDDatas;
use controllers\crud\viewers\IndexCrudViewer;
use Ubiquity\controllers\crud\viewers\ModelViewer;
use controllers\crud\events\IndexCrudEvents;
use Ubiquity\controllers\crud\CRUDEvents;
use controllers\crud\files\IndexCrudFiles;
use Ubiquity\controllers\crud\CRUDFiles;
use Ubiquity\attributes\items\router\Route;

#[Route(path: "/crud/{resource}",inherited: true,automated: true)]
class IndexCrud extends \Ubiquity\controllers\crud\MultiResourceCRUDController{
    public function initialize()
    {
        $this->headerView = '@activeTheme/main/vHeader.html';
        $this->footerView = '@activeTheme/main/vFooter.html';
        parent::initialize();
    }

    #[Route(name: "crud.index",priority: -1)]
	public function index() {
		parent::index();
	}


	#[Route(path: "#//crud/home",name: "crud.home",priority: 100)]
	public function home(){
		parent::home();
	}

	protected function getIndexType():array {
		return ['four link cards','card'];
	}

    protected function getIndexDefaultIcon(string $resource): string
    {
        $array=['organization' =>'factory blue','group'=>'users orange','user'=>'user teal'];
        return $array[$resource];
    }

    protected function getIndexModels(): array
    {
        return ['user','Organization'];
    }

    public function _getBaseRoute():string {
		return "/crud/".$this->resource."";
	}
	
	protected function getAdminData(): CRUDDatas{
		return new IndexCrudDatas($this);
	}

	protected function getModelViewer(): ModelViewer{
		return new IndexCrudViewer($this,$this->style);
	}

	protected function getEvents(): CRUDEvents{
		return new IndexCrudEvents($this);
	}

	protected function getFiles(): CRUDFiles{
		return new IndexCrudFiles();
	}


}
