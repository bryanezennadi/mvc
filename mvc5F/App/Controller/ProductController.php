<?php
namespace App\Controller;
require 'App\Model\Tablet.php';
use App\Model\Tablet;
//nel model ci vanno tante cflassi quante tabelle del db

class ProductController
{
    private Tablet $tablet;
    public function __construct($db){
$this->tablet= new Tablet($db);
    }
    public function ShowAllTablet():void{
        $tablets=$this->tablet->showall();
        require 'app/view/ShowAllTablet.php';
}
    function show1(): void
    {
        $content= 'son show1 e mi trovo in ProductController';
        require 'App/View/home.php';
    }


}