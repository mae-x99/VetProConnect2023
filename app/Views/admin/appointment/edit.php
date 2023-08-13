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
    <h1 class="h3 d-inline align-middle">Update Appointment</h1>
</div>

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('appointment/update') ?>" method="post">


                <div class="row">
                    <input type="hidden" name="type" value="admin">
                    <input type="hidden" value="<?= $appointment['id'] ?>" name="id">
                    <input type="hidden" value="<?= $appointment['patient_id'] ?>" name="patient_id">
                    <div class="form-group col-sm-12 col-xs-12 mb-3">

                        <label>Select Doctor<span>*</span></label>
                        <select class="form-control" id="doctor" name="doctor" required>
                            <option value="">Select Doctor</option>
                            <?php foreach($doctors as $row){ ?>
                            <option value="<?= $row['id'] ?>"
                                <?php if($appointment['doctor_id'] == $row['id']){ echo 'selected';} ?>>
                                <?= $row['first_name'].' '.$row['last_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--- ====== form-group ======= ---->

                    <div class="form-group col-sm-12 col-xs-12 mb-3">
                        <label>Select Pet<span>*</span></label>
                        <select class="form-control" name="pet" required>
                            <option value="">Select Pet</option>
                            <?php foreach($pets as $row){ ?>
                            <option value="<?= $row['id'] ?>"
                                <?php if($appointment['pet_id'] == $row['id']){ echo 'selected';} ?>>
                                <?= $row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--- ====== form-group ======= ---->




                    <div class="form-group col-sm-12 col-xs-12 mb-3">
                        <label>Date<span>*</span></label>
                        <input type="Date" class="form-control" value="<?= $appointment['date']; ?>" id="date"
                            name="date" placeholder="Date" required>
                    </div>
                    <!--- ====== form-group ======= ---->

                    <div class="form-group col-sm-12 col-xs-12 mb-3">
                        <label>Available Timeslots<span>*</span></label>
                        <select class="form-control" name="timeslot" id="slotWrap" required>
                            <option value="<?= $slot['id'] ?>"><?= $slot['slot'] ?></option>
                        </select>
                    </div>
                    <!--- ====== form-group ======= ---->



                    <div class="form-group mt-3" style="text-align:right">
                        <input type="submit" class="btn btn-primary" value="UPDATE APPOINTMENT">
                    </div>


                </div>


            </form>
        </div>
    </div>
</div>







<script>
$(document).ready(function() {
    $('#date').on('change', function() {
        var date = $(this).val();
        var doctor = $('#doctor').val();
        if (date != '' && doctor != '') {
            $.ajax({
                type: "POST",
                url: "<?= base_url('appointment/getSlots'); ?>",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: {
                    date: date,
                    doctor: doctor
                },
                success: function(data) {
                    console.log(data);
                    $('#slotWrap').html(data);
                }
            });
        } else {
            alert('Please Choose Doctor and Date');
        }
    });


    $('#patient').on('change', function() {
        var id = $(this).val();
        if (id != '') {
            $.ajax({
                type: "POST",
                url: "<?= base_url('appointment/get/pets'); ?>",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: {
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $('#pets').html(data);
                }
            });
        } else {
            alert('Please Choose Doctor and Date');
        }
    });

});
</script>