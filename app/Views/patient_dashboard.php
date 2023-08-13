<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-xs-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Pet</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3"><?= $pets ?></h1>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


</div>

<div class="row" style="display:none">
    <div class="col-12 col-md-6 col-xxl-8 d-flex order-2 order-xxl-3">
        <div class="card flex-fill w-100">
            <div class="card-header">

                <h5 class="card-title mb-0">Monthly Sales</h5>
            </div>
            <div class="card-body d-flex w-100">
                <div class="align-self-center chart chart-lg">
                    <canvas id="chartjs-dashboard-bar"></canvas>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-6 col-xxl-4 d-flex order-1 order-xxl-1">
        <div class="card flex-fill">
            <div class="card-header">

                <h5 class="card-title mb-0">Calendar</h5>
            </div>
            <div class="card-body d-flex">
                <div class="align-self-center w-100">
                    <div class="chart">
                        <div id="datetimepicker-dashboard"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
.today {
    background: #3b7ddd !important;
    color: #fff !important;
}

.selected {
    background: transparent !important;
    color: #393939 !important;
    border: none !important;
}
</style>


<?php if($_SESSION['user_type'] != 'admin' && $_SESSION['phone'] == ''){ ?>
<!-- Modal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
$(document).ready(function() {
    Swal.fire({
        icon: 'error',
        html: 'Please Update your Phone Number',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = '<?php echo base_url() ; ?>/admin/profile'
        }
    });
})
</script>
<?php } ?>