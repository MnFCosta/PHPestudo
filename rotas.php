<?php

use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;
use sistema\Core\Helpers;

try{
    SimpleRouter::setDefaultNamespace('sistema\Controlador');
    
    SimpleRouter::get(URL_SITE, 'Controller@index');
    SimpleRouter::get(URL_SITE.'404', 'Controller@erro');
    SimpleRouter::get(URL_SITE.'sobre', 'Controller@sobre');
    SimpleRouter::get(URL_SITE.'post/{id}', 'Controller@postdetail');
    
    SimpleRouter::start();
}catch (NotFoundHttpException $e){
    Helpers::redirecionar('404');
}