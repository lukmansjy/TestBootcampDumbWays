<?php
$data_array1 = [
    ['s', 'y', 'a', 'b'],
    ['c', 'x', 'a'],
    ['x', 's', 'c', 'd', 'f']
];

$data_array2 = [
    ['d', 'y'],
    ['s', 'd', 'c', 'g', 'f'],
    ['f', 'r', 'z']
];

function sort_array($arr){
    sort($arr);
    for($x=0; $x<count($arr); $x++){
        sort($arr[$x]);
        if($x == 0){
            echo "[ <br>";
        }
        for($y=0; $y<count($arr[$x]); $y++){
            if($y == 0){
                echo "[";
            }
            echo "'".$arr[$x][$y]."'";
            if($y !== count($arr[$x])-1){
                echo ", ";
            }
            if($y == count($arr[$x])-1){
                echo "]";
            }
        }
        if($x <= count($arr)-2){
            echo ", <br>";
        }
        if($x == count($arr)-1){
            echo "<br> ] <br>";
        }
    }
    
}

sort_array($data_array1);

?>