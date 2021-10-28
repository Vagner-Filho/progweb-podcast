<?php
error_reporting(E_ERROR | E_PARSE);

include_once('Login.php');
$controller = new SiteController();

switch ($_GET['acao']) {
    case 'account':
        $controller->account();
        break;
    case 'channels':
        $controller->channels();
        break;
    case 'criarConta':
        $controller->criarConta();
        break;
    case 'favorites':
        $controller->favorites();
        break;
    case 'home':
        $controller->home();
        break;
    case 'newEpisode':
        $controller->newEpisode();
        break;
    case 'statistic':
        $controller->statistic();
        break;
    case 'sair':
        $controller->sair();
        break;
    default:
        $controller->login();
}