<?php
#Namespaces

namespace sistema\Classes;

class Mensagem
{
   private $texto; 
   private $css;

   public function __toString()
   {
      return $this->renderizar();
   }

   public function sucesso(string $mensagem): Mensagem
   {
      $this->css = 'color:green;';
      $this->texto = $this->filtrar($mensagem);
      return $this;
   }

   public function renderizar(): string
   {
      return "<div style='{$this->css}'>{$this->texto}</div>";
   }

   private function filtrar(string $mensagem): string
   {
      return filter_var($mensagem, FILTER_SANITIZE_SPECIAL_CHARS);
   }


}