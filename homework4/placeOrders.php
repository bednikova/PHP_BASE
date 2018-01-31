<?php

include  __DIR__.'/lib/actions.php';
include 'dbFilesNames.php';

generateOrders($itemsDbFile, $customersDbFile, $ordersDbFile);

?>

