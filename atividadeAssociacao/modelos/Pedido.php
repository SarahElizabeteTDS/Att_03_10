<?php

require_once("Prato.php");

class Pedido
{
    private string $nomeCliente;
    private string $nomeGarcom;
    private Prato $prato;

    public function __construct($nc, $ng)
    {
        $this->nomeCliente = $nc;
        $this->nomeGarcom = $ng;
    }

    public function __toString()
    {
        return "\nO cliente ". $this->nomeCliente .", foi atendido pelo garçom " . $this->nomeGarcom. ", pediu um prato de " . $this->prato->getNome() . " no valor de R$ " . $this->prato->getValor()  . "\n";
    }

    public function getNomeCliente(): string
    {
        return $this->nomeCliente;
    }

    public function setNomeCliente(string $nomeCliente): self
    {
        $this->nomeCliente = $nomeCliente;

        return $this;
    }

    public function getNomeGarcom(): string
    {
        return $this->nomeGarcom;
    }

    public function setNomeGarcom(string $nomeGarcom): self
    {
        $this->nomeGarcom = $nomeGarcom;

        return $this;
    }

    public function getPrato(): Prato
    {
        return $this->prato;
    }

    public function setPrato(Prato $prato): self
    {
        $this->prato = $prato;

        return $this;
    }
}