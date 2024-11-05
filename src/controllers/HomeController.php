<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class HomeController extends Controller {

    public function index() {
        $usuarios = Usuario::select()->execute();

        $this->render('home', ["usuarios" => $usuarios]);
    }

    public function imagens(){
        $this->render("imagem");
    }

    public function imagem($parametros){
        echo "imagem ".$parametros["id"];
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }

}