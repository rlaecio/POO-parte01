<?php
require "autoload.php";

echo "<pre>";

$contaJoao = new ContaCorrente("João", "1212","343434-3", 5000.00);
$contaMaria = new ContaCorrente("Maria", "1212","343445-4",6000.00);
$contaJose = new ContaCorrente("Jose", "1212", "34342-5", 5300.00);
$contaFernanda = new ContaCorrente("Fernanda", "1212", "34348-5", 4600.00);
$contaBernardo = new ContaCorrente("Bernardo", "1212", "34344-5", 6500.00);
$contaFelipe = new ContaCorrente("Felipe", "1212", "34452-5", 6800.00);
$contaLucas = new ContaCorrente("Lucas", "1212", "34232-5", 4500.00);


echo "Total de contas.: ".ContaCorrente::$totalDeContas;
echo "<br>";
echo "Taxas de Operaçao.: ".ContaCorrente::$taxaOpercacao;

try {
    $contaJoao->transferir(10000.00,$contaMaria);
} catch (\InvalidArgumentException $erro) {
    echo $erro->getMessage();
} catch(\exception\SaldoInsuficienteException $erro) {
    $contaJoao->totaoSaquesNaoPermitidos++;
    echo "<br>".$erro->getMessage()." Saldo em conta: ".$erro->saldo." - Valor do saque: ".$erro->valor."<br>";
} catch(\Exception $erro) {
    echo $erro->getMessage();
}

echo "<br>";
var_dump($contaJoao);


try {
    //code...
} catch (\Throwable $th) {
    //throw $th;
}
//echo $contaMaria->getSaldo();
