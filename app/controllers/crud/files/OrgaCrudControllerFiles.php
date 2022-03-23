<?php
namespace controllers\crud\files;

use Ubiquity\controllers\crud\CRUDFiles;
 /**
  * Class OrgaCrudControllerFiles
  */
class OrgaCrudControllerFiles extends CRUDFiles{
	public function getViewIndex(): string{
		return "OrgaCrudController/index.html";
	}

	public function getViewForm(): string{
		return "OrgaCrudController/form.html";
	}

	public function getViewDisplay(): string{
		return "OrgaCrudController/display.html";
	}


}
