<?php
function permute($array) {
    $result = [];
    if (count($array) == 1) {
        return [$array];
    }
    for ($i = 0; $i < count($array); $i++) {
        $remaining = $array;
        unset($remaining[$i]);
        $remaining = array_values($remaining);
        $permutes = permute($remaining);
        foreach ($permutes as $permute) {
            array_unshift($permute, $array[$i]);
            $result[] = $permute;
        }
    }
    return $result;
}

function solve() {
    $N = 3;  
    $confianças = [
        [1, 15, 37],  
        [42, 8, 25],  
        [77, 2, 1]    
    ];
    $positions = range(0, $N - 1);  
    $permutations = permute($positions);
    $max_confidence = 0;
    $best_permutation = [];
    foreach ($permutations as $perm) {
        $confidence = 1;
        for ($i = 0; $i < $N; $i++) {
            $confidence *= $confianças[$i][$perm[$i]];  
        }
        
        if ($confidence > $max_confidence) {
            $max_confidence = $confidence;
            $best_permutation = $perm;
        }
    }
    echo implode(' ', array_map(function($x) { return $x + 1; }, $best_permutation)) . PHP_EOL;
}
solve();

?>