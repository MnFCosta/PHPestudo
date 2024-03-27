<?php

use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;
use sistema\Core\Helpers;


SimpleRouter::setDefaultNamespace('sistema\Controlador');

SimpleRouter::get(URL_SITE, 'Controller@index');
SimpleRouter::get(URL_SITE.'404', 'Controller@erro');
SimpleRouter::get(URL_SITE.'sobre', 'Controller@sobre');
SimpleRouter::get(URL_SITE.'post/{id}', 'Controller@postdetail');
SimpleRouter::get(URL_SITE.'postcategoria/{id}', 'Controller@postcategoria');
SimpleRouter::post(URL_SITE.'buscar', 'Controller@buscar');

SimpleRouter::start();
