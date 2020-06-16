<?php
    use exception\SaldoInsuficienteException;
    use exception\OperacaoNaoRealizadaException;

class ContaCorrente{


    private $titular;
    private $agencia;
    private $numero;
    private $saldo;
    public static $totalDeContas;
    public static $taxaOpercacao;
    public $totaoSaquesNaoPermitidos;
    public static $operacaoNaoRealizada;


    public function __construct($titular,$agencia,$numero,$saldo) 
    {      
        $this->titular = $titular;
        $this->agencia = $agencia;
        $this->numero = $numero;
        $this->saldo = $saldo;
        
        self::$totalDeContas++;
        try {
            if(self::$totalDeContas < 1) {
                throw new \Exception("Valor inferior a zero!");
            }
            self::$taxaOpercacao = (30/self::$totalDeContas);
        } catch (\Exception $erro) {
            echo $erro->getMessage();
            exit;
        }
    }
    
    public function sacar($valor){
        Validacao::VerificaNumero($valor);
        if($valor > $this->saldo) {
            throw new SaldoInsuficienteException("Saldo insuficiente!", $valor, $this->saldo ); 
        }
        $this->saldo = $this->saldo - $valor;
        return $this;

    }

    public function depositar($valor) {
        $this->saldo = $this->saldo + $valor;
        return $this;
    }

    public function __get($atributo) {
        Validacao::protegerAtributo($atributo);
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        Validacao::protegerAtributo($atributo);
        $this->$atributo = $valor;
    }

    private function formataSaldo() {
        return number_format($this->$saldo,2,",",".");
    }

    public function transferir($valor, ContaCorrente $conta) {
        try {

            $arquivo = new LeitorArquivo("logTransferencia.txt");
            $arquivo->abrirArquivo();
            $arquivo->escreverNoArquivo();


            Validacao::verificaNumero($valor);
            if($valor < 0) {
                throw new \Exception("O valor não é permitido"); 
            }
            $this->sacar($valor);
            $conta->depositar($valor);

            return $this;
        } catch (\Exception $e) {
            ContaCorrente::$operacaoNaoRealizada++;
            throw new OperacaoNaoRealizadaException("<br><h2>Operaçao não realizada</h2><br>", 55,$e);
            
        } finally {
            $arquivo->fecharArquivo();
        }
       
    }
    
    public function __toString()
    {
        return "O Titular da Conta é: ".$this->titular ;// . " Seu saldo atual é ".$this->formataSaldo(saldo);
    }


}