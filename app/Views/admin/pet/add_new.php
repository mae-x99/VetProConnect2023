<style>
    label{margin-bottom:5px;}
    label>span{
        color:red;
    }
    textarea.form-control{
        height:150px;
    }
    .form-control{
        height:45px;
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
    cursor:pointer;
}
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
	<h1 class="h3 d-inline align-middle">Add New Pet To Board</h1>
</div>

                        <div class="col-sm-12">
                            <div class="card">
								<div class="card-body">
								    <form action="<?= base_url('board/store'); ?>" method="post">
								        
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
                                        
                                        
								        <div class="row">
								            
								            <div class="form-group col-sm-12 col-xs-12 mb-3">
								                <label>Select Pet Owner<span>*</span></label>
								                <select class="form-control" name="p_id" required id="pateint">
								                    <option value=''>Select Patient</option>
								                    <?php foreach($pateints as $row){ ?>
								                    <option value='<?= $row['id'] ?>'><?= $row['first_name'].' '.$row['last_name'] ?></option>
								                    <?php } ?>
								                </select>
								            </div><!--- ====== form-group ======= ---->
								            
								            <div class="form-group col-sm-12 col-xs-12 mb-3">
								                <label>Select Pet<span>*</span></label>
								                <select class="form-control" name="pet_id" required id="petWrap">
								                    <option value=''>Select Pet</option>
								                </select>
								            </div><!--- ====== form-group ======= ---->
								            
								             <div class="form-group col-sm-12 col-xs-12 mb-3">
								                <label>Select Reason<span>*</span></label>
								                <select class="form-control" name="purpose" required>
								                    <option value='Sickness'>Sickness</option>
								                    <option value='Owner Vacation'>Owner Vacation</option>
								                </select>
								            </div><!--- ====== form-group ======= ---->
								            
								            <div class="form-group col-sm-12 col-xs-12 mb-3">
								                <label>Check In<span>*</span></label>
								                <input type="date" class="form-control" name="check_in" placeholder="Check IN" required>
								            </div><!--- ====== form-group ======= ---->
								            
								             <div class="form-group col-sm-12 col-xs-12 mb-3">
								                <label>Check Out<span>*</span></label>
								                <input type="date" class="form-control" name="check_out" placeholder="Check out" required>
								            </div><!--- ====== form-group ======= ---->
								            
								                
								                <div class="form-group mt-3" style="text-align:right">
								                    <input type="submit" class="btn btn-primary" value="ADD BOARD">
								                </div>
								                
								            
								        </div>
								        
								        
								    </form>
								</div>
							</div>
						</div>
						
						
						
						
						
						
						<script>
						    $(document).ready(function(){
						       $('#pateint').on('change',function(){
						          var id = $(this).val();
						          if(id != ''){
						          $.ajax({
		                            	type: "POST",
                                        url: "<?= base_url('board/getPet'); ?>",
                                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                                        data:{ id:id },
                                			success: function(data) {
                                				console.log(data);
                                				$('#petWrap').html(data);
                                				}
                                    });
						          }
						       });
						          
						    });
						    
						</script>