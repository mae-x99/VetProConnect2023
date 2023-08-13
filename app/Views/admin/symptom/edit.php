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


<?php

$symptom = $symptom[0];

?>

<div class="mb-3">
	<h1 class="h3 d-inline align-middle">Update Symptom</h1>
</div>

                        <div class="col-sm-12">
                            <div class="card">
								<div class="card-body">
								    <form action="<?= base_url('symptom/update'); ?>" method="post">
								        
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
								            
								           <input type="hidden" value="<?php if($symptom['id']){ echo $symptom['id'];} ?>" name='id'>
								           
								           
								            <div class="form-group col-sm-12 col-xs-12 mb-3">
								                <label>symptom Name<span>*</span></label>
								                <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $symptom['name'] ?>" required>
								            </div><!--- ====== form-group ======= ---->
								            
								            
								                
								                <div class="form-group mt-3" style="text-align:right">
								                    <input type="submit" class="btn btn-primary" value="UPDATE SYMPTOM">
								                </div>
								                
								            
								        </div>
								        
								        
								    </form>
								</div>
							</div>
						</div>
						
						
						
						
						
						
						<script>
						    $(document).ready(function(){
						        $('#addRP').click(function(){
						           var rp = $("#rpWrapper").clone();
						           $('#rpMain').append(rp);
						            console.log(rp);
						        });
						        
						        $(document).on('click','.removeRP',function(){
						           $(this).parent().parent().remove(); 
						        });
						    });
						    
						</script>