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
    <h1 class="h3 d-inline align-middle">Patient Reports</h1>
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
                        <th>Owner Name</th>
                        <th>Pet Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
										    $i = 1;
										    foreach($reports as $row){ ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['first_name'].' '.$row['last_name']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['status']; ?></td>
                        <td>
                            <?php if($row['status'] == 'Complete'){ ?>
                            <a href="<?= base_url('patient/report/print'); ?>/<?= $row['appointment_id'] ?>"
                                target="_blank" class="badge bg-primary"> <i class="align-middle"
                                    data-feather="printer"></i> Print Report</a>
                            <?php } else { ?>
                            <a href="<?= base_url('patient/report/edit'); ?>/<?= $row['id'] ?>" class="badge bg-info">
                                <i class="align-middle" data-feather="edit"></i> Edit</a>
                            <a href="<?= base_url('patient/report/delete'); ?>/<?= $row['id'] ?>"
                                class="badge bg-danger"> <i class="align-middle" data-feather="trash"></i> Delete</a>
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