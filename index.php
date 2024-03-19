<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
//Página default do sistema
#Teste
/* 
Pitoco
Chatuco
*/

#Carregando classes manualmente sem o autoload
/* require_once 'sistema/configuracao.php';
include_once './sistema/Core/Helpers.php';
include_once './sistema/Core/Mensagem.php';
include_once './sistema/Core/Controlador.php'; */

#autoload do composer, carrega classes automáticamente
require 'vendor/autoload.php';
require 'rotas.php';

#Usar classe com namespace
use \sistema\Core\Helpers;
use \sistema\Core\Controlador;
#Usar classe com namespace e alias
use \sistema\Core\Mensagem as msg; 

//declare(strict_types = 1)

$text = strip_tags("<h1>Texto</h1> para resumir mt brabo rsrsrs");

echo $total = strlen($text);
echo '<hr>';
echo $resumo = substr($text, 2, 15);
echo '<hr>';
echo $oco = strrpos($text, 'e');
echo '<hr>';
$helper = new Helpers();

#$preco = 50;

#debug de variável
#var_dump($preco);
// #echo greeting();
#echo retornaPreco($preco);
#echo "<br>";

echo $helper->resumirTexto($text, 15, '...');

echo '<hr>';

#exemplo operador ternátrio
$valor = '';


// if($valor){
//     echo $valor;
// }else{
//     echo 0;
// }
#Uma operação condicional simples pode ser resumida da seguinte maneira
#se valor existe, recebe valor, caso não exista, recebe 0
echo ($valor ? $valor : 0);
#a expressão pode ser ainda mais resumida da seguinte maneira, os parênteses não são necessários, e repetir o valor também não é necessário
echo '<hr>';
echo $valor ?: 0;

echo '<hr>';

echo $helper->formatarValor();

echo '<hr>';

echo $helper->formatarNumero(200);
 
echo '<hr>';

echo $helper->retornaDataHora();

echo '<hr>';

echo $helper->contarTempo('2024-03-09 11:33:08');

echo '<hr>';

echo $helper->validarEmail('teste@gmail.com');

echo '<hr>';

$url = 'http://teste.com.br';
var_dump($helper->validarUrl($url)); 
var_dump($helper->validarUrlFiltro($url));

echo '<hr>'; 

echo SITE_NOME;

echo '<hr>';

var_dump($_SERVER);

echo '<hr>';

var_dump($helper->localhost());

echo '<hr>';

echo $helper->url('teste');

echo '<hr>';

#printando valor de chave
echo $_SERVER['HTTP_HOST'];

echo '<hr>';

#declaras array em php
$meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril'];
#ou
#$meses = array();

#elementos do array podem ser separados em várias linhas
// $meses = [
//     'Janeiro',
//     'Fevereiro',
//     'Março',
//     'Abril'];

#elementos de array podem ter chaves atribuidas da seguinte maneira
// $meses = [
//          1 => 'Janeiro',
//          'SegundoMes' => 'Fevereiro',
//          3 => 'Março',
//          'QuartoMes' => 'Abril',
//         'Maio'];

var_dump($meses);

echo '<hr>';
#Percorrer arrays em php
#$chave retorna o indice ou chave do valor, e $valor retorna o valor.
foreach($meses as $chave => $valor){
    echo "[{$chave}]".$valor.' ';
}

echo '<hr>';

echo $helper->dataAtual();

echo '<hr>';

echo 'String Original = '.$strTeste = 'Águia  test@ndo      maçã{}{}{}//////////-+';
echo '<br>';
echo 'String Slugada = '.$helper->slugifier($strTeste);

echo '<hr>';

#Chamada de método estático NomeClasse::
echo Helpers::greeting();

echo '<hr>';

#Estruturas de Repetição em PHP

#WHILE
$numero = 1;

while($numero <= 10){
    echo $numero++;
}

echo '<hr>';
#FOR

for($i = 1; $i <=10; $i++){
    echo ($i % 2 == 0 ? $i.' PAR': $i.' IMPAR').'<br>';
}

echo '<hr>';

$num = 9;

for($i = 1; $i<=10; $i++){
    $mult = $num*$i;
    echo "{$num} x {$i} = {$mult}".'<br>';
}

echo '<hr>';

#REGEX
$cpf = '056.539.660-96';

echo $helper->validarCPF($cpf) == true ? "CPF válido!" : "CPF inválido";

echo '<hr>';
#Classes em PHP

$msg = new msg();
echo $msg->sucesso('Mensagem de sucesso')->renderizar();

echo '<hr>';

#Métodos mágicos

echo (new msg())->sucesso('SUCESSO!!!!!!!!!')->renderizar();

echo (new msg())->sucesso("SUCESSO!!!!!!!!");
echo '<hr>';

#Construct
#Pelo método construtor __construct(), quando uma instancia da classe Controlador é iniciada, o método __construct é chamado, logo, caso este método tenha parâmetros
#devemos passar tais parâmetros durante o instanciamento da classe.
$controlador = new Controlador("Batata");

echo '<hr>';

#Utilizando formatador de CPF baixado pelo composer
/* $document = new \Bissolli\ValidadorCpfCnpj\CPF('546.897.210-76');
var_dump($document->isValid()); */

