<style>
label {
    margin-bottom: 5px;
}

label>span {
    color: red;
}

textarea.form-control {
    height: 150px;
}

.form-control {
    height: 45px;
}

span.removeRP {
    background: #fb4040;
    color: #fff;
    padding: 2px 5px;
    border-radius: 2px;
    box-shadow: 0 3px 5px #ddd;

    cursor: pointer;
}

.alert.alert-danger {
    background: #ff1a6c57;
    color: #fff;
    padding: 5px 10px;
    border: 1px solid #ff1a6c33;
    border-radius: 5px;
    margin-bottom: 20px;
}

.alert-success {
    background: #48d79b94;
    color: #fff;
    padding: 5px 10px;
    border: 1px solid #48d79b94;
    border-radius: 5px;
    margin-bottom: 20px;
}
</style>




<div class="mb-3">
    <h1 class="h3 d-inline align-middle">Add New Invoice</h1>
</div>
<?php if(session()->getFlashdata('error')):?>
<div class="alert alert-danger">
    <?= session()->getFlashdata('error') ?>
</div>
<?php endif;?>

<?php if(session()->getFlashdata('success')):?>
<div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
</div>
<?php endif;?>




<div class="row">


    <div class="col-sm-6 col-xs-12">
        <div class="card">

            <div class="card-header" style="padding-bottom:0">
                <h4>ADD Services</h4>
            </div>
            <div class="card-body">

                <div class="row">

                    <div class="col-sm-5" style="position:relative">
                        <label>Select Service</label>
                        <select class="form-control" id="service" required>
                            <option value="">Select Service</option>
                            <?php foreach($services as $row){ ?>
                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--- form-group --->


                    <div class="col-sm-3" style="position:relative">
                        <label>Quantity</label>
                        <input type="number" class="form-control" id="serQty" value="1" min="1">
                    </div>
                    <!--- form-group --->


                    <div class="col-sm-4" style="position:relative">
                        <label>Price</label>
                        <input type="number" class="form-control" id="serPrice" disabled>
                    </div>
                    <!--- form-group --->

                    <div class="col-sm-10" style="position:relative">
                        <label>Description</label>
                        <input type="text" class="form-control" id="serDesc">
                    </div>
                    <!--- form-group --->

                    <div class="col-sm-2 mt-4">
                        <button type="button" class="btn btn-info btn-block" id="addSER"
                            style="width:100%;height:45px">ADD</button>
                    </div>
                </div>

            </div>


        </div>
    </div>


    <div class="col-sm-6 col-xs-12">
        <div class="card">

            <div class="card-header" style="padding-bottom:0">
                <h4>ADD Medication</h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <div id="medAvailable"></div>

                    <div class="col-sm-5" style="position:relative">
                        <label>Select Medicine<span>*</span></label>
                        <select class="form-control" id="medicine">
                            <option value="">Select Medicine</option>
                            <?php foreach($medicines as $row){ ?>
                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--- form-group --->


                    <div class="col-sm-3" style="position:relative">
                        <label>Quantity</label>
                        <input type="number" class="form-control" id="medQty" value="1" min="1">
                    </div>
                    <!--- form-group --->


                    <div class="col-sm-4" style="position:relative">
                        <label>Price</label>
                        <input type="number" class="form-control" id="medPrice" disabled>
                    </div>
                    <!--- form-group --->


                    <div class="col-sm-10" style="position:relative">
                        <label>Description</label>
                        <input type="text" class="form-control" id="medDesc">
                    </div>
                    <!--- form-group --->


                    <div class="col-sm-2 mt-4">
                        <button type="button" class="btn btn-info btn-block" id="addMed"
                            style="width:100%;height:45px">ADD</button>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <form action="<?= base_url('invoice/store'); ?>" method='post'>

        <div class="row">

            <div class="col-sm-9 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bodered">
                            <thead>
                                <tr>
                                    <th style="width:80px"> <span class="removeRP"
                                            style="visibility: hidden">Remove</span></th>
                                    <th>Name</th>
                                    <th>Desc</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="tbWrapper">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>









            <div class="col-sm-3 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-12 mb-3" style="position:relative">
                                <label>Date<span>*</span></label>
                                <input type="date" class="form-control" name="date" value="<?= date('Y-m-d'); ?>"
                                    required>
                            </div>
                            <!--- form-group --->

                            <div class="col-sm-12 mb-3" style="position:relative">
                                <label>Select Patient<span>*</span></label>
                                <select class="form-control" name="patient" required>
                                    <option value="">Select Patient</option>
                                    <?php foreach($patient as $row){ ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['first_name'].' '.$row['last_name'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!--- form-group --->

                            <div class="col-sm-12 mb-3" style="position:relative">
                                <label>Total</label>
                                <input type="text" class="form-control" name="total" id="total" value="0" readonly>
                            </div>
                            <!--- form-group --->

                            <div class="col-sm-12 mb-3" style="position:relative">
                                <label>Note</label>
                                <textarea class="form-control" name="note"></textarea>
                            </div>
                            <!--- form-group --->


                            <div class="col-sm-12 mt-3">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-ms btn-block"
                                        style="height:50px;width:100%" value="SAVE NOW">
                                </div>
                            </div>
                            <!--- ===col-sm-8 === ---->



                        </div>
                    </div>
                </div>
            </div>

        </div>

    </form>



</div>



<script>
$(document).ready(function() {

    //add service
    $('#addSER').click(function() {
        var id = $('#service').val();
        var name = $('#service option:selected').text();
        var qty = $('#serQty').val();
        var price = $('#serPrice').val();
        var serDesc = $('#serDesc').val();
        var amount = parseInt(qty) * parseInt(price);

        if (id != '' && name != '' && qty != '' && price != '') {
            $('#tbWrapper').append('<tr>' +
                '<td style="width:80px"> <span class="removeRP" date-price="' + amount +
                '" >Remove<input type="hidden" value="' + amount + '" class="amount"></span></td>' +
                '<td>' + name + '<input type="hidden" name="serviceName[]" value="' + id +
                '"></td><td>' + serDesc + '<input type="hidden" name="serviceDesc[]" value="' +
                serDesc + '"></td>' +
                '<td>' + qty + '<input type="hidden" name="serviceQty[]" value="' + qty +
                '"></td>' +
                '<td class="amount">' + amount +
                '<input type="hidden" name="servicePrice[]" value="' + amount + '"></td>' +
                '</tr>');

            //set value for total
            var total = $('#total').val();
            $('#total').val(parseInt(total) + parseInt(amount));

            //set null
            $('#serPrice').val(null);
            $('#serQty').val(1);
            $('#serDesc').val(null);
            $('#service').val('');

        } //end if
        else {
            alert('Please Select A Service');
        }
    });


    //add Medicine
    $('#addMed').click(function() {
        var id = $('#medicine').val();
        var name = $('#medicine option:selected').text();
        var qty = $('#medQty').val();
        var medDesc = $('#medDesc').val();
        var price = $('#medPrice').val();
        var amount = parseInt(qty) * parseInt(price);
        var available = $('#available').val();

        if (id != '' && name != '' && qty != '' && price != '' && parseInt(qty) <= parseInt(
            available)) {
            $('#tbWrapper').append('<tr>' +
                '<td style="width:80px"> <span class="removeRP" date-price="' + amount +
                '" >Remove<input type="hidden" value="' + amount + '" class="amount"></span></td>' +
                '<td>' + name + '<input type="hidden" name="medicineName[]" value="' + id +
                '"></td><td>' + medDesc + '<input type="hidden" name="medicineDesc[]" value="' +
                medDesc + '"></td>' +
                '<td>' + qty + '<input type="hidden" name="medicineQty[]" value="' + qty +
                '"></td>' +
                '<td>' + amount + '<input type="hidden" name="medicinePrice[]" value="' + amount +
                '"></td>' +
                '</tr>');

            //set value for total
            var total = $('#total').val();
            $('#total').val(parseInt(total) + parseInt(amount));

            //set null
            $('#medPrice').val(null);
            $('#medQty').val(1);

            $('#medDesc').val(null);
            $('#medicine').val('');


        } //end if
        else {
            alert('Please Select A Medicine');
        }
    });



    $(document).on('click', '.removeRP', function() {

        var total = $('#total').val();

        var price = $(this).find('input').val();
        var amount = parseInt(total) - parseInt(price);
        console.log('price :' + price + " / Total : " + total + " / amount : " + amount);
        if (amount > 0) {
            $('#total').val(amount);
        } else {
            $('#total').val(0);
        }


        $(this).parent().parent().remove();
    });





    //get service prices

    $('#service').on('change', function() {
        var id = $(this).val();
        if (id != '') {
            $.ajax({
                type: "POST",
                url: "<?= base_url('invoice/service/price'); ?>",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: {
                    id: id
                },
                success: function(data) {
                    var obj = $.parseJSON(data)
                    $.each(obj, function(key, value) {
                        $('#serPrice').val(value['price']);
                    });

                }
            });
        } else {
            alert('Please Choose Doctor and Date');
        }
    });


    //get Medicine prices

    $('#medicine').on('change', function() {
        var id = $(this).val();
        if (id != '') {
            $.ajax({
                type: "POST",
                url: "<?= base_url('invoice/medicine/price'); ?>",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: {
                    id: id
                },
                success: function(data) {
                    var obj = $.parseJSON(data)
                    $.each(obj, function(key, value) {
                        $('#medPrice').val(value['price']);
                        $('#medAvailable').html('<b>Available Quantity : ' + value[
                                'quantity'] +
                            '</b><input type="hidden" value="' + value[
                                'quantity'] + '" id="available">');
                    });

                }
            });
        } else {
            alert('Please Choose Doctor and Date');
        }
    });








});
</script>