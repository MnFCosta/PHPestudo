<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('sistema\Controlador');

SimpleRouter::get(URL_SITE, 'Controller@index');
SimpleRouter::get(URL_SITE.'sobre', 'Controller@sobre');

SimpleRouter::start();