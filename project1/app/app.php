<?php

    function getTransactionFile(string $dirpath)
    {
        $files =[];
        foreach(scandir($dirpath) as $file)
        {
            if(is_dir($file))
            continue;
            $files[] = $dirpath.$file;
        }
        return $files;
    }

    function getTransaction(string $FilePath)
    {
        if(!file_exists($FilePath))
        {
            echo "File Not Exists!!";
        }
        else
        {
            $file = fopen($FilePath , 'r');

            $transactions = [];

            while(($transaction = fgetcsv($file)) !== false)
            {
                if($transaction != null)
                {
                    $transactions[] = $transaction;
                }
            }
            return $transactions;
        }
    }

    function CalculateTotal($transactions)
    {
    
    
    $total = ['Income'=> 0 , 'Expense'=> 0 , 'Net'=> 0];
    
    foreach($transactions as $transaction)
    {
    
        $amount = str_replace(['$',','],'', $transaction[3]);
    
        if($amount>0)
        {
            $total['Income']+=(int)$amount;
        }
        else
        {
            $total['Expense']+=(int)$amount;
        }
        $total['Net']+=(int)$amount;
        
    }
    return $total;
        
    }
?>