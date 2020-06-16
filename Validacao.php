<?php

class Validacao {
    public static function protegerAtributo($atributo) {
        if($atributo == "titular" || $atributo == "saldo") {
            throw new InvalidArgumentException("O Atributo $atributo continua privado");
        }
    }

    public static function verificaNumero($valor)  
    {   
        if (!is_numeric($valor)) {
            throw new Exception("o valor passado não é numero");
        }
    }
}

?>
