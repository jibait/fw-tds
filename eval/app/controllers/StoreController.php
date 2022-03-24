<?php
namespace controllers;
use models\Product;
use models\Section;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\orm\DAO;

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

    #[Route('/parcourir', name: 'store.allProducts')]
    public function getAllProducts() {
        $products = DAO::getAll(Product::class);
        return $products;
    }

    #[Get('/section/{idSection}', name: 'store.section')]
    public function getSections(int $id) {
        $section = DAO::getById(Section::class, $id);
        $products = DAO::getAll(Product::class, $section);
        $this->loadView("@activeTheme/StoreController/section.html", ['section'=>$section,'products'=>$products]);

    }

    public function getAllSections() {
        $sections = DAO::getAll(Section::class);
        return $sections;
    }



}
