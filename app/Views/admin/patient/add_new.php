<style>
label {
    margin-bottom: 5px;
}

label>span {
    color: red;
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

/* The message box is shown when the user clicks on the password field */
#message {
    display: none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
}

#message p {
    padding: 2px 35px;
    font-size: 18px;
    margin-bottom: 0px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
    color: green;
}

.valid:before {
    position: relative;
    left: -35px;
    content: "\2713";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
    color: red;
}

.invalid:before {
    position: relative;
    left: -35px;
    content: "X";
}
</style>



<div class="mb-3">
    <h1 class="h3 d-inline align-middle">Add New Pet Owner</h1>
</div>

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">


            <?php if(isset($error)){ ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> <?php echo $error; ?>
            </div>
            <?php } ?>
            <?php if(session()->getFlashdata('success')){ ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo session()->getFlashdata('success'); ?>
            </div>
            <?php } ?>



            <form action="<?= base_url('admin/store/user'); ?>" method="post">

                <div class="row">
                    <input type="hidden" name="type" value="patient">
                    <div class="form-group col-sm-6 col-xs-12 mb-3">
                        <label>First Name<span>*</span></label>
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                    </div>
                    <!--- ====== form-group ======= ---->


                    <div class="form-group col-sm-6 col-xs-12 mb-3">
                        <label>Last Name<span>*</span></label>
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                    </div>
                    <!--- ====== form-group ======= ---->

                    <div class="form-group col-sm-4 col-xs-12 mb-3">
                        <label>Phone<span>*</span></label>
                        <input type="tel" class="form-control" name="phone" placeholder="Phone" required>
                    </div>
                    <!--- ====== form-group ======= ---->

                    <div class="form-group col-sm-4 col-xs-12 mb-3">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" placeholder="City">
                    </div>
                    <!--- ====== form-group ======= ---->

                    <div class="form-group col-sm-4 col-xs-12 mb-3">
                        <label>Zipcode</label>
                        <input type="number" class="form-control" name="zipcode" placeholder="Zipcode">
                    </div>
                    <!--- ====== form-group ======= ---->



                    <div class="form-group col-sm-6 col-xs-12 mb-3">
                        <label>Email<span>*</span></label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <!--- ====== form-group ======= ---->

                    <div class="form-group col-sm-6 col-xs-12 mb-3">
                        <label>Password<span>*</span></label>
                        <input type="password" id="psw" placeholder="Password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required name="password" class="form-control">
                        <div id="message">
                            <h3>Password must contain the following:</h3>
                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                            <p id="number" class="invalid">A <b>number</b></p>
                            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                        </div>
                    </div>
                    <!--- ====== form-group ======= ---->


                    <div class="form-group col-sm-12 col-xs-12 mb-3">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address">
                    </div>
                    <!--- ====== form-group ======= ---->

                    <div class="form-group mt-3" style="text-align:right">
                        <input type="submit" name="submit" class="btn btn-primary" value="SAVE PET OWNER">
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

<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
}
</script>