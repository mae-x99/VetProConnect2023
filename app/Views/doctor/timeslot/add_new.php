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
    position: absolute;
    right: 10px;
    top: 12px;
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

#ck-button {
    margin: 4px;
    background-color: #EFEFEF;
    border-radius: 4px;
    border: 1px solid #D0D0D0;
    overflow: auto;
    float: left;
    width: 102px;
}

#ck-button label {
    float: left;
    width: 4.0em;
    margin-bottom: 0px;
}

#ck-button label span {
    text-align: center;
    padding: 3px 0px;
    display: block;
    width: 100px;
}

#ck-button label input {
    position: absolute;
    top: -20px;
}

#ck-button input:checked+span {
    background-color: #00aa00;
    color: #fff;
}

#ck-button input {
    display: none;
}

.modal {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1060;
    display: none;
    width: 100%;
    height: 100%;
    overflow-x: hidden;
    overflow-y: auto;
    outline: 0;
}

.modal-dialog {
    position: relative;
    width: auto;
    margin: 0.5rem;
    pointer-events: none;
}

.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .2);
    border-radius: 0.3rem;
    outline: 0;
}

.modal-header {
    display: flex;
    flex-shrink: 0;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 1rem;
    border-bottom: 1px solid #dee2e6;
    border-top-left-radius: calc(0.3rem - 1px);
    border-top-right-radius: calc(0.3rem - 1px);
}

.modal-title {
    margin-bottom: 0;
    line-height: 1.5;
}

.modal-header .btn-close {
    padding: 0.5rem 0.5rem;
    margin: -0.5rem -0.5rem -0.5rem auto;
}

.modal-body {
    position: relative;
    flex: 1 1 auto;
    padding: 1rem;
}

.modal-footer {
    display: flex;
    flex-wrap: wrap;
    flex-shrink: 0;
    align-items: center;
    justify-content: flex-end;
    padding: 0.75rem;
    border-top: 1px solid #dee2e6;
    border-bottom-right-radius: calc(0.3rem - 1px);
    border-bottom-left-radius: calc(0.3rem - 1px);
}

.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1040;
    width: 100vw;
    height: 100vh;
    background-color: #000;
}

.modal-backdrop.show {
    opacity: .5;
}

.modal-dialog {
    max-width: 500px;
    margin: 1.75rem auto;
}

.modal.fade .modal-dialog {
    transition: transform .3s ease-out;
    transform: translate(0, -50px);
}

.modal.show .modal-dialog {
    transform: none;
}
</style>



<div class="mb-3">
    <h1 class="h3 d-inline align-middle">Add New Time Slots</h1>
</div>

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <form action="<?php  echo base_url('slot/store');  ?>" method="post">
                <input type="hidden" name="id" value="<?php if(isset($_GET['slot_id'])){echo $_GET['slot_id']; } ?>">
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
                    <div id="slotWrapper">
                        <div class="row">
                            <div class="form-group col-sm-3 mb-3">
                                <label>Start Time<span>*</span></label>
                                <?php 
								                	$start = '0830';
													$end = '1830';
													$date_end = date_create($end);
												?>
                                <select name="start_time" class="form-control start_time">
                                    <?php for($date = date_create($start);$date <= $date_end; $date->modify('+30 Minutes')){ ?>
                                    <option value="<?php echo $date->format('H:i') ; ?>">
                                        <?php echo $date->format('H:i') ; ?></option>
                                    <?php } ?>

                                </select>



                            </div>
                            <!--- ====== form-group ======= ---->
                            <div class="form-group col-sm-3 mb-3">
                                <label>Slot Duration<span>*</span></label>
                                <select name="duration" class="form-control duration">
                                    <option value="30">30 Minutes</option>
                                    <option value="60">60 Minutes</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 mb-3">
                                <label>Number Of Slots<span>*</span></label>
                                <input type="number" class="form-control number_of_slots" name="number_of_slots" min="1"
                                    placeholder="" value="<?php if(isset($_GET['slot'])){echo $_GET['slot']; } ?>"
                                    required>
                            </div>
                            <div class="form-group col-sm-3 mb-3">
                                <label>End Time<span>*</span></label>
                                <input type="text" readonly="" class="form-control end_time" name="end_time"
                                    value="<?php if(isset($_GET['end_time'])){echo $_GET['end_time']; } ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="timeing_slots"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3" style="text-align:right">
                        <input type="submit" class="btn btn-primary" value="SAVE SLOT">
                    </div>


                </div>


            </form>
        </div>
    </div>
</div>




<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>ALL SLOTS</h4>
        </div>
        <div class="card-body">


            <?php if(session()->getFlashdata('del_error')):?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('del_error') ?>
            </div>
            <?php endif;?>

            <?php if(session()->getFlashdata('del_success')):?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('del_success') ?>
            </div>
            <?php endif;?>


            <table class="table table-bordered table-hover" id="mytable">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Slot</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
										    $i=1;
										    foreach($slots as $row){
										    ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['slot'] ?></td>

                        <td>
                            <a href="javascript:void(0)" class="badge bg-info edit_slot"
                                data-time="<?= $row['slot']; ?>" data-ids="<?= $row['id']; ?>"> <i class="align-middle"
                                    data-feather="edit"></i> Edit</a>


                            <a href="javascript:void(0)" data-ids="<?= base_url('slot/delete/'.$row['id']); ?>"
                                class="badge bg-danger delete_record"> <i class="align-middle" data-feather="trash"></i>
                                Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="timeslotEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Time</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="update_time">
                    <div class="row">
                        <div class="form-group col-sm-12 mb-3">
                            <label>Slot<span>*</span></label>
                            <input type="text" class="form-control edit_slot_time_val" name="slot" />
                            <input type="hidden" class="edit_slot_id" name="slot_id" />



                        </div>
                        <!--- ====== form-group ======= ---->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button style="margin: 10px;" type="button" class="btn btn-danger"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_changes">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script type="text/javascript">
$('.delete_record').click(function() {
    var url = $(this).attr('data-ids');
    Swal.fire({
        icon: 'error',
        html: 'Are you sure you want to delete this record?',
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = url
        }
    });
})


$('.number_of_slots').keyup(function() {
    var start_time = $('.start_time option:selected').val()
    var number_of_slots = $(this).val()
    var duration = $('.duration option:selected').val();

    var total_minutes = number_of_slots * duration;

    var end_time = moment.utc(start_time, 'hh:mm').add(total_minutes, 'minutes').format('HH:mm');
    $('.end_time').val(end_time)
    var start = moment.utc(start_time, 'HH:mm');
    var end = moment.utc(end_time, 'HH:mm');
    $('.timeing_slots').html('');
    if (number_of_slots > 30 && duration == 30) {
        $('.timeing_slots').html('<div class="alert alert-danger">You can not enter more then 30 slots</div>')
        return false;
    } else if (number_of_slots > 15 && duration == 60) {
        $('.timeing_slots').html('<div class="alert alert-danger">You can not enter more then 15 slots</div>')
        return false;
    }
    $('.timeing_slots').html('');
    while (start < end) {
        var time_takes = start.format('HH:mm') + '-' + start.format('HH:mm');
        var start_time2 = start.format('HH:mm');
        end_time = start.add(duration, 'minutes')

        var time_takes = start_time2 + '-' + end_time.format('HH:mm');
        var html = '<div id="ck-button"><label><input type="checkbox" name="time_slots_added[]" value="' +
            time_takes + '" checked><span>' + time_takes + '</span></label></div>';
        $('.timeing_slots').append(html)
    }

})

$('.start_time').change(function() {
    var start_time = $('.start_time option:selected').val()
    var number_of_slots = $('.number_of_slots').val();
    var duration = $('.duration option:selected').val();
    if (number_of_slots != '') {
        if (number_of_slots > 30 && duration == 30) {
            $('.timeing_slots').html(
                '<div class="alert alert-danger">You can not enter more then 30 slots</div>')
            return false;
        } else if (number_of_slots > 15 && duration == 60) {
            $('.timeing_slots').html(
                '<div class="alert alert-danger">You can not enter more then 15 slots</div>')
            return false;
        }
        $('.timeing_slots').html('');
        var total_minutes = number_of_slots * duration;

        var end_time = moment.utc(start_time, 'hh:mm').add(total_minutes, 'minutes').format('HH:mm');
        $('.end_time').val(end_time)
        var start = moment.utc(start_time, 'HH:mm');
        var end = moment.utc(end_time, 'HH:mm');
        $('.timeing_slots').html('');
        while (start < end) {
            var time_takes = start.format('HH:mm') + '-' + start.format('HH:mm');
            var start_time2 = start.format('HH:mm');
            end_time = start.add(duration, 'minutes')

            var time_takes = start_time2 + '-' + end_time.format('HH:mm');
            var html = '<div id="ck-button"><label><input type="checkbox" name="time_slots_added[]" value="' +
                time_takes + '" checked><span>' + time_takes + '</span></label></div>';
            $('.timeing_slots').append(html)
        }
    }


})

$('.duration').change(function() {
    var start_time = $('.start_time option:selected').val()
    var number_of_slots = $('.number_of_slots').val();
    var duration = $('.duration option:selected').val();
    if (number_of_slots != '') {
        if (number_of_slots > 30 && duration == 30) {
            $('.timeing_slots').html(
                '<div class="alert alert-danger">You can not enter more then 30 slots</div>')
            return false;
        } else if (number_of_slots > 15 && duration == 60) {
            $('.timeing_slots').html(
                '<div class="alert alert-danger">You can not enter more then 15 slots</div>')
            return false;
        }
        $('.timeing_slots').html('');
        var total_minutes = number_of_slots * duration;

        var end_time = moment.utc(start_time, 'hh:mm').add(total_minutes, 'minutes').format('HH:mm');
        $('.end_time').val(end_time)
        var start = moment.utc(start_time, 'HH:mm');
        var end = moment.utc(end_time, 'HH:mm');
        $('.timeing_slots').html('');
        while (start < end) {
            var time_takes = start.format('HH:mm') + '-' + start.format('HH:mm');
            var start_time2 = start.format('HH:mm');
            end_time = start.add(duration, 'minutes')

            var time_takes = start_time2 + '-' + end_time.format('HH:mm');
            var html = '<div id="ck-button"><label><input type="checkbox" name="time_slots_added[]" value="' +
                time_takes + '" checked><span>' + time_takes + '</span></label></div>';
            $('.timeing_slots').append(html)
        }
    }


})



$('.edit_slot').click(function() {
    var id = $(this).attr('data-ids');
    var slot = $(this).attr('data-time');
    $('.edit_slot_time_val').val(slot);
    $('.edit_slot_id').val(id);
    $('#timeslotEditModal').modal('show');
})


$('.update_changes').click(function() {
    var edit_slot = $('.edit_slot_time_val').val();
    var edit_slot_id = $('.edit_slot_id').val();
    if (edit_slot != '') {
        $.ajax({
            url: "<?php echo base_url() ; ?>/slot/update",
            type: "post",
            data: {
                edit_slot_id: edit_slot_id,
                edit_slot: edit_slot
            },
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        html: data.message,
                        showCancelButton: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload()
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        html: data.message,
                        showCancelButton: false,
                    })
                }

            }
        });
    }
})
</script>