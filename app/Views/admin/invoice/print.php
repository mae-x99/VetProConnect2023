<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;1,100;1,200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Invoice</title>
</head>

<body>


    <style type="text/css">
    .countainer {
        width: 100%;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .countainer>img {
        height: 400px;
        position: absolute;
        z-index: -1;
        opacity: 0.2;
        left: calc(50% - 200px);
        top: calc(50% - 200px);
    }

    .head-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 3px solid #88adff;
    }

    .img>img {
        height: 200px;
    }


    .input-flex {
        display: flex;
        justify-content: space-between;
        border-bottom: 3px solid #88adff;
    }

    .box {
        width: calc(100% / 3);
        text-align: center;
        padding: 10px;
        box-sizing: border-box;
        border-left: 1px solid #88adff
    }

    .box>p {
        margin-bottom: 0
    }

    .box>h2 {
        margin-top: 0
    }

    .box-active {
        background: #88adff;
        color: #fff;
    }

    .sec-part {

        margin-top: 50px;
    }

    table {
        width: 100%;
        text-align: left;
        border-bottom: 2px solid #88adff;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px 5px
    }


    .border {
        width: 100%;
        height: 30px;
        background-color: #88adff;
        margin-top: 25px;
    }

    @media print {
        .print_report {
            display: none
        }
    }
    </style>

    <div class="countainer">
        <div class="head-flex">
            <div class="img">
                <img src="<?= BASEURL ?>/public/img/MAEXVET.png">
            </div>


            <div class="dr-name" style="text-align: right;">
                <p><b>Patient Name :</b>
                    <?= $print['patient'][0]['first_name'].' '.$print['patient'][0]['last_name']; ?></p>
                <?php if($print['patient'][0]['phone']){ ?><p><b>Phone :</b> <?= $print['patient'][0]['phone']; ?></p>
                <?php } ?>
                <?php if($print['patient'][0]['city']){ ?><p><b>City :</b> <?= $print['patient'][0]['city']; ?></< /p>
                    <?php } ?>
                    <?php if($print['patient'][0]['address']){ ?>
                <p><b>Address :</b> <?= $print['patient'][0]['address']; ?></< /p><?php } ?>
                    <?php if($print['patient'][0]['zipcode']){ ?>
                <p><b>Zipcode :</b> <?= $print['patient'][0]['zipcode']; ?></< /p><?php } ?>
            </div>

        </div>


        <div class="input-flex">
            <div class="box">
                <p>Invoice #</p>
                <h2>#<?= $print['id']; ?></< /h2>
            </div>

            <div class="box">
                <p>Date</p>
                <h2><?= $print['date']; ?></h2>
            </div>

            <div class="box box-active">
                <p>Total</p>
                <h2><?= $print['total']; ?></h2>
            </div>
        </div>

        <div class="sec-part">

            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th style="text-align: right;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
				    $medicine = json_decode($print['medicines']);
				    $med_qty = json_decode($print['med_qty']);
				    $med_amount = json_decode($print['med_amount']);
				    $med_desc = json_decode($print['med_desc']);
				    
				    
				    $services = json_decode($print['services']);
				    $ser_qty = json_decode($print['ser_qty']);
				    $ser_amount = json_decode($print['ser_amount']);
				    $ser_desc = json_decode($print['ser_desc']);
				    ?>

                    <?php
				for($i = 0;$i < count($services); $i++){ 
				    ?>
                    <tr>
                        <td><?= $services[$i]; ?></td>
                        <td><?= $ser_desc[$i]; ?></td>
                        <td><?= $ser_qty[$i]; ?></td>
                        <td><?= $ser_amount[$i] / $ser_qty[$i]; ?></td>
                        <td style="text-align: right;"><?= $ser_amount[$i]; ?></td>
                    </tr>
                    <?php } ?>
                    <?php
				    for($i = 0;$i < count($medicine); $i++){ 
				    ?>
                    <tr>
                        <td><?= $medicine[$i]; ?></td>
                        <td><?= $med_desc[$i]; ?></td>
                        <td><?= $med_qty[$i]; ?></td>
                        <td><?= $med_amount[$i] / $med_qty[$i]; ?></td>
                        <td style="text-align: right;"><?= $med_amount[$i]; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <p><b>Note : </b> <?= $print['note']; ?></p>

            <button type="button" class="btn btn-primary print_report"
                style="padding:8px 10px; background: #00b4d8; border:none;">
                <a href="javascript:void()" class="" style="color:white; text-decoration:none;"><b>Print Report</b></a>
            </button>

        </div>
        <div class="border"></div>



    </div>
</body>

</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$('.print_report').click(function() {
    console.log('work')
    window.print();
})
</script>