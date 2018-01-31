<?php

echo '<pre>';
/*
 * 1. Създайте променливи, присъединете на тях следните стойности, 
 * ползвайки посочените литерали, 
 * след което изведете тяхната стойност посредством var_dump:
 * §Нормален string литерал ( пр. 'This is a test' )
 * §Произволен текст в Heredoc
 * §Boolean
 * §Integer
 */


//string
    $str = 'This is a test';   
    
//Heredoc
    $text = <<<EOT
Hello world! 
heredoc
EOT;
    
//boolean
    $bool = TRUE;
    

    
//Integer    
    $intNum = 1;
    
    
    echo "\n";
    var_dump($str);  //string
    
    echo "\n";
    var_dump($text);  //heredoc
    
    echo "\n";
    var_dump($bool);  //boolean
    
    echo "\n";
    var_dump($intNum);  //integer
    
   
?>