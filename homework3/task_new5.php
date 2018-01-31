<?php


echo '<pre>';
/*
 * 5. Създайте програма,
 *  която да трансформира произволно
 *  число в десетична бройна система до 18-настична бройна система.
 *  Нека цифрите в тази бройна система са:
 * 0 1 2 3 4 5 6 7 8 9 A B C D E F G H
 */

//в коя бройна система искаме да превърнем числото
$base = 18;

//число в десетична бройна система
$number = random_int(1, 100);

//==============================================================================

  
//превръща $number от число в десетична бройна система, в число в
//$base -> бройна система
function convertedDecimalSystem($base, $number){
//help function
    function getChar($n){

        $array = [];
        for($i = 'A'; $i < 'Z'; $i++){
            $array[] = $i;
        }

        return $array[$n];
    }
    //==============================================================================
    
    //16 - бройна система
    //$base = 16;
    //$number = 428591;
    //
    //8 - бройна система
    //$base = 8;
    //$number = 74;
    //
    //16 - бройна система
    //$base = 16;
    //$number = 11;
    //




    //18 - бройна система
    //$base = 18;
    //$number = 214;
    
    
    //copy
    $numberCopy = $number;

    $exp = 0;
    $resultTest = 0;
    $result = "";
    while ($number > 0){

        $remainder  = ($number % $base);
        if($remainder < 10){
            $result = $remainder.$result;   
        }else{
            $result = getChar($remainder%10).$result;
        }
        $resultTest = $resultTest + pow($base, $exp)*$remainder;
        $number = (int)($number / $base);
        $exp++;
    }


    $resultNew =  "Тhe number - $numberCopy is".
                  "converted from a decimal system into a ".
                  $base." system:  ".$result."\n";

    //echo "Test: ".$resultTest."\n";

    return $resultNew;
}
//==============================================================================



echo convertedDecimalSystem($base, $number);

?>

