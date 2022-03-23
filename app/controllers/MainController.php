<?php
namespace controllers;
 use models\Group;
 use models\Organization;
 use models\User;
 use services\dao\OrgaRepository;
 use services\ui\UIGroups;
 use Ubiquity\attributes\items\di\Autowired;
 use Ubiquity\attributes\items\router\Get;
 use Ubiquity\attributes\items\router\Post;
 use Ubiquity\attributes\items\router\Route;
 use Ubiquity\controllers\auth\AuthController;
 use Ubiquity\controllers\auth\WithAuthTrait;
 use Ubiquity\orm\DAO;
 use Ubiquity\utils\http\URequest;
 use Ubiquity\utils\http\USession;

 /**
  * Controller MainController
  */

class MainController extends \controllers\ControllerBase{
    use WithAuthTrait;

    #[Autowired]
    private OrgaRepository $repo;

    #[Route('_default', name: 'home')]
	public function index(){
        $user=$this->getAuthController()->_getActiveUser();
        $this->repo->byId(USession::get('idOrga'));
		$this->loadView('@activeTheme/MainController/index.html', ['user'=>$user]);
	}


    protected function getAuthController(): AuthController
    {
        return new MyAuth($this);
    }

    public function setRepo(OrgaRepository $repo): void {
        $this->repo = $repo;
    }

    public function initialize() {
        $this->ui=new UIGroups($this);
        parent::initialize();
    }

    #[Get('new/user', name: 'new.user')]
    public function newUser(){
        $this->ui->newUser('frm-user');
        $this->jquery->renderView('main/vForm.html',['formName'=>'frm-user']);
    }

    #[Post('new/user', name: 'new.userPost')]
    public function newUserPost(){
        $idOrga=USession::get('idOrga');
        $orga=DAO::getById(Organization::class,$idOrga,false);
        $user=new User();
        URequest::setValuesToObject($user);
        $user->setEmail(\strtolower($user->getFirstname().'.'.$user->getLastname().'@'.$orga->getDomain()));
        $user->setOrganization($orga);
        if(DAO::insert($user)){
            $count=DAO::count(User::class,'idOrganization= ?',[$idOrga]);
            $this->jquery->execAtLast('$("#users-count").html("'.$count.'")');
            $this->showMessage("Ajout d'utilisateur","L'utilisateur $user a été ajouté à l'organisation.",'success','check square outline');
        }else{
            $this->showMessage("Ajout d'utilisateur","Aucun utilisateur n'a été ajouté",'error','warning circle');
        }
    }

    #[Get('new/users', name: 'new.users')]
    public function newUsers(){
        $this->ui->newUsers('frm-user');
        $this->jquery->renderView('main/vForm.html',['formName'=>'frm-user']);
    }

    #[Post('new/users', name: 'new.usersPost')]
    public function newUsersPost(){
        $idOrga=USession::get('idOrga');
        $orga=DAO::getById(Organization::class,$idOrga,false);
        $user=new User();
        URequest::setValuesToObject($user);
        $user->setEmail(\strtolower($user->getFirstname().'.'.$user->getLastname().'@'.$orga->getDomain()));
        $user->setOrganization($orga);
        if(DAO::insert($user)){
            $count=DAO::count(User::class,'idOrganization= ?',[$idOrga]);
            $this->jquery->execAtLast('$("#users-count").html("'.$count.'")');
            $this->showMessage("Ajout d'utilisateur","L'utilisateur $user a été ajouté à l'organisation.",'success','check square outline');
        }else{
            $this->showMessage("Ajout d'utilisateur","Aucun utilisateur n'a été ajouté",'error','warning circle');
        }
    }

    #[Get('new/group', name: 'new.group')]
    public function newGroup(){
        $this->ui->newGroup('frm-group');
        $this->jquery->renderView('main/vForm.html',['formName'=>'frm-group']);
    }

    #[Post('new/group', name: 'new.groupPost')]
    public function newGroupPost(){
        $idGroup=USession::get('idGroup');
        $Organization=new Group();
        URequest::setValuesToObject($Organization);
        if(DAO::insert($Organization)){
            $count=DAO::count(User::class,'idOrganization= ?',[$idGroup]);
            $this->jquery->execAtLast('$("#groups-count").html("'.$count.'")');
            $this->showMessage("Ajout d'organisation","L'organisation $Organization a été ajoutée.",'success','check square outline');
        }else{
            $this->showMessage("Ajout d'organisation","Aucune organisation n'a été ajoutée",'error','warning circle');
        }
    }
}
