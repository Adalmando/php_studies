<?php

# While:
echo "While: \n";
$i = 1;
while ($i <= 10) {
    echo "$i\n";
    $i++;
}

// Do..while:
echo "Do...While:\n";
$a = 0;
do{
    echo "$a\n";
    $a++;
} while ($a < 10);



// For:
echo "For: \n";
for($s = 0; $s < 10; $s++){
    echo "$s\n";
}

// Foreach:
echo "Foreach: \n";
$lista =  [0,1,2,3,4,5,6,7,8,9];
foreach($lista as $j){
    echo"$j\n";
}