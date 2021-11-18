<?php
error_reporting(E_ERROR | E_PARSE);

include 'src/libs/Route.php';

use Steampixel\Route;
require 'src/controller/LoginController.php';


/*Route::add('/login', fn () => $controller->login(), ['post']);
Route::add('/criarConta', fn () => $controller->criarContaIndex(), ['post']);

Route::add('/login', fn () => $controller->loginIndex(), ['get']);
Route::add('/criarConta', fn () => $controller->criarConta(), ['get']);
Route::add('/home', fn () => $controller->home(), ['get']);
Route::add('/account', fn () => $controller->account(), ['get']);
Route::add('/channels', fn () => $controller->channels(), ['get']);
Route::add('/favorites', fn () => $controller->favorites(), ['get']);
Route::add('/newEpisode', fn () => $controller->newEpisode(), ['get']);
Route::add('/statistic', fn () => $controller->statistic(), ['get']);
Route::add('/sair', fn () => $controller->sair(), ['get']);

Route::add('/.*', function () {
    http_response_code(404);
    echo "Page not found!";
}, ['get']);

Route::run('/');
*/

Route::add('/' , function() {
    header('location: /login');
}, 'get');

Route::add('/login', function() {
    $controller = new LoginController();
    $controller->loginIndex();
    
}, 'get');

Route::add('/teste', function() {
    $controller = new LoginController();
    $controller->teste();
}, ['get', 'post']);

Route::add('/login', function() {
    $controller = new LoginController();
    $controller->login();
}, 'post');

Route::add('/criarConta', function() {
    $controller = new LoginController();
    $controller->criarContaIndex();
}, 'get');

Route::add('/criarConta', function() {
    $controller = new LoginController();
    $controller->criarConta();
}, 'post');

Route::add('/home', function() {
    $controller = new LoginController();
    $controller->home();
}, ['get','post']);

Route::add('/account', function() {
    $controller = new LoginController();
    $controller->account();
}, 'get');

Route::add('/channels', function() {
    $controller = new LoginController();
    $controller->channels();
}, 'get');

Route::add('/mainChannel', function() {
    $controller = new LoginController();
    $controller->mainChannel();
}, 'get');

Route::add('/favorites', function() {
    $controller = new LoginController();
    $controller->favorites();
}, 'get');

Route::add('/newEpisode', function() {
    $controller = new LoginController();
    $controller->newEpisode();
}, 'get');

Route::add('/newEpisode', function() {
    $controller = new LoginController();
	$controller->saveNewEpisode();
}, 'post');

Route::add('/player', function() {
    $controller = new LoginController();
	$controller->player();
}, 'get');

Route::add('/cadastrarFavorito', function() {
    $controller = new LoginController();
    $controller->favoritarEpisodioPost();
}, 'post');

Route::add('/cadastrarFavorito', function() {
    $controller = new LoginController();
    $controller->favoritarEpisodioGet();
}, 'get');

Route::add('/statistic', function() {
    $controller = new LoginController();
    $controller->statistic();
}, 'get');

Route::add('/sair', function() {
    $controller = new LoginController();
    $controller->sair();
}, 'get');

Route::run('/');