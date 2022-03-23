<?php
namespace controllers;

 use Ajax\php\ubiquity\JsUtils;
 use Ubiquity\attributes\items\router\Route;
 use Ubiquity\controllers\auth\WithAuthTrait;
 use Ubiquity\controllers\auth\AuthController;

 /**
  * Controller TestController
  * @property JsUtils $jquery
  */
class TestController extends \controllers\ControllerBase{
use withAuthTrait;
	public function index(){
        $this->jquery->getHref('a', parameters: ['hasLoader'=> false, 'historize' =>false ]);
        $this->jquery->click('#bt-toggle', '$("#response").toggle();');
        $bt = $this->jquery->semantic()->htmlButton('bt-compo', 'Text compo', 'red');
        $bt -> addIcon('users');
        $bt -> addLabel('Test');
        $bt -> onClick('$("#response").html("click sur le bouton");');
        $this->jquery->renderView("testController/index.html");
	}

	#[Route ('/test', name: 'test')]
	public function test(){
		echo '<h1> Réponse ajax </h1>';
    }

    protected function getAuthController() : AuthController
    {
        return new MyAuth($this);
    }

}
