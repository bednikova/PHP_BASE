<?php

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
$arrayUsers = [];
for($i = 0; $i < USER_COUNT; $i++){
    $name = createName();
    $password = createPassword();
    $arrayUsers[$i] = ["id" => $i+1,
                      "name" => $name,
                      "password" => $password];
}
    




function printArray($array){
    echo sprintf( "%'=-10s====%'=-60s====%'=-40s=== \n", '=', '=', '=', '=' );
    echo sprintf( "%-10s || %-13s || %-40s \n", 'ID', 'Name', 'Password' );
    echo sprintf( "%'=-10s====%'=-60s====%'=-40s=== \n", '=', '=', '=', '=' );
    
    for($i = 0; $i < count($array); $i++){
        echo sprintf( "%-10s || %-13s || %-40s \n",
			$array[$i]['id'],
			$array[$i]['name'],
			$array[$i]['password']
                    );
        echo sprintf( "%'=-10s====%'=-60s====%'=-40s=== \n", '=', '=', '=', '=' );
    }
}

	
printArray($arrayUsers);


?>