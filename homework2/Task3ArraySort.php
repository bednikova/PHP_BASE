<?php

echo "<pre>";

$MAX_COUNT_USERS = 200;
$maxUser = random_int(100, $MAX_COUNT_USERS);

//test
//$maxUser = 5;



$minOrders = 2;  //min count porychki
$maxOrders = 8;  //max count porychki

$minCount = 1;  //min number - orders
$maxCount = 9;  //max number - orders

$minCash = 10;  //min number - cash
$maxCash = 500;  //max number - cash

$mixPassL = 1000;  //min number - password
$maxPassL = 9999;  //max number - password


//function за сравнение
function cmp($a, $b){
    if($a == $b){
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}
//=============================================================================
//3. Създайте и запълнете многомерен масив, репрезентиращ следните данни
 
//-Създайте програма, запълваща новосъздадената структира със произволни данни, 
//така че всеки потребител да има между 2 и 8 поръчки и да има най-малко 
//100 потребителя

//-Създайте програма, която да изведе ID на потребителя, 
//генерирал най много оборот

//-Създайте програма, която да изведе ID на потребителя,
// направил най много поръчки

//-Създайте програма, която да създава нов масив, в който записите да са 
//сортирани по общ оборот

//-Създайте програма, която да създава нов масив, в който записите да са 
//сортирани по брой поръчки 
//=============================================================================

//==============================================================================
echo "\n======================================================================\n";
echo "Task3_1  \n";
//многомерен масив, репрезентиращ данните от фигурата
$usersArray = [ ['id' => 1,
            'username' => "john", 
            'password' => "pass4312", 
            'orders' => ["0001, 234 \$", "0005, 45 \$", "0008, 17 \$"]],
           ['id' => 2, 
            'username' => "amanda",
            'password' => "pass555", 
            'orders' => ["0002, 37 \$", "0006, 125 \$"]]];

/*
for($i = 0; $i <= 1; $i++)
    print_r($users[$i])."\n";
 */

echo "UsersArray - count users: 2 \n\n";
//извеждане на масива
print_r($usersArray)."\n";

//==============================================================================
echo "\n======================================================================\n";
echo "Task3_2 \n";
echo "Array users - count users: ".$maxUser."\n";

//цикъла запълва новосъздадената структира със произволни данни, 
//така че всеки потребител да има между 2 и 8 поръчки и да има най-малко 
//100 потребителя

$arraySumCash = [];  //масив от суми на оборота за всички потребители
$countOrdersArray = [];  //масив от броя на поръчките на даден потребител
for($j = 1; $j <= $maxUser; $j++){
    
    $sumCash = 0; //сума от оборота
    $countOrders = random_int($minOrders, $maxOrders);  //генерира броя на поръчките

    //създавам масив от поръчки
    $i = 0;
    $orders = [];
    while($i < $countOrders){
        $count = random_int($minCount, $maxCount);
        $cash = random_int($minCash, $maxCash);
        $orders[$i] = ["000$count", "$cash \$"]; 
        //$orders[$i] = "000$count $cash \$"  може и така да се записват поръчките
        $i++;
        //събирам оборота и за всеки потребител запазвам в масив
        $sumCash += $cash;
    }
    
    $countOrdersArray[] = $countOrders;
    $arraySumCash[] = $sumCash;
  
    //var_dump($orders);
    
    //създавам масив от символи
    $subStrName = [];
    for($i = 'a'; $i <= 'z'; $i++){
        $subStrName[] = $i;
    }
    //print_r(subStrName);

    //генерирам индекс за частите от името на потребител
    $indexFirst = random_int(0, 675);
    $indexSecond = random_int(0, 675);
    $indexEnd = random_int(0, 675);

    //създавам потребителско име
    $nameUser = $subStrName[$indexFirst].$subStrName[$indexSecond].$subStrName[$indexEnd];
    //echo "\n".$nameUser;
      
    //генерирам рандом число за паролата
    $pass = random_int($mixPassL, $maxPassL);
    
    //задавам информацията за user -> в масив, 
    //който е елемента на масив съдърж. всички потребители
    $users[$j-1] = ['id' => $j,
                    'username' => $nameUser, 
                    'password' => "pass".$pass, //добавям към паролата string
                    'orders' => $orders];
    
}

echo "\n";
//извеждам масива от потребители -> където потребителите са най - малко 100
// и броя на поръчките им е между 2 и 8
print_r($users);

        

//==============================================================================
echo "\n======================================================================\n";
echo "Task3_3 \n";

//Извейда id за потребителя с най-много оборот
//print_r($arraySumCash);  //масив от сумата от оборотите на потребителите
$maxCashUser = max($arraySumCash);  //най-много оборот
//echo $maxCashUser;
for($i = 0; $i < $maxUser; $i++){
    if($maxCashUser == $arraySumCash[$i]){
        echo "User with max cash: $maxCashUser \$ \n"."id:  ".($i+1)."\n\n\n";
    }
}

        

//==============================================================================
echo "\n======================================================================\n";
echo "Task3_4 \n";

//Извейда id за потребителя с най-много поръчки
$maxOrd = max($countOrdersArray);  //най-много поръчки
//echo $countOrdersArray;
for($i = 0; $i < $maxUser; $i++){
    if($maxOrd == $countOrdersArray[$i]){
        echo "User with max count orders: $maxOrd  \n"."id:  ".($i+1)."\n\n\n";
    }
}



//==============================================================================
echo "\n======================================================================\n";
echo "Task3_5 \n";
//създава нов масив, в който записите да са 
//сортирани по общ оборот

//сортира масива по най - голям общ оборот поръчки

//сортиран списък по  най - голям общ оборот
//правя копие на масива $arraySumCash, който съдържа общия оборот на 
//поръчките на даден потребител 
$sortArraySumCash = $arraySumCash;
//в масива $sortArraySumCash след изпълнението на функцията
//uasort, се записва сортитания масив $sortArraySumCash,
//който е сортиран във възходящ ред
uasort($sortArraySumCash , 'cmp');
//ще създам масив, който да съдържа ключовете на сортирания масив
//това ще е масива: $keyForSortArraySumCash 
$keyForSortArraySumCash  = array_keys($sortArraySumCash);

//echo "sort \n\n\n";
//print_r($arraySumCash);
//print_r($sortArraySumCash);
//print_r(array_keys($sortArraySumCash));

//тест
//echo "Test keyForSortArraySumCash: \n";
//print_r($keyForSortArraySumCash);

//сега всимаме ключа и презаписваме масива users в нов масив newUsers
echo "New array - sort by max cash \n\n\n";
//$newUsersArraySortCash = [];
//echo "Test id: ";
$k = $maxUser-1;
for($i = 0; $i < $maxUser && $k >= 0; $i++){
    $newUsersArraySortCash[$i] = $users[$keyForSortArraySumCash[$k]];
    //test echo -> id
    //echo $users[$keyForSortArraySumCash[$k]]['id']."  ";
    $k--;
}

//извеждам новия масив от потребители, който е сортиран 
//по най - голям общ оборот от поръчките на потребителите
//echo "\nnewUsersArraySortCash \n\n";
print_r($newUsersArraySortCash);

 


//==============================================================================
echo "\n======================================================================\n";
echo "Task3_6 \n";
echo "New array - sort by max orders \n\n\n";
//създава нов масив, в който записите да са 
//сортирани по брой поръчки 

//сортира масива по брой поръчки

//$sortArrayCountOrders = [];
//правя копие на масива $countOrdersArray, който съдържа броя на 
//поръчките за даден потребител
$sortArrayCountOrders = $countOrdersArray;
//в масива $sortArrayCountOrders след изпълнението на функцията
//uasort, се записва сортитания масив $sortArrayCountOrders,
//който е сортиран във възходящ ред
uasort($sortArrayCountOrders, 'cmp');
//ще създам масив, който да съдържа ключовете на сортирания масив
//това ще е масива: $keyForSortArrayCountOrders 
$keyForSortArrayCountOrders = array_keys($sortArrayCountOrders);

//echo "sort \n\n\n";
//print_r($countOrdersArray);
//print_r($sortArrayCountOrders);
//print_r(array_keys($sortArrayCountOrders));
//test
//echo "Test keyForSortArrayCountOrders: \n";
//print_r($keyForSortArrayCountOrders);

//сега всимам ключа и презаписвам масива users в нов масив newUsers
//$newUsersArraySortOrders = [];
//echo "Test id: ";
$j = $maxUser-1;
for($i = 0; $i < $maxUser && $j >= 0; $i++){
    $newUsersArraySortOrders[$i] = $users[$keyForSortArrayCountOrders[$j]];
    //test echo -> id
    //echo $users[$keyForSortArrayCountOrders[$j]]['id']."  ";
    $j--;
}


//извеждам новия масив от потребители, който е сортиран по брой поръчки
//echo "\nnewUsersArraySortOrders \n\n";
print_r($newUsersArraySortOrders);

echo "\n======================================================================\n";

 
?>



