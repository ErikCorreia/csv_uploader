<?php

namespace System\modules\CSVUploader\controller;

use Entity\Service;
use Cocur\Slugify\Slugify;

class FileUploader 
{
    private $uploadDir = 'storage/uploads';
    private $fileName;

    public function getFile()
    {
        require __DIR__ . '/../../../../bootstrap.php';

        $category = $entityManager->getRepository('Entity\Category')->findAll();
        $subcategory = $entityManager->getRepository('Entity\Subcategory')->findAll();

        include __DIR__ . '/../template/uploadForm.php';

        return;
    }

    public function postFile()
    {

        $file = $_FILES['file'];
        $this->fileName = $file['name'];
        if ($file['error'] === UPLOAD_ERR_OK) {
            $this->uploadFile($file['tmp_name']);
            echo 'File uploaded!';
        } else {
            echo 'Error while uploading file!';
        }
    }

    public function uploadFile($file)
    {
        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir);
        }
        move_uploaded_file($file, $this->uploadDir . '/' . $this->fileName);
        $this->getFileData();
    }

    public function getFileData()
    {
        $file = fopen($this->uploadDir . '/' . $this->fileName, 'r');
        while ($row = fgetcsv($file)) {

            $service_name = $row[0];
            $service_price = $row[1];

            $this->ingectService($service_name, $service_price);
        }
        fclose($file);
    }

    public function ingectService($service_name, $service_price)
    {
        echo "<pre>";

        require  __DIR__ . '/../../../../bootstrap.php';

        $slugify = new Slugify();
        $slug = $slugify->slugify($service_name);

        $service = new Service();
        $service->setSlug($slug);
        $service->setName($service_name);
        $service->setPrice($service_price);
        $service->setCategory($entityManager->getReference('Entity\Category', $_POST['category']));
        $service->setSubcategory($entityManager->getReference('Entity\Subcategory', $_POST['subcategory']));

        $entityManager->persist($service);
        $entityManager->flush();


        // $product->setCategory($entityManager->find(Category::class, $_POST['category']));
    }
}