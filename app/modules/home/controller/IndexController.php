<?php

namespace App\modules\home\controller;

class IndexController{
    public function index(){
        require __DIR__ . '/../../../../bootstrap.php';
        $category = $entityManager->getRepository('Entity\Category')->findAll();
        $subcategory = $entityManager->getRepository('Entity\Subcategory')->findAll();
        $services = $entityManager->getRepository('Entity\Service')->findAll();
        include __DIR__ . '/../template/home.php';
    }
}