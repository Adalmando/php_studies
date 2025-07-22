<?php

echo "Array normal:\n";
$variavel = array(1,2,3,4,5);
foreach($variavel as $i){
    echo "$i\n";
}

echo "Hash map:\n";
$variavel2 = array(1 => "Adalmando",2 => "Brasil",3 => "Casa");
echo "$variavel2[1]\n";
echo "$variavel2[2]\n";
echo "$variavel2[3]\n";