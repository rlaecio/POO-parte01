<?php
namespace exception;

class OperacaoNaoRealizadaException extends \Exception {
    
    public function __construct($mensagem, $codigo, $ex)
    {
        parent::__construct($mensagem, $codigo, $ex);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
    
}


?>