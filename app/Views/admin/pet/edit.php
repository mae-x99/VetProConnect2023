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
</style>

<?php $board =$board[0] ?>


<div class="mb-3">
	<h1 class="h3 d-inline align-middle">Update Pet Board</h1>
</div>

                        <div class="col-sm-12">
                            <div class="card">
								<div class="card-body">
								    <form action="<?= base_url('board/update'); ?>" method="post">
								        
								         
                                        
								        <div class="row">
								            <input type="hidden" name="id" value="<?= $board['id'] ?>" >
								            <div class="form-group col-sm-12 col-xs-12 mb-3">
								                <label>Select Patient<span>*</span></label>
								                <select class="form-control" name="p_id" required id="pateint">
								                    <option value=''>Select Patient</option>
								                    <?php foreach($pateints as $row){ ?>
								                    <option value='<?= $row['id'] ?>' <?php if($board['patient_id'] == $row['id']){ echo 'selected';} ?> ><?= $row['first_name'].' '.$row['last_name'] ?></option>
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
								                <label>Select Purpose<span>*</span></label>
								                <select class="form-control" name="purpose" required>
								                    <option value='Sickness' <?php if($board['status'] == 'Sickness'){ echo 'selected';} ?>>Sickness</option>
								                    <option value='Owner Vacation' <?php if($board['status'] == 'Owner Vacation'){ echo 'selected';} ?>>Owner Vacation</option>
								                </select>
								            </div><!--- ====== form-group ======= ---->
								            
								            <div class="form-group col-sm-12 col-xs-12 mb-3">
								                <label>Check IN<span>*</span></label>
								                <input type="date" class="form-control" value="<?= $board['check_in']; ?>" name="check_in" placeholder="Check IN" required>
								            </div><!--- ====== form-group ======= ---->
								            
								             <div class="form-group col-sm-12 col-xs-12 mb-3">
								                <label>Check out<span>*</span></label>
								                <input type="date" class="form-control" value="<?= $board['check_out']; ?>" name="check_out" placeholder="Check out" required>
								            </div><!--- ====== form-group ======= ---->
								            
								                
								                <div class="form-group mt-3" style="text-align:right">
								                    <input type="submit" class="btn btn-primary" value="UPDATE BOARD">
								                </div>
								                
								            
								        </div>
								        
								        
								    </form>
								</div>
							</div>
						</div>
						
						
						
						
						
						
						<script>
						    $(document).ready(function(){
						         var id = <?= $board['patient_id'] ?>;
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