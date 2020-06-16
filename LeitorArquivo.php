<?php

class LeitorArquivo {

    private $arquivo;

    public function __construct($arquivo)
    {       
        $this->arquivo = $arquivo;
    }

    public function abrirArquivo()
    {
        echo "<br>Abrindo arquivo";
    }

    public function lerArquivo()
    {
        echo "<br>lendo arquivo...  ";
    }

    public function fecharArquivo()
    {
        echo "<br>Fechando arquivo";
    }

    public function escreverNoArquivo()
    {
        echo "<br>Escrevendo no arquivo";
    }

}
