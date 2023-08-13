<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">MAEXVET CLINIC</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header" style="font-size:18px;">
						Doctor
					</li>
				
					<li class="sidebar-item active" id="dashboard">
						<a class="sidebar-link" href="<?= base_url('dashboard'); ?>">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>
					



					<div class="divider"></div>
				


				







					<div class="divider"></div>
					<li class="sidebar-header dropBtn" data-id="invoice">
						<i class="align-middle awIcon" data-feather="edit"></i> <span style="font-size:14px;">Appointments</span><i class="align-middle" data-feather="chevron-down"></i>
					</li>
					<div class="awDrop" id="invoice">

					
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= site_url('doctor/today_appointment'); ?>">
			              <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Today's Appointments</span>
			            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= site_url('doctor/all_appointment'); ?>">
			              <i class="align-middle" data-feather="edit"></i> <span class="align-middle">All Appointments</span>
			            </a>
					</li>



					</div>
					
						<div class="divider"></div>

					<li class="sidebar-header dropBtn" data-id="account">
					<i class="align-middle awIcon" data-feather="download"></i>  <span style="font-size:14px;">Reports</span><i class="align-middle" data-feather="chevron-down"></i>
					</li>
					<div class="awDrop" id="account">
					<li class="sidebar-item drop">
						<a class="sidebar-link" href="<?= base_url('patient/reports/all'); ?>">
			              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Patient Reports</span>
			            </a>
					</li>
					<li class="sidebar-item drop">
						<a class="sidebar-link" href="<?= base_url('doctor/medicne/all'); ?>">
			              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Medication Reports</span>
			            </a>
					</li>
				
					</div>
                    
                    
                    	<div class="divider"></div>
					<li class="sidebar-header dropBtn" data-id="slots">
						<i class="align-middle awIcon" data-feather="clock"></i> <span style="font-size:14px;">Time Slots</span><i class="align-middle" data-feather="chevron-down"></i>
					</li>
					<div class="awDrop" id="slots">

					
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= site_url('slot/add'); ?>">
			              <i class="align-middle" data-feather="edit"></i> <span class="align-middle">All / Add Slot</span>
			            </a>
					</li>
					
			
					</div>

					<div class="divider"></div>
			

				</ul>

				<div class="sidebar-cta">
					
				</div>
			</div>
		</nav>

		<style>
		.dropBtn{
	    cursor: pointer;
	    padding: 1rem 1.5rem 1rem;position: relative;
		}
		.awDrop{display: none}
		.divider {
    width: calc(100% - 2rem);
    margin: auto;
    border-top: 1px solid #313c48;
}
.dropBtn:hover,.aw-active{
	background: linear-gradient(90deg,rgba(59,125,221,.1),rgba(59,125,221,.088) 50%,transparent);
	border-left:3px solid #3b7ddd;
}

 .dropBtn .feather{
    position: absolute;
    right: 20px;
}
.awIcon{position: relative !important;margin-left: 1.5rem}

		</style>

<script>
	$(document).ready(function(){
		$(".sidebar-item").on("click", function(){
			$(".sidebar-item").removeClass('active');
			$(this).addClass('active');

		});
	

		
		$(".dropBtn").click(function(){
			var id=$(this).data('id');
			$("#"+id).slideToggle();
		});

		$('.sidebar-item').click(function(){
			
			localStorage.ids=$(this).parent().attr('id');

		});

		if(localStorage.ids != 'undefined'){
			$('#'+localStorage.ids).show();
			$('li').removeClass('active');
			
			$('[data-id='+localStorage.ids+']').addClass('aw-active');}
			else{
				$('#dashboard').addClass('active');

			}


	});
</script>