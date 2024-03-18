<?php

namespace sistema\Core;

class Controlador
{
    public function __construct(string $tema)
    {
        echo "Controlador iniciado<br> o tema é {$tema}";
    }
}