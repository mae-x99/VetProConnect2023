<style>
label {
    margin-bottom: 5px;
}

label>span {
    color: red;
}

.form-control {
    height: 45px;
    margin-bottom: 15px;
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

<?php
$pet = $pet[0]
?>

<div class="mb-3">
    <h1 class="h3 d-inline align-middle">Add New Pet</h1>
</div>

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('pet/update') ?>" method="post">

                <input type="hidden" value="<?= $pet['id'] ?>" name='id'>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <label>Name<span>*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="Pet Name"
                            value="<?= $pet['name'] ?>" required>
                    </div>
                    <!--- form-group --->

                    <div class="col-sm-12 col-xs-12">
                        <label>Breed<span>*</span></label>
                        <input type="text" class="form-control" name="breed" placeholder="Breed"
                            value="<?= $pet['breed'] ?>" required>
                    </div>
                    <!--- form-group --->

                    <div class="col-sm-12 col-xs-12">
                        <label>Age<span>*</span></label>
                        <input type="text" class="form-control" name="age" placeholder="Age" value="<?= $pet['age'] ?>"
                            required>
                    </div>
                    <!--- form-group --->

                    <div class="col-sm-12 col-xs-12">
                        <label>Weight<span>*</span></label>
                        <input type="text" class="form-control" name="weight" placeholder="Weight"
                            value="<?= $pet['weight'] ?>" required>
                    </div>
                    <!--- form-group --->

                    <div class="col-sm-12 col-xs-12">
                        <label>Gender<span>*</span></label>
                        <select class="form-control" name="gender" required>
                            <option value="Male" <?php if($pet['weight'] == 'Male'){ echo 'selected'; } ?>>Male</option>
                            <option value="Female" <?php if($pet['weight'] == 'Female'){ echo 'selected'; } ?>>Female
                            </option>
                        </select>
                    </div>
                    <!--- form-group --->




                    <div class="form-group mt-3" style="text-align:right">
                        <input type="submit" class="btn btn-primary" value="UPDATE PET">
                    </div>


                </div>


            </form>
        </div>
    </div>
</div>






<script>
$(document).ready(function() {
    $('#addRP').click(function() {
        var rp = $("#rpWrapper").clone();
        $('#rpMain').append(rp);
        console.log(rp);
    });

    $(document).on('click', '.removeRP', function() {
        $(this).parent().parent().remove();
    });
});
</script>