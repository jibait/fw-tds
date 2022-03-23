<?php
namespace controllers\crud\files;

use Ubiquity\controllers\crud\CRUDFiles;
 /**
  * Class IndexCrudFiles
  */
class IndexCrudFiles extends CRUDFiles{
	public function getViewDisplay(): string{
		return "IndexCrud/display.html";
	}

	public function getViewForm(): string{
		return "IndexCrud/form.html";
	}

	public function getViewHome(): string{
		return "IndexCrud/home.html";
	}

	public function getViewIndex(): string{
		return "IndexCrud/index.html";
	}

	public function getViewItemHome(): string{
		return "IndexCrud/itemHome.html";
	}

	public function getViewNav(): string{
		return "IndexCrud/nav.html";
	}


}
