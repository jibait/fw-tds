<?php
namespace controllers;
use models\Product;
use models\Section;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\UResponse;
use Ubiquity\utils\http\USession;

/**
 * Controller StoreController
 */

class StoreController extends \controllers\ControllerBase{

    #[Route('_default', name: 'home')]
    public function index(){
        $sections = $this->getAllSections();
        $products = $this->getAllProducts();
        $this->loadView("@activeTheme/StoreController/index.html", ['sections'=>$sections, 'products'=>$products]);
    }

    public function initialize()
    {
        $this->view->setVar('cart', ['count'=>0, 'price'=>0]);
        parent::initialize();
    }

    #[Route('/parcourir', name: 'store.allProducts')]
    public function getAllProducts() {
        $products = DAO::getAll(Product::class);
        return $products;
    }

    #[Route('/section/{id}', name: 'store.section')]
    public function getSections($id) {
        $section = DAO::getById(Section::class, $id);
        $products = $section->getProducts();
        $this->loadView("@activeTheme/StoreController/section.html", ['section'=>$section,'products'=>$products]);

    }

    public function getAllSections() {
        $sections = DAO::getAll(Section::class);
        return $sections;
    }

    #[Get('/cart/{id}/{count}', name: 'store.toCart')]
    public function cart($id, $count){
    $cart = USession::get('cart');
    $prod = [$id, $count];
    if(!$cart){
        USession::set("cart", $prod);
    }
    else{
        USession::addValueToArray("cart", $prod);
    }
    UResponse::header('Location','/');
    }

    #[Route('/cart', name: 'store.toCart')]
    public function cart2(){
        $cart = USession::get('cart');
        if(!$cart){
            $erreur = ("Le panier est vide");
            $this->loadView("@activeTheme/StoreController/section.html", ['erreur'=>$erreur]);
        }
        else{
            $this->loadView("@activeTheme/StoreController/section.html", ['cart'=>$cart]);
        }
    }
}
