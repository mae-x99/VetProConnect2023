<style>
.badge {
    border: none;
}
</style>



<div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 d-inline align-middle">Pet List -
                <?php echo $petowne[0]['first_name'].' '.$petowne[0]['last_name'] ; ?>
                <a style="padding: 10px; margin-left: 8px;"
                    href="<?php echo base_url() ; ?>/admin/pet/add/<?php echo $petowne[0]['id'] ; ?>"
                    class="badge bg-info">Add Pet</a>
            </h1>

        </div>
    </div>

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
                        <th>Name</th>
                        <th>Breed</th>
                        <th>Age</th>
                        <th>Weight</th>
                        <th>Gender</th>
                        <!--<th>Action</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php 
										    $i = 1;
										    foreach($pets as $pet){ ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?php echo $pet['name'] ; ?></td>
                        <td><?php echo $pet['breed'] ; ?></td>
                        <td><?php echo $pet['age'] ; ?></td>
                        <td><?php echo $pet['weight'] ; ?></td>
                        <td><?php echo $pet['gender'] ; ?></td>

                        <!--<td>
										        <button class="badge bg-info edit"> <i class="align-middle" data-feather="edit"></i> Edit</button>
										        <button class="badge bg-danger delete"> <i class="align-middle" data-feather="trash"></i> Delete</button>
										    </td>-->
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