<?php
use core\Router;

$router = new Router();

$router->get("/usuarios/novo", "UsuariosController@add");
$router->post("/usuarios/novo", "UsuariosController@addAction");

$router->get("/usuarios/editar/{id}", "UsuariosController@edit");
$router->post("/usuarios/editar/{id}", "UsuariosController@editAction");

$router->get("/usuarios/excluir/{id}", "UsuariosController@delete");


$router->get('/', 'HomeController@index');
$router->get('/sobre/{nome}', 'HomeController@sobreP');
$router->get('/sobre', 'HomeController@sobre');

$router->get("/imagens", "HomeController@imagens");
$router->get("/imagem/{id}", "HomeController@imagem");