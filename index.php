<?php
//Página default do sistema
#Teste
/* 
Pitoco
Chatuco
*/

require_once 'sistema/configuracao.php';
include_once 'func.php';
//declare(strict_types = 1)

$text = strip_tags("<h1>Texto</h1> para resumir mt brabo rsrsrs");

echo $total = strlen($text);
echo '<hr>';
echo $resumo = substr($text, 2, 15);
echo '<hr>';
echo $oco = strrpos($text, 'e');
echo '<hr>';

#$preco = 50;

#debug de variável
#var_dump($preco);
// #echo greeting();
#echo retornaPreco($preco);
#echo "<br>";

echo resumirTexto($text, 15, '...');

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

echo formatarValor();

echo '<hr>';

echo formatarNumero(200);
 
echo '<hr>';

echo retornaDataHora();

echo '<hr>';

echo contarTempo('2024-03-09 11:33:08');

echo '<hr>';

echo validarEmail('teste@gmail.com');

echo '<hr>';

$url = 'http://teste.com.br';
var_dump(validarUrl($url)); 
var_dump(validarUrlFiltro($url));

echo '<hr>'; 

echo SITE_NOME;

echo '<hr>';

var_dump($_SERVER);

echo '<hr>';

var_dump(localhost());

echo '<hr>';

echo url('teste');

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

echo dataAtual();

echo '<hr>';

echo 'String Original = '.$strTeste = 'Águia  test@ndo      maçã{}{}{}//////////-+';
echo '<br>';
echo 'String Slugada = '.slugifier($strTeste);

