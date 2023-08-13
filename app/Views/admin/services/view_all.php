<style>
  .badge{border:none;}
  .alert.alert-danger {
                background: #ff1a6c57;
                color: #fff;
                padding: 5px 10px;
                border: 1px solid #ff1a6c33;
                border-radius: 5px;
                margin-bottom: 20px;
            }
            .alert-success{
                background:#48d79b94;
                 color: #fff;
                padding: 5px 10px;
                border: 1px solid #48d79b94;
                border-radius: 5px;
                margin-bottom: 20px;
            }
</style>



<div class="mb-3">
	<h1 class="h3 d-inline align-middle">Service List</h1>
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
												<th>Service Name</th>
												<th>Price</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										    <?php 
										    $i=1;
										    foreach($services as $row){ ?>
										    <tr>
										    <td><?= $i++ ?></td>
										    <td><?= $row['name'] ?></td>
										    <td><?= $row['price'] ?></td>
										    <td>
										        <?php if($row['status'] == 1){ ?>
										        <button  class="badge bg-success" >Active</button>
										        <?php } else { ?>
										        <button  class="badge bg-danger" >Inctive</button>
										        <?php } ?>
										    </td>
										    
										    <td>
										        <a href="<?= base_url('service/edit') ?>/<?= $row['id'] ?>" class="badge bg-info edit"> <i class="align-middle" data-feather="edit"></i> Edit</a>
										        <a href="javascript:void(0)" data-ids="<?= base_url('service/delete/'.$row['id']); ?>" class="badge bg-danger delete_record"> <i class="align-middle" data-feather="trash"></i> Delete</a>
										    </td>
										    </tr>
										    <?php } ?>
										</tbody>
									</table>
									
								</div>
							</div>
						</div>
						
						
						
						
						
						
						<script>
						    $(document).ready(function(){
						      
						    });
						    
						</script>
						<script>
						    $(document).ready(function(){
						      
						    });
						    
						</script>
						<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>						
						<script type="text/javascript">
							$('.delete_record').click(function(){
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