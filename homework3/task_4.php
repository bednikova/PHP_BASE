<?php

/* 
 * 4. Създайте програма, която да:
 * Съхранява двумерен масив в CSV file. 
 * Изчита съдържанието на съхранения CSV file и го записва в друг двумерен масив
 */

echo '<pre>';

const USER_COUNT = 5;

//==============================================================================
//създава пройзволно потребителско име
function createName(){
    $arrChars = [];
    for($i = 'a'; $i <= 'z'; $i++)
    {
        $arrChars[] = $i;
    }
    
    $firstArr = [];
    for($i = 'A'; $i < 'Z'; $i++)
    {
        $firstArr[] = $i;
    }
    
    //var_dump($arrChars);
    
    $rand1 = random_int(0, 675);
    $rand2 = random_int(0, 675);
    $rand3 = random_int(0, 675);
    $firstChar = random_int(0, 25);
    $newName = $firstArr[$firstChar].$arrChars[$rand1].$arrChars[$rand2].$arrChars[$rand3];
    
    return $newName;
}

//създава пройзволна потребителска парола
function createPassword(){
    for($i = 'a'; $i < 'z'; $i++)
    {
        $arrChars[] = $i;
    }
    
    for($k = 0; $k < 10; $k++)
    {
        $arrNumbers[] = $k;
    }
    
    //var_dump($arrChars);
    //var_dump($arrNumbers);
    
    
    $newPassword = "";
    $j = 0;
    while ($j <= 10){
        $rand1 = random_int(0, 25);
        $rand2 = random_int(0, 9);
        $newPassword .= $arrChars[$rand1].$arrNumbers[$rand2];
        $j += 2;
    }
    
    return $newPassword;
}
//==============================================================================



//масив от потребители
//$arrayUsers = [];
for($i = 0; $i < USER_COUNT; $i++){
    $name = createName();
    $password = createPassword();
    $arrayUsers[$i] = ["id" => $i+1,
                      "name" => $name,
                      "password" => $password];
}





for($i = 0; $i < USER_COUNT; $i++){
    $a = implode(",", $arrayUsers[$i])."\n";
    //var_dump($a);
    $fileHandle = fopen(__DIR__.'/task_4.csv', 'a+');
    $path = __DIR__.'/task_4.csv';
    file_put_contents($path, $a, FILE_APPEND);
}


    
   
    $fileHandle = fopen(__DIR__.'/task_4.csv', 'a+');
    $path = __DIR__.'/task_4.csv';
    $a = file_get_contents($path);
    
   // echo $a;
    
    $b = explode("\n", $a);
    //var_dump($b);
    
    $arr = [];
    for($i = 0; $i < USER_COUNT; $i++)
    {
        $arr[] = explode(",", $b[$i]);
    }
    
    print_r($arr);
   
 ?>



