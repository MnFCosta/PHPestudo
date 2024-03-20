<?php

namespace sistema\Suporte;
use Twig\Lexer;
use sistema\Core\Helpers;
use Twig\TwigFunction;

class Template
{
    private \Twig\Environment $twig;

    public function __construct(string $diretorio)
    {
        $loader = new \Twig\Loader\FilesystemLoader($diretorio); 
        $this->twig = new \Twig\Environment($loader);
        $lexer = new Lexer($this->twig, [$this->helpers()]);
        $this->twig->setLexer($lexer);
    }

    public function renderizar(string $view, array $dados): string
    {
        return $this->twig->render($view, $dados);
    }

    private function helpers(): void
    {   
        #criando funções com twig template
        array(
            $this->twig->addFunction(
                new \Twig\TwigFunction('url', function(string $url = null){
                    #função pode ser escrita diretamente aqui
                    #return 'URL';
                    #ou pode retornar um método estático de alguma classe
                    return Helpers::url($url);
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('dataAtual', function(){
                    return Helpers::dataAtual();
                })
            )
            
        );
    }
}