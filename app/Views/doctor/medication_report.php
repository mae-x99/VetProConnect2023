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
    <h1 class="h3 d-inline align-middle">Medication List</h1>
</div>

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover" id="mytable">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Medication Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
										    $i=1;
										    foreach($medicines as $row){ ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['quantity']; ?></td>
                        <td><?= $row['price']; ?></td>
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