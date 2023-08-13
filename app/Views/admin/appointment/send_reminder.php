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
    <h1 class="h3 d-inline align-middle">Appointment List - Send Reminder</h1>
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
                        <th>Doctor Name</th>
                        <th>Pet Owner Name</th>
                        <th>Pet Name</th>
                        <th>Date</th>
                        <th>Timeslot</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
										    $i=1;
										    foreach($appointments as $row){ ?>
                    <tr>

                        <td><?= $i++ ?></td>
                        <td><?= $row['doctor_name'] ?></td>
                        <td><?= $row['first_name'].' '.$row['last_name'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['date'] ?></td>
                        <td><button class="badge bg-primary light" style="padding:3px 10px"><?= $row['slot'] ?></button>
                        </td>

                        <td>
                            <button
                                class="badge <?php if($row['status'] == 'Pending'){ echo 'bg-info';}else{ echo 'bg-success';} ?> light"
                                style="padding:3px 10px"><?= $row['status'] ?></button>
                        </td>

                        <td>
                            <?php if($row['status'] == 'Complete'){ ?>

                            <?php } else { ?>
                            <a href="<?= base_url('appointment/send_reminder/appointment/'.$row['user_id'].'/'.$row['id']) ?>"
                                class="badge bg-info"> <i class="align-middle" data-feather="edit"></i> Send
                                Reminder</a>


                            <?php } ?>

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>






<script>
$(document).ready(function() {

});
</script>