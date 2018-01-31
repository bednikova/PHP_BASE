<?php

include  __DIR__.'/lib/actions.php';
include 'dbFilesNames.php';

readTreeFileAndFormattingPrint($itemsDbFile, $customersDbFile, $ordersDbFile);

?>