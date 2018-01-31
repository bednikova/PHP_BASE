<?php

include 'dbOperations.php';
include 'formatting.php';


echo '<pre>';


/*
 * действия - трябва да включва всички налични действия
    ▪listUsers
    ▪listItems
    ▪listOrders
    ▪generateOrders
 */

//==============================================================================
//функция, която приема масив и връща масив от 
//ключовете на масива и стойностите му
function createArrayOfKeysAndValues($array){
    
    $result = array();
    $arrayKeys = array();
    
    foreach ($array as $rowIdx => $row) {
	
	//Remove all white space characters
	$row = trim($row);
	
	if (empty($row)) {
		continue;
	}

	$values = array_filter(explode(',', $row));
	
	if ($rowIdx == 0) {
		$arrayKeys = $values;
		continue;
	}
	
	$result[$values[0]] = array_combine($arrayKeys, $values);
	
    }
    
    return $result;
}

//==============================================================================

//чете файл, създава масив от съдържанието на файла
//и го извежда форматирано
function readFileAndFormattingPrint($fileName){
    $name = read_file($fileName);
    printArray($name);
}

//==============================================================================


//функция, която чете три файла и принтира форматирането им
function readTreeFileAndFormattingPrint($file1, $file2, $file3){
    $array1 = read_file($file1);
    $array1Keys = createArrayOfKeysAndValues($array1);

    $array2 = read_file($file2);
    $array2Keys = createArrayOfKeysAndValues($array2);
    
    $array3 = read_file($file3);
    printCombTreeArray($array1Keys, $array2Keys, $array3);
}
//==============================================================================

//генерира поръчки и променя файл $file3
function generateOrders($file1, $file2, $file3){
    $array1 = read_file($file1);
    $items = createArrayOfKeysAndValues($array1);
    
    $array2 = read_file($file2);
    $customers = createArrayOfKeysAndValues($array2);
    
    $array3 = read_file($file3);
    $orders = createArrayOfKeysAndValues($array3);

    //Compile orders

    //Choose random number of random customer ids
    $randCustomerIds = array_rand( $customers, mt_rand(2, 8) );
    //Fetch the last order id
    if (!empty($orders)) {
            $allOrderIds = array_keys($orders);
            $orderId = end($allOrderIds);
    } else {
            $orderId = 0;
    }

    //Create an array, containing the new orders, because this is the 
    //only data which we need to append to the file
    $newOrders = array();

    //Foreach customer add random number of items to order
    foreach ( $randCustomerIds as $customerId ) {

            //Choose random number of random item ids
            $itemIds = array_rand( $items, mt_rand(2, 8) );

            //Increment the order id
            $orderId++;

            //Initialize total to 0
            $total = 0;

            //Calculate order total
            foreach ($itemIds as $itemId) {
                    $total+=$items[$itemId]['Price'];
            }

            //Create the order data
            $orderData = array(
                    'orderId'		=> $orderId,
                    'customerId'	=> $customerId,
                    'itemIds'		=> implode('|', $itemIds),
                    'total'			=> $total
            );

            //Add the order data to both order arrays
            $newOrders[$orderId] = $orders[$orderId] = $orderData;

    }

    //Fetch the order field names
    $orderFieldNames = array_keys( $newOrders[$orderId] );

    //Store the orders

    if (empty(file_get_contents($file3))) {
            //Set the first line to the field names
            file_put_contents( $file3, implode( ',', $orderFieldNames )."\n" );
    }

    //Iterate through all new orders and append them to the file
    foreach ( $newOrders as $newOrder ) {
            file_put_contents($file3, implode(',', $newOrder)."\n", FILE_APPEND | LOCK_EX);
    }
}


?>