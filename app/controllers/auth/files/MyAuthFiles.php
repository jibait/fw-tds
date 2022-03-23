<?php
namespace controllers\auth\files;

use Ubiquity\controllers\auth\AuthFiles;
 /**
  * Class MyAuthFiles
  */
class MyAuthFiles extends AuthFiles{
	public function getViewIndex(): string{
		return "MyAuth/index.html";
	}

	public function getViewCreate(): string{
		return "MyAuth/create.html";
	}


}
