<?php 

echo "Digite um numero: ";
$a = (int)trim(fgets(STDIN));

while (is_int($a)){

    if ($a > 0){
        if ($a % 2 == 0) {    
            echo "$a eh par";
        }
        else{
            echo "$a eh impar!";
        }
        echo "\nDigite um numero ou apenas de enter para sair do programa: ";
        $a = (int)(trim(fgets(STDIN)));
    }
    else{
        echo "Saindo...";
        break;
    }
}
