<?php

echo '<pre>';

    /*
     * 3. Създайте 12 променливи. 
     * §3.2. Нека на всяка от променливите се
     * присвои произволна стойност, кратна на 15.
     * Произволната стойност трябва да е 
     * различна при всяко изпълнение
     * на програмата. Изведете стойността 
     * на всяка една от променливите
     */
 
    $varMin = 1;              
    $varMax = 100;                          // or PHP_INT_MAX;
    
   
    $var1 = random_int($varMin, $varMax) * 15;
    $var2 = random_int($varMin, $varMax) * 15;
    $var3 = random_int($varMin, $varMax) * 15;
    $var4 = random_int($varMin, $varMax) * 15;
    $var5 = random_int($varMin, $varMax) * 15;
    $var6 = random_int($varMin, $varMax) * 15;
    $var7 = random_int($varMin, $varMax) * 15;
    $var8 = random_int($varMin, $varMax) * 15;
    $var9 = random_int($varMin, $varMax) * 15;
    $var10 = random_int($varMin, $varMax) * 15;
    $var11 = random_int($varMin, $varMax) * 15;
    $var12 = random_int($varMin, $varMax) * 15;

   
    

    
    echo $var1."\n";
    echo $var2."\n";
    echo $var3."\n";
    echo $var4."\n";
    echo $var5."\n";
    echo $var6."\n";
    echo $var7."\n";
    echo $var8."\n";
    echo $var9."\n";
    echo $var10."\n";
    echo $var11."\n";
    echo $var12."\n";

    
    


?>