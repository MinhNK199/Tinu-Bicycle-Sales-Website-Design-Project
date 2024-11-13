<?php

class SanPhamConTroller
{
   public $modelSanPham;
   public function __construct()
   {
       $this->modelSanPham = new SanPham();
   }

   // ham hien thi san pham

   public function index(){
       $sanPhams = $this->modelSanPham->getAll();
       require_once 'views/sanphams/list_san_pham.php';
   }

   public function create(){

       require_once 'views/sanphams/create_san_pham.php';

    }

    public function store(){

    }
}