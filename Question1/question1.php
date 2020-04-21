<?php
function stairs($n) {
    $initArray = [2 => 2, 1 => 1, 0 => 0];
    for ($i = 3; $i <= $n; $i ++) {
        $initArray[$i] = $initArray[$i - 1] + $initArray[$i - 2];
    }
    return number_format($initArray[$n]);
}

echo "網址列代入n=10，或其他數字可以看到其他結果。</br>";

//樓梯層數
$n = ($_GET['n']) ? $_GET['n'] : 3;

$result = stairs($n);

echo $result;
