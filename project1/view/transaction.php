<!DOCTYPE html>
<html>
<head>
    <title>Your Transactions</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    table tr th,
    table tr td {
        padding: 15px;
        border: 1px #eee solid;
    }

    tfoot tr th,
    tfoot tr td {
        font-size: 20px;
    }

    tfoot tr th {
        text-align: right;
    }
    </style>
</head>

<body>
    <h3 style="margin:20px auto; text-align:center">Last Two Month's Transactions</h3>
    <p style="color:green; text-align: right; margin-right: 30px">Green color means Deposit</p>
    <p style="color:red; text-align: right; margin-right: 30px">Red color means Withdraw </p>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Transaction NO.</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>

            <?php if(!empty($transactions)) : ?>
            <?php foreach ($transactions as $tra) :?>

            <tr>

                <td><?php echo $tra[0] ?></td>
                <td><?= $tra[1] ?></td>
                <td><?php echo $tra[2] ?></td>
                <?php if(str_replace(['$', ','], '', $tra[3])<0) : ?>
                <td>
                    <span style="color:red">
                        <?=$tra[3] ?> </span>
                </td>
                <?php else :  ?>
                <td>
                    <span style="color:green">
                        <?=$tra[3] ?> </span>
                </td>
                <?php endif ?>

            </tr>
            <?php endforeach ?>
            <?php endif ?>


        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td>
                    <?= $total['Income'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td>
                    <?= $total['Expense'] ?> 
                </td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td>
                    <?= $total['Net'] ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>