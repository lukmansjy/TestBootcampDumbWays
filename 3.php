<?php
function bilangan($col, $row){
    $colPrint = 0;
    $rowPrint = 0;
    $prima=1;
    $loop = true;

    do{
        $y = 1;
        $x = 0;
        do{
            if( ($prima % $y) == 0){
                $x++;
            }
            $y++;
        }while($y <= $prima);
        
        if($x == 2){
            if($colPrint < ($col-1)){
                echo $prima.", ";
                $colPrint++;
            }else{
                echo $prima.", <br>";
                $colPrint = 0;
                $rowPrint++;
                if($rowPrint == $row){
                    $loop = false;
                }
            }
        }
    $prima++;
    }while($loop);
}

bilangan(4, 3);

?>