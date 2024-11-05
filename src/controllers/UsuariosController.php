<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class UsuariosController extends Controller {
    public function add(){
        $this->render("addUser");
    }

    public function addAction(){
        $name = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

        if(!$name || !$email){ // volta pra tela de adicionar
            echo "<script>alert('preencha os campos corretamente')</script>";
            return;
            //$this->redirect("/usuarios/novo");
        }

        // checa se existe o email no BD
        $checkEmailRepeated = Usuario::select()->
            where("email",$email)->
            execute();

        if(count($checkEmailRepeated) > 0){
            echo "<script>alert('email indisponivel')</script>";
            //$this->redirect("/usuarios/novo");
            return;
        }
        // insere 
        Usuario::insert([
            "nome" => $name,
            "email" => $email
        ])->execute();

        $this->redirect("/");
    }

    public function edit($args){
        $id = filter_var($args["id"], FILTER_VALIDATE_INT);
        if(!$id){
            echo "ID inválido";
            return;
        }

        $usuario = Usuario::select()->find($id);
        if(!$usuario || count($usuario) === 0){
            echo "ID de usuário não encontrado";
            return;
        }

        $this->render("editar", ["usuario"=>$usuario]);
    }

    public function editAction($args){
        $id = filter_var($args["id"], FILTER_VALIDATE_INT);
        if(!$id){
            echo "ID inválido";
            return;
        }

        $usuario = Usuario::select()->find($id);
        if(!$usuario || count($usuario) === 0){
            echo "ID de usuário não encontrado";
            return;
        }

        // usuario encontrado
        $novoNome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
        $novoEmail = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);;

        if(!$novoNome || !$novoEmail){
            echo "Parametros inválidos";
            return;
        }

        // checar email
        $checkEmailRepeated = Usuario::select()
            ->where("email", $novoEmail)
            ->where("id", "!=", $id)
            ->execute();

        // email cadastrado no BD        
        if($checkEmailRepeated && count($checkEmailRepeated) > 0){
            echo "Email já cadastrado no sistema";
            return;
        }

        Usuario::update(["nome"=>$novoNome, "email"=>$novoEmail])
                ->where("id", $id)
                ->execute();

        $this->redirect("/");
    }

    public function delete($args){
        $id = filter_var($args["id"], FILTER_VALIDATE_INT);
        if(!$id){
            echo "ID inválido";
            return;
        }

        Usuario::delete()->where("id", $id)->execute();

        $this->redirect("/");
    }

}
?>