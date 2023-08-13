<style>
.badge {
    border: none;
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
    <h1 class="h3 d-inline align-middle">Today's Appointments</h1>
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



            <table class="table table-bordered table-hover" id="mytable">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Date</th>
                        <th>Owner Name</th>
                        <th>Pet Name</th>
                        <th>Timeslot</th>
                        <th>Status</th>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
										    $i=1;
										    foreach($appointments as $row){
										    if($row['status'] != 'Complete' && $row['date'] == date('Y-m-d')){
										    ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['date'] ?></td>
                        <td><?= $row['first_name'].' '.$row['last_name'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><button class="badge bg-primary light" style="padding:3px 10px"><?= $row['slot'] ?></button>
                        </td>

                        <td>
                            <button
                                class="badge <?php if($row['status'] == 'Pending'){ echo 'bg-warning';}else{ echo 'bg-success';} ?> light"
                                style="padding:3px 10px"><?= $row['status'] ?></button>
                        </td>

                        <td>
                            <?php if($row['status'] == 'Pending'){ ?>
                            <a href="<?= base_url('doctor/start_appointment/'.$row['id']) ?>" class="badge bg-info"> <i
                                    class="align-middle" data-feather="edit"></i> Start Appointment</a>
                            <?php } if($row['status'] == 'Processing'){ ?>
                            <a href="<?= base_url('doctor/edit_appointment/'.$row['id']) ?>" class="badge bg-info"> <i
                                    class="align-middle" data-feather="edit"></i> Continue Appointment</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>






<script>
$(document).ready(function() {

});
</script>