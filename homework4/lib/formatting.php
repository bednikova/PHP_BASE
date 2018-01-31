<?php

//форматирането - трябва да включва цялото форматиране на изхода

//==============================================================================
//принтира форматирано масив
function printArray($array){
    foreach ($array as $rowIdx => $row) {
	
	//Remove all white space characters
	$row = trim($row);
	
	if (empty($row)) {
		continue;
	}
	
	$values = array_filter(explode(',', $row));
	
	if ($rowIdx == 0) {
		echo vsprintf( "%-10s || %-60s || %-40s || \n", $values );
		echo sprintf( "%'=-10s====%'=-60s====%'=-40s=== \n", '=', '=', '=', '=' );
		continue;
	}
	
	echo vsprintf( "%-10s || %-60s || %-40s || \n", $values );
	echo sprintf( "%'=-10s=||=%'=-60s=||=%'=-40s=|| \n", '=', '=', '=', '=' );
	
    }
}
//==============================================================================


function printCombTreeArray($items, $customers, $ordersRows){
    $ordersKeys = array();
    foreach ($ordersRows as $rowIdx => $row) {

            //Remove all white space characters
            $row = trim($row);

            if (empty($row)) {
                    continue;
            }

            $values = array_filter(explode(',', $row));

            if ($rowIdx == 0) {
                    echo sprintf( "%-10s || %-10s || %-40s || %-40s || %-60s || %-10s || \n", 
                                    'orderId',  
                                    'customerId',
                                    'customerName',
                                    'itemIds',
                                    'itemsList',
                                    'total'
                                    );
                    $ordersKeys = $values;
                    echo sprintf( "%'=-10s====%'=-10s====%'=-40s====%'=-40s====%'=-60s====%'=-10s=== \n", '=', '=', '=', '=', '=', '=' );
                    continue;
            }

            $orderData = array_combine($ordersKeys, $values);


            //Fetch related customer data
            $cusotmerData = $customers[$orderData['customerId']];
        $orderData['customerName'] = "{$cusotmerData['GivenName']} {$cusotmerData['Surname']}";

            echo sprintf( "%-10s || %-10s || %-40s || %-40s || %-60s || %-10s || \n",
                            $orderData['orderId'],
                            $orderData['customerId'],
                            $orderData['customerName'],
                            $orderData['itemIds'],
                            '',
                            $orderData['total']
                            );

            //Fetch related items data
            foreach ( explode('|', $orderData['itemIds']) as $itemId ) {
                    $itemData = $items[$itemId];
                    echo sprintf( "%-10s || %-10s || %-40s || %-40s || %-60s || %-10s || \n", '', '', '', $itemId, $itemData['Name'], '' );
            }

            echo sprintf( "%'=-10s=||=%'=-10s=||=%'=-40s=||=%'=-40s=||=%'=-60s=||=%'=-10s=|| \n", '=', '=', '=', '=', '=', '=' );

    }
}
?>