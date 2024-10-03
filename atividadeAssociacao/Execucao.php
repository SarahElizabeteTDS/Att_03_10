<?php

require_once("modelos/Pedido.php");
require_once("modelos/Prato.php");

$prato1 = new Prato(1, "Camarão à Milanesa", 110.0);
$prato2 = new Prato(2, "Pizza Margherita", 80.0);
$prato3 = new Prato(3, "Macarrão à Carbonara", 60.0);
$prato4 = new Prato(4, "Bife à Parmegiana", 75.0);
$prato5 = new Prato(5, "Risoto ao Funghi", 70.0);

$pratos = array($prato1, $prato2, $prato3, $prato4, $prato5);
$pedidos = array();

do {
    print "\n-----------MENU-----------\n";
    print "1- Cadastrar pedido\n";
    print "2- Cancelar pedido\n";
    print "3- Listar pedidos\n";
    print "4- Total de vendas\n";
    print "0- SAIR\n";
    $escolha = readline("Escolha a opção: ");
    switch ($escolha) 
    {

        case 1:
            $pedido = new Pedido(readline("Insira o nome do cliente: "), readline("Insira o nome do garcom: "), null);
            print"\n";
            Listar($pratos);
            print "\n";
            $opcao = readline("Insira o seu pedido pelo indice: ");
            foreach ($pratos as $p) 
            {
                if ($p->getNumero() == $opcao) 
                {
                    $pedido->setPrato($p);
                }
            }
            array_push($pedidos, $pedido); 
            system("clear");
        break;

        case 2:
            if (count($pedidos) > 0) 
            {   
                Listar($pedidos);
                $indice = readline("Insira o pedido que você deseja remover: ");
                if ($indice >= 0 && $indice <= count($pedidos)) 
                {
                    unset($pedidos[$indice-1]);
                    array_values($pedidos);
                }
            }
            else
            {
                print "Não há pedidos";
            }
            readline("");
            system("clear");
        break;

        case 3:
            Listar($pedidos);
            readline("");
            system("clear");
        break;
        
        case 4:
            $totalVendasValor = 0;
            $totalVendasQuantidade = 0;

            foreach ($pedidos as $p) 
            {
                $totalVendasValor += $p->getPrato()->getValor();
                $totalVendasQuantidade++;
            }

            print "O total de vendas (em valor) é de: R$" . $totalVendasValor . "\n";
            print "O total de vendas (quantidade) é de: " . $totalVendasQuantidade . " vendas";
            readline("");
            system("clear");
        break;

        default:
            print "A opção não existe";
            readline("");
            system("clear");
        break;
    }
} while ($escolha != 0);

function Listar($array)
{   
    $inx = 1;
    foreach($array as $a)
    {
        print $inx . " " . $a . "\n";
        $inx++;
    }

} 