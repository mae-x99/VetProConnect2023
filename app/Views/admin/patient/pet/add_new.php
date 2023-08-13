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
    top: 0px;
    cursor: pointer;
}

.newClass .removeRP {
    display: block !important;
}
</style>



<div class="mb-3">
    <h1 class="h3 d-inline align-middle">Add New Pets -
        <?php echo $petowne[0]['first_name'].' '.$petowne[0]['last_name'] ; ?></h1>
</div>

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <form action="<?php echo base_url(); ?>/admin/pet/add_new" method="post">
                <input type="hidden" name="owner_id" value="<?php echo $petowne[0]['id'] ; ?>" />
                <div class="row">




                    <div class="col-sm-12">
                        <h4>Pets</h4>
                        <div id="rpMain">
                            <div class="row mb-3" id="rpWrapper">
                                <div class="col-sm-3 col-xs-12">
                                    <label>Name<span>*</span></label>
                                    <input type="text" class="form-control" name="name[]" placeholder="Pet Name">
                                </div>
                                <!--- form-group --->

                                <div class="col-sm-3 col-xs-12">
                                    <label>Breed<span>*</span></label>
                                    <input type="text" class="form-control" name="breed[]" placeholder="Breed">
                                </div>
                                <!--- form-group --->

                                <div class="col-sm-2 col-xs-12">
                                    <label>Age<span>*</span></label>
                                    <input type="text" class="form-control" name="age[]" placeholder="Age">
                                </div>
                                <!--- form-group --->

                                <div class="col-sm-2 col-xs-12">
                                    <label>Weight<span>*</span></label>
                                    <input type="text" class="form-control" name="weight[]" placeholder="Weight">
                                </div>
                                <!--- form-group --->

                                <div class="col-sm-2 col-xs-12" style="position:relative">
                                    <label>Gender<span>*</span></label>
                                    <select class="form-control" name="gender[]">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <span class="removeRP button_remove" style="display: none">Remove</span>
                                </div>
                                <!--- form-group --->

                            </div>
                            <!--- ===== row ====== ----->
                        </div>

                        <button type="button" class="btn btn-info " id="addRP">ADD MORE</button>

                        <div class="form-group mt-3" style="text-align:right">
                            <input type="submit" class="btn btn-primary" value="SAVE PET">
                        </div>

                    </div>
                    <!--- ====== col-sm-12 ==== ---->

                </div>


            </form>
        </div>
    </div>
</div>






<script>
$(document).ready(function() {
    $('#addRP').click(function() {
        var rp = $("#rpWrapper").clone().addClass('newClass');
        $('#rpMain').append(rp);
        console.log(rp);
    });

    $(document).on('click', '.removeRP', function() {
        $(this).parent().parent().remove();
    });
});
</script>