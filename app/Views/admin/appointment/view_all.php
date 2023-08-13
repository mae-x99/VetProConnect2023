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
    <h1 class="h3 d-inline align-middle">Appointment List</h1>
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
                            <a href="<?= base_url('patient/report/print'); ?>/<?= $row['id'] ?>"
                                class="badge bg-primary"> <i class="align-middle" data-feather="printer"></i> View
                                Report</a>
                            <?php } else { ?>
                            <a href="<?= base_url('appointment/edit/'.$row['id']) ?>" class="badge bg-info"> <i
                                    class="align-middle" data-feather="edit"></i> Edit</a>


                            <?php } ?>
                            <a href="javascript:void(0)" data-ids="<?= base_url('appointment/delete/'.$row['id']); ?>"
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






<script>
$(document).ready(function() {

});
</script>
<script>
$(document).ready(function() {

});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
</script>