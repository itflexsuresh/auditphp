<?php
	if(isset($result) && $result){
		$id 			= $result['id'];
		$name 			= (set_value('name')) ? set_value('name') : $result['name'];
		$status 		= (set_value('status')) ? set_value('status') : $result['status'];
	
		$heading		= 'Update';
	}else{
		$id 			= '';
		$name			= set_value('name');
		$status			= set_value('status');
		
		$heading		= 'Add';
	}
?>

<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Admin System Users</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="j<?php echo base_url().'admin/dashboard'; ?>">Home</a></li>
				<li class="breadcrumb-item active">Admin System Users</li>
			</ol>
		</div>
	</div>
</div>
<?php echo $notification; ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Admin System Users</h4>
				<div class="table-responsive m-t-40">
					<table class="table table-bordered table-striped datatables fullwidth">
						<thead>
							<tr>
								<th>Name</th>
								<th>Surname</th>
								<th>Role</th>
								<th>Email Address</th>
								<th>Pin</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>
		
<script>
	$(function(){
		
		var options = {
			url 	: 	'<?php echo base_url()."admin/systemsetup/systemusers/systemusers/DTSystemusersList"; ?>',
			columns : 	[
							{ "data": "u_name" },
							{ "data": "u_surname" },
							{ "data": "u_type" },
							{ "data": "u_email" },
							{ "data": "u_password_raw" },							
							{ "data": "action" }
						]
		};
		
		ajaxdatatables('.datatables', options);
		
		validation(
			'.form',
			{
				name : {
					required	: true,
				}
			},
			{
				name 	: {
					required	: "Installation Type field is required."
				}
			}
		);
		
	});
	
	// Delete
	
	$(document).on('click', '.delete', function(){
		var action 	= 	'<?php echo base_url().'admin/administration/installationtype'; ?>';
		var data	= 	'\
							<input type="hidden" value="'+$(this).attr('data-id')+'" name="id">\
							<input type="hidden" value="2" name="status">\
						';
						
		sweetalert(action, data);
	})
</script>
