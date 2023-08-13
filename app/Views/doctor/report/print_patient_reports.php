<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
    height: 90px;
}


.input-flex {
    display: flex;
    justify-content: space-between;
    margin-top: 50px;
}

.outline {
    width: 150px;
    outline: none;
    border-bottom: 2px solid #333;
    border-top: none;
    border-left: none;
    border-right: none;
    font-size: 18px;
    text-align: center;
}

.sec-part {
    display: flex;
    justify-content: space-between;
    margin-top: 50px;
}

.left {
    width: 220px;
    border-right: 1px solid black;
    align-items: center;
    height: 800px;
    padding: 0 20px 20px 20px;
    box-sizing: border-box;

}

.left ul {
    padding-left: 0px;
}

.left li {
    text-decoration: none
}

.right {
    width: calc(100% - 220px);
    padding: 0 20px 20px 50px;

}

.dumy>li {
    margin-top: 10px;
    margin-left: 20px;
    padding-left: 0;
}

.sec-dumy {
    margin-top: 10px;
    margin-left: 15px;
    padding-left: 0;

}

ol.sec-dumy>li {
    margin-top: 10px;
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
    <img src="<?= BASEURL ?>/public/img/MAEXVET.png">

    <div class="head-flex">
        <div class="dr-name">
            <h1><?= $report['doctor_name'] ?>
                <button type="button" class="btn btn-primary print_report"
                    style="padding:8px 10px; background: #00b4d8; border:none;">
                    <a href="javascript:void()" class="" style="color:white; text-decoration:none;"><b>Print
                            Report</b></a>
                </button>
            </h1>

        </div>
        <div class="img">
            <img src="<?= BASEURL ?>/public/img/MAEXVET.png">
        </div>

    </div>


    <div class="input-flex">
        <div>
            <label>Patient name:</label>
            <input type="text" class="outline" value="<?= $report['patient_name'] ?>">
        </div>

        <div>
            <label>Pet name:</label>
            <input type="text" class="outline" value="<?= $report['pet_name'] ?>">
        </div>

        <div>
            <label>Date:</label>
            <input type="text" class="outline" value="<?= $report['date'] ?>">
        </div>
    </div>

    <div class="sec-part">

        <div class="left">

            <h3>Services</h3>
            <ul class="dumy">
                <?php foreach($report['services'] as $row){ ?>
                <li>
                    <?= $row ?>
                </li>
                <?php } ?>
            </ul>

            <hr>

            <h3>Symptoms</h3>
            <ul class="dumy">
                <?php foreach(json_decode($report['symptoms']) as $row){ ?>
                <li>
                    <?= $row ?>
                </li>
                <?php } ?>
            </ul>


        </div>




        <div class="right">
            <h3>RX</h3>
            <ol class="sec-dumy">
                <?php foreach($report['medicines'] as $row){ ?>
                <li>
                    <?= $row ?>
                </li>
                <?php } ?>
            </ol>
        </div>

    </div>
    <div class="border"></div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $('.print_report').click(function() {
        console.log('work')
        window.print();
    })
    </script>