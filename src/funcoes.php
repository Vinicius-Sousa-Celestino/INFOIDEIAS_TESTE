<?php

namespace SRC;

class Funcoes
{
    /*
    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.
    (200)]
    2022
    1 - 100
    101 - 200
    201 - 300
	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17
     * */
    public function SeculoAno(int $ano): int
    {
        return ceil($ano / 100);
    }

    /*
    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23
     * */
    public function PrimoAnterior(int $numero): int
    {
        for ($i = $numero - 1; $i != 0; $i--) {
            if ($i == 2) return $i;
            if ($this->ENumeroPar($i)) continue;
            if ($this->ENumeroPrimo($i)) return $i;
        }
        return $numero;
    }
    private function ENumeroPar(int $numeroEntrada)
    {
        if (!($numeroEntrada % 2 > 0)) return true;
    }
    private function ENumeroPrimo(int $numeroEntrada): bool
    {
        $listaNumerosTeste = [3, 5, 7, 9];
        $flagENumeroPrimo = true;
        foreach ($listaNumerosTeste as $numeroTeste) {
            if ($numeroEntrada % $numeroTeste == 0) $flagENumeroPrimo = false;
        }
        return $flagENumeroPrimo;
    }

    /*
    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

    Array multidimensional = array (
    array(25,22,18),
    array(10,15,13),
    array(24,5,2),
    array(80,17,15)
    );

    resposta = 25

    * */
    public function SegundoMaior(array $listaArrayNumeros): int
    {
        $arrayMaiorNumeroDescoberto = [];
        foreach ($listaArrayNumeros as $arrayNumeros) {
            array_push($arrayMaiorNumeroDescoberto, max($arrayNumeros));
        }
        sort($arrayMaiorNumeroDescoberto);
        return $arrayMaiorNumeroDescoberto[count($arrayMaiorNumeroDescoberto) - 2];
    }

    /*
    Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

    Exemplos para teste 

    Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
             -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

    * */

    //verificar numeros repetidos, retornar false
    //verificar se o numero da direita for menor 

    public function SequenciaCrescente(array $arrayNumeros): string
    {
        $flagNumero = null;
        $flagContadorNumeroDesordenados = 0;
        foreach ($arrayNumeros as $numero) {
            if (!$flagNumero) $flagNumero = $numero;
            if ($numero >= $flagNumero) {
                $flagNumero = $numero;
            } else {
                $flagContadorNumeroDesordenados++;
            }

            if ($flagContadorNumeroDesordenados > 1) return  'false';
        }
        return 'true';
    }
}

$Funcoes = new funcoes();

echo ($Funcoes->SeculoAno(2022)); // Atividade Século Ano
echo "\n";
echo ($Funcoes->PrimoAnterior(97)); // Atividade Número Primo Anterior
echo "\n";
echo ($Funcoes->SegundoMaior( // Atividade Segundo Maior Número
    array(
        array(25, 22, 18),
        array(10, 15, 13),
        array(24, 5, 2),
        array(80, 17, 15)
    )
));
echo "\n";
echo ($Funcoes->SequenciaCrescente([40, 10, 10, 50, 60])); // Atividade Sequência Crescente
