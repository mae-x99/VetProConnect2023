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

<?php

$service = $service[0];

?>


<div class="mb-3">
	<h1 class="h3 d-inline align-middle">Edit Service</h1>
</div>

                        <div class="col-sm-12">
                            <div class="card">
								<div class="card-body">
								    <form action="<?= base_url('service/update'); ?>" method="post">
								        
								     
                                        
                                        
								        <div class="row">
								            
								           <input type="hidden" value="<?php if($service['id']){ echo $service['id'];} ?>" name='id'>
								            
								            <div class="form-group col-sm-12 col-xs-12 mb-3">
								                <label>Service Name<span>*</span></label>
								                <input type="text" class="form-control" value="<?php if($service['name']){ echo $service['name'];} ?>" name="name" placeholder="Service Name" required>
								            </div><!--- ====== form-group ======= ---->
								            
								            
								            
								            <div class="form-group col-sm-12 col-xs-12 mb-3">
								                <label>Price<span>*</span></label>
								                <input type="number" class="form-control" value="<?php if($service['price']){ echo $service['price'];} ?>" name="price" placeholder="Price" required>
								            </div><!--- ====== form-group ======= ---->
								            
								            <div class="form-group col-sm-12 col-xs-12 mb-3">
								                <label>Status<span>*</span></label>
								                <select name="status" class="form-control">
								                    <option value="1" <?php if($service['status'] == 1){ echo 'selected';} ?>>Active</option>
								                    <option value="0" <?php if($service['status'] == 0){ echo 'selected';} ?>>Inactive</option>
								                </select>
								            </div><!--- ====== form-group ======= ---->
								            
								                <div class="form-group mt-3" style="text-align:right">
								                    <input type="submit" class="btn btn-primary"  value="UPDATE SERVICE">
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