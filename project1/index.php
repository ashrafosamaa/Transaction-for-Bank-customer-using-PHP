<?php

    $root = __DIR__ . DIRECTORY_SEPARATOR;

    define('APP_PATH', $root . 'app'. DIRECTORY_SEPARATOR);
    define('VIEW_PATH', $root . 'view'. DIRECTORY_SEPARATOR);
    define('FILE_PATH', $root . 'transaction_files'. DIRECTORY_SEPARATOR);

    require APP_PATH .'app.php';
    $files = getTransactionFile(FILE_PATH);
    
    $transactions = [];

    foreach($files as $file)
    {
        $transactions = array_merge($transactions , getTransaction($file));
    }
    
    $total = CalculateTotal($transactions);
    
    require VIEW_PATH .'transaction.php';
    
?>