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
    
    $user =$users[0];
?>



<div class="mb-3">
    <h1 class="h3 d-inline align-middle">Update Personal Information</h1>
</div>

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">

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


            <form action="<?= base_url('update/profile'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                <div class="row">
                    <div class="form-group col-sm-6 col-xs-12 mb-3">
                        <input type="file" class="" name="file">
                    </div>
                    <div class="form-group col-sm-6 col-xs-12 mb-3">
                        <img src="<?php if($user['profile_pic']){ echo base_url().'/uploads/'.$user['profile_pic'];}else{ echo base_url().'/public/img/avatars/avatar.jpg';} ?>"
                            class="img-fluid" width="100">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 col-xs-12 mb-3">
                        <label>First Name<span>*</span></label>
                        <input type="text" class="form-control" name="first_name"
                            value="<?php if($user['first_name']){ echo $user['first_name'];} ?>"
                            placeholder="First Name" required>
                    </div>
                    <!--- ====== form-group ======= ---->


                    <div class="form-group col-sm-6 col-xs-12 mb-3">
                        <label>Last Name<span>*</span></label>
                        <input type="text" class="form-control" name="last_name"
                            value="<?php if($user['last_name']){ echo $user['last_name'];} ?>" placeholder="Last Name"
                            required>
                    </div>
                    <!--- ====== form-group ======= ---->



                    <div class="form-group col-sm-6 col-xs-12 mb-3">
                        <label>Email<span>*</span></label>
                        <input type="email" class="form-control" name="email"
                            value="<?php if($user['email']){ echo $user['email'];} ?>" placeholder="Email" required>
                    </div>
                    <!--- ====== form-group ======= ---->

                    <div class="form-group col-sm-6 col-xs-12 mb-3">
                        <label>Phone<span>*</span></label>
                        <input type="tel" class="form-control" name="phone"
                            value="<?php if($user['phone']){ echo $user['phone'];} ?>" placeholder="phone" required>
                    </div>
                    <!--- ====== form-group ======= ---->


                    <div class="form-group col-sm-6 col-xs-12 mb-3">
                        <label>City</label>
                        <input type="text" class="form-control" name="city"
                            value="<?php if($user['city']){ echo $user['city'];} ?>" placeholder="City">
                    </div>
                    <!--- ====== form-group ======= ---->

                    <div class="form-group col-sm-6 col-xs-12 mb-3">
                        <label>Zipcode</label>
                        <input type="number" class="form-control" name="zipcode"
                            value="<?php if($user['zipcode']){ echo $user['zipcode'];} ?>" placeholder="Zipcode">
                    </div>
                    <!--- ====== form-group ======= ---->

                    <div class="form-group col-sm-12 col-xs-12 mb-3">
                        <label>Address</label>
                        <textarea class="form-control" rows='5' name="address"
                            placeholder="Address"><?php if($user['address']){ echo $user['address'];} ?></textarea>
                    </div>
                    <!--- ====== form-group ======= ---->


                    <div class="form-group mt-3" style="text-align:right">
                        <input type="submit" class="btn btn-primary" name='aw_update' value="UPDATE">
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