<?php

namespace sistema\Core;

class Helpers
{

    function formatarValor(float $valor = null): string
    {
        return 'R$'.number_format($valor ?: 10, 2, ',','.');
    }

    function formatarNumero(int $numero = null): string
    {   

        return number_format($numero ?: 0, 0, '.','.') ;
    }

    #If e Switch
    public static function greeting()
    {
        $greeting = '';
        $time = date('H');

        #IF
        // if($time >= 0 && $time <= 5){
        //     $greeting = 'Boa madrugada!';
        // }
        // elseif($time >= 6 && $time <= 12){
        //     $greeting = 'Bom dia!';
        // }
        // elseif($time >= 13 AND $time <= 18){
        //     $greeting = 'Boa tarde!';
        // }
        // else{
        //     $greeting = "Boa noite!";
        // }
        
        #SWITCH
        switch ($time){
            case $time >= 0 && $time <= 5:
                $greeting = 'Boa madrugada!';
                break;
            case $time >= 6 && $time <= 12:
                $greeting = 'Bom dia!';
                break;
            case $time >= 13 AND $time <= 18:
                $greeting = 'Boa tarde!';
                break;
            default:
                $greeting = "Boa noite!";
        }
        #MATCH
        #EX1
        $greeting = match($time){
            '0', '1', '2', '3','4','5' => 'Boa madrugada!',
            '6', '7', '8', '9', '10', '11', '12' => 'Bom dia!',
            '13', '14', '15', '16', '17', '18', => 'Boa tarde!',
            default => 'Boa noite!',
        };   
        $greeting= match(true){
            $time >=0 AND $time <= 5 => 'Boa madrugada!',
            $time >=6 AND $time <= 12 => 'Bom dia!',
            $time >=13 AND $time <= 18 => 'Boa tarde!',
            default => 'Boa noite!',
        };

        return $greeting;

    }

    /**
     *  Resume um texto  utilizando como parâmetros uma string de texto, um valor int de limite e um outro valor string que será colocado no fim do resumo
     * 
     * @param string $texto texto para resumir
     * @param int $limite limite de caracteres
     * @param string $continue OPCIONAL o que deve ser exibido no fim do resumo
     * @return string Retorna o texto resumido
    */
    function resumirTexto(string $texto, int $limite, string $continue = '...'): String
    {
        $cleanText = trim($texto);

        if(strlen($cleanText) <= $limite){
            return $cleanText;
        }

        $resumirTexto = substr($cleanText, 0, strrpos(substr($cleanText, 0, $limite), ''));

        return $resumirTexto.$continue;
    }

    function retornaPreco(int $preco, $moeda = "R$:"): String
    {
        return "{$moeda}{$preco}";
    }

    function retornaDataHora()
    {
        $data = date('d/m/Y H:i:s');
        return $data;
    }

    function contarTempo(string $data)
    {
        $now = strtotime(date('Y-m-d H:i:s'));
        $time = strtotime($data);
        $diff = $now - $time;

        $segundos = $diff;
        $minutos = round($diff/60); 
        $horas = round($diff/3600);
        $dias = round($diff/86400);
        $semanas = round($diff/604800);
        $meses = round($diff/2419200);
        $anos = round($diff/29030400);

        if($time > $now){
            print("O FUTURO É PICA!");
        }else{
            if($segundos <= 60){
                return 'Just now';
            }elseif ($minutos <= 60){
                return $minutos == 1 ? 'Há 1 minuto': "Há {$minutos} minutos"; 
            }elseif($horas <= 24){
                return $horas == 1 ? 'Há uma hora': "Há {$horas} horas";
            }elseif($dias <= 7){
                return $dias == 1 ? '1 dia atrás': "{$dias} dias atrás";
            }elseif($semanas <= 4){
                return $semanas == 1 ? 'Há uma semana': "{$semanas} semanas atrás";
            }elseif($meses <= 12){
                return $meses == 1 ? 'Um mês atrás': "{$meses} meses atrás";
            }else{
                return $anos == 1 ? 'Um ano atrás': "{$anos} anos atrás";
            }
        }
    }

    function validarEmail(string $email): String
    {
        $valid = filter_var($email, FILTER_VALIDATE_EMAIL);
        return $valid != null ? "{$email} é um email valido" : "{$email} não pode ser considerado um email válido";
        
    }

    function validarUrl(string $url): bool
    {
        if (strlen($url) < 10){
            return false;
        }

        if (!str_contains($url, '.')){
            return false;
        }

        if (str_contains($url, 'http://') or str_contains($url, 'https://')){
            return true;
        }

        return false;
    }

    function validarUrlFiltro(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    function localhost(): bool
    {
        $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME', FILTER_DEFAULT);
        if($servidor == 'localhost'){
            return true;
        }
        return false;
    }

    function url(string $url): string
    {
        $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
        $ambiente = ($servidor == 'localhost' ? URL_DESENVOLVIMENTO : URL_PRODUCAO);

        if (str_starts_with($url, '/')){
            return $ambiente.$url;
        }

        return $ambiente.'/'.$url;

    }

    function dataAtual(): string
    {
        $diaMes = date('d');
        $diaSem = date('w');
        $mes = date('n') - 1;
        $ano = date('Y');

        $diasSemana = ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado'];

        $meses = [
            'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro'];

        $dataFormatada = $diasSemana[$diaSem].", {$diaMes} de {$meses[$mes]} de {$ano}.";
    
        return $dataFormatada;
    }

    #Slug Urls
    function slugifier(string $string): string
    {
        $mapa['a'] = 'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ@{}/-+';

        $mapa['b'] = 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUYa     ';

        $slug = strtr(mb_convert_encoding($string, 'ISO-8859-1', 'UTF-8'), mb_convert_encoding($mapa['a'], 'ISO-8859-1', 'UTF-8'), mb_convert_encoding($mapa['b'], 'ISO-8859-1', 'UTF-8'));
        $slug = strip_tags(trim($slug));
        $slug = str_replace(' ', '_', $slug);
        $slug = str_replace(['_____','____','___', '__'], '_', $slug);


        return strtolower($slug);
    }

    public static function limparCPF(string $num): string
    {
        return preg_replace('/[^0-9]/', '', $num);
    }

    function validarCPF(string $cpf): bool
    {
        #self:: é utilizado para acessar membros estáticos de uma classe, enquanto $this se refere a instância do objeto
        $cpf = self::limparCPF($cpf);

        if(strlen($cpf) != 11 or preg_match('/(\d)\1{10}/', $cpf)){
            return false;
        }
        return true;
    }



}