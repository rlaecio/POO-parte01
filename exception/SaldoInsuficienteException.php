<?php
namespace exception;


class SaldoInsuficienteException extends \Exception {

    private $valor;
    private $saldo;

    public function __construct($mensagem, $valor, $saldo)   
    {
        $this->valor = $valor;
        $this->saldo = $saldo;
        parent::__construct($mensagem,null,null);

    }
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
    
    public function __get($param)
    {
        return $this->$param;
    }

}