<?php

function predictPrice(array $data, $taille) {
    $m = count($data);
    $sumX = 0;
    $sumY = 0;
    $sumXY = 0;
    $sumX2 = 0;
    
    foreach ($data as $maison) {
        $sumX += $maison['taille'];
        $sumY += $maison['price'];
        $sumXY += $maison['taille'] * $maison['price'];
        $sumX2 += pow($maison['price'], 2);
    }
    
    $theta1 = ($m * $sumXY - $sumX * $sumY) / ($m * $sumX2 - pow($sumX, 2));
    $theta0 = ($sumY - $theta1 * $sumX) / $m;

    return $theta0 + $theta1 * $taille;
}




?>