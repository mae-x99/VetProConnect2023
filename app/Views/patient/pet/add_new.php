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



<div class="mb-3">
    <h1 class="h3 d-inline align-middle">Add New Pet</h1>
</div>

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('pet/store') ?>" method="post">


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
                    <input type="hidden" name="p_id" value="<?= $p_id; ?>">
                    <div class="col-sm-12 col-xs-12">
                        <label>Name<span>*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="Pet Name" required>
                    </div>
                    <!--- form-group --->

                    <div class="col-sm-12 col-xs-12">
                        <label>Breed<span>*</span></label>
                        <input type="text" class="form-control" name="breed" placeholder="Breed" required>
                    </div>
                    <!--- form-group --->

                    <div class="col-sm-12 col-xs-12">
                        <label>Age<span>*</span></label>
                        <input type="text" class="form-control" name="age" placeholder="Age" required>
                    </div>
                    <!--- form-group --->

                    <div class="col-sm-12 col-xs-12">
                        <label>Weight<span>*</span></label>
                        <input type="text" class="form-control" name="weight" placeholder="Weight" required>
                    </div>
                    <!--- form-group --->

                    <div class="col-sm-12 col-xs-12">
                        <label>Gender<span>*</span></label>
                        <select class="form-control" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <!--- form-group --->




                    <div class="form-group mt-3" style="text-align:right">
                        <input type="submit" class="btn btn-primary" value="ADD PET">
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