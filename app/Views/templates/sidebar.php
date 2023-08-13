<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="">
          <span class="align-middle">MAEXVET CLINIC</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header" style="font-size:18px;">
						Admin
					</li>
				
					<li class="sidebar-item active" id="dashboard">
						<a class="sidebar-link" href="<?= base_url('dashboard'); ?>">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
            </a>
					</li>
					



					<div class="divider"></div>
					<li class="sidebar-header dropBtn" data-id="products">
						<i class="align-middle awIcon" data-feather="user"></i> <span style="font-size:14px;">Doctors</span><i class="align-middle" data-feather="chevron-down"></i>
					</li>
					<div class="awDrop" id="products">
				
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= site_url('doctor/add'); ?>">
			              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Add Doctors</span>
			            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= site_url('doctor/all'); ?>">
			              <i class="align-middle" data-feather="user"></i> <span class="align-middle">All Doctors</span>
			            </a>
					</li>
					


					</div>
					<div class="divider"></div>
					<li class="sidebar-header dropBtn" data-id="purchases">
						<i class="align-middle awIcon" data-feather="user"></i> <span style="font-size:14px;">Pet Owners</span><i class="align-middle" data-feather="chevron-down"></i>
					</li>
					<div class="awDrop" id="purchases">
	                <li class="sidebar-item">
						<a class="sidebar-link" href="<?= site_url('admin/pateint/add'); ?>">
			              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Add Pet Owners</span>
			            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= site_url('admin/patient/all'); ?>">
			              <i class="align-middle" data-feather="user"></i> <span class="align-middle">All Pet Owners</span>
			            </a>
					</li>



					</div>
					
					
					<!--	<div class="divider"></div>-->
					<!--<li class="sidebar-header dropBtn" data-id="pets">-->
					<!--	<i class="align-middle awIcon" data-feather="edit"></i> Pets<i class="align-middle" data-feather="chevron-down"></i>-->
					<!--</li>-->
					<!--<div class="awDrop" id="pets">-->
	    <!--            <li class="sidebar-item">-->
					<!--	<a class="sidebar-link" href="<?= site_url('admin/pateint/add'); ?>">-->
			  <!--            <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Add Pet</span>-->
			  <!--          </a>-->
					<!--</li>-->
					<!--<li class="sidebar-item">-->
					<!--	<a class="sidebar-link" href="<?= site_url('admin/patient/all'); ?>">-->
			  <!--            <i class="align-middle" data-feather="edit"></i> <span class="align-middle">All Pet</span>-->
			  <!--          </a>-->
					<!--</li>-->



					<!--</div>-->








					<div class="divider"></div>
					<li class="sidebar-header dropBtn" data-id="invoice">
						<i class="align-middle awIcon" data-feather="edit"></i> <span style="font-size:14px;">Appointments</span><i class="align-middle" data-feather="chevron-down"></i>
					</li>
					<div class="awDrop" id="invoice">

					
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= site_url('appointment/add'); ?>">
			              <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Add Appointment</span>
			            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= site_url('appointment/all'); ?>">
			              <i class="align-middle" data-feather="edit"></i> <span class="align-middle">All Appointments</span>
			            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= site_url('appointment/send_reminder'); ?>">
			              <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Send Reminder</span>
			            </a>
					</li>



					</div>

					<div class="divider"></div>
					<li class="sidebar-header dropBtn" data-id="expenses">
						<i class="align-middle awIcon" data-feather="trending-up"></i> <span style="font-size:14px;">Services</span><i class="align-middle" data-feather="chevron-down"></i>
					</li>
					<div class="awDrop" id="expenses">

					
				
					<div class="divider"></div>
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= site_url('service/add'); ?>">
			              <i class="align-middle" data-feather="bar-chart"></i> <span class="align-middle">Add New Service</span>
			            </a>
					</li>
						<li class="sidebar-item">
						<a class="sidebar-link" href="<?= site_url('service/all'); ?>">
			              <i class="align-middle" data-feather="bar-chart"></i> <span class="align-middle">All Services</span>
			            </a>
					</li>
					</div>

					<div class="divider"></div>

					<li class="sidebar-header dropBtn" data-id="client">
					<i class="align-middle awIcon" data-feather="plus"></i> <span style="font-size:14px;">Medications</span> <i class="align-middle" data-feather="chevron-down"></i>
					</li>

					<div class="awDrop" id="client">

					<li class="sidebar-item drop ">
						<a class="sidebar-link" href="<?= site_url('medicne/add'); ?>">
			              <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Add New Medications</span>
			            </a>
					</li>

					<li class="sidebar-item drop ">
						<a class="sidebar-link" href="<?= site_url('medicne/all'); ?>">
			              <i class="align-middle" data-feather="plus"></i> <span class="align-middle">All Medications</span>
			            </a>
					</li>
					
					</div>
					
					<div class="divider"></div>

					<li class="sidebar-header dropBtn" data-id="symptom">
					<i class="align-middle awIcon" data-feather="plus"></i> <span style="font-size:14px;">Symptom</span> <i class="align-middle" data-feather="chevron-down"></i>
					</li>

					<div class="awDrop" id="symptom">

					<li class="sidebar-item drop ">
						<a class="sidebar-link" href="<?= site_url('symptom/add'); ?>">
			              <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Add New Symptom</span>
			            </a>
					</li>

					<li class="sidebar-item drop ">
						<a class="sidebar-link" href="<?= site_url('symptom/all'); ?>">
			              <i class="align-middle" data-feather="plus"></i> <span class="align-middle">All Symptom</span>
			            </a>
					</li>
					
					</div>
					
					<div class="divider"></div>
					<li class="sidebar-header dropBtn" data-id="report">
					<i class="align-middle awIcon" data-feather="list"></i> <span style="font-size:14px;">Pet Boarding</span><i class="align-middle" data-feather="chevron-down"></i>
					</li>
					<div id="report" class="awDrop">
					<li class="sidebar-item drop">
						<a class="sidebar-link" href="<?= site_url('board/add'); ?>">
			              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Add New</span>
			            </a>
					</li>
					<li class="sidebar-item drop">
						<a class="sidebar-link" href="<?= site_url('board/all'); ?>">
			              <i class="align-middle" data-feather="file"></i> <span class="align-middle">All Pet Boarded</span>
			            </a>
					</li>
					
					</div>

					<div class="divider"></div>

					<li class="sidebar-header dropBtn" data-id="account">
					<i class="align-middle awIcon" data-feather="download"></i> <span style="font-size:14px;">Billing</span><i class="align-middle" data-feather="chevron-down"></i>
					</li>
					<div class="awDrop" id="account">
					<li class="sidebar-item drop">
						<a class="sidebar-link" href="<?= base_url('invoice/add'); ?>">
			              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Add New</span>
			            </a>
					</li>
					<li class="sidebar-item drop">
						<a class="sidebar-link" href="<?= base_url('invoice/all'); ?>">
			              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">View All</span>
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