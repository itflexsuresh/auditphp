<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Invocie Details</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="j<?php echo base_url().'admin/dashboard'; ?>">Home</a></li>
				<li class="breadcrumb-item active">Invocie Details</li>
			</ol>
		</div>
	</div>
</div>
<?php echo $notification; ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				
				<form class="form" method="post">

					<h4 class="card-title">Invocie Details</h4>
					

						<!-- <div class="col-md-6">
						<div class="form-group ">
							<label for="name">Invoice Date</label>
							<input type="text" autocomplete="off" class="form-control" id="valid-from" name="validfrom" placeholder="Enter Date *" value="<?php echo $validfrom; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group ">
							<label for="name">Invoice number</label>
						</div>
					</div> -->
				
						<div class="row">
						<div class="col-md-12">							
							<table id="table" class="table table-bordered table-striped datatables fullwidth">
								<thead>
									<tr>
										<th>Description</th>
										<th>QTY</th>        
										<th>Rate</th>
										<th>Amount</th>										
									</tr>
								</thead>
								<tbody>
									<tr >    
										<td></td>
										<td></td>
										<td></td>
										<td></td>										
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-12" style="padding: 0; display: inline-block;">
						<div class="col-md-6" style="padding: 0; display: inline-block;"></div>
						<div class="col-md-6" style="display: inline-block;float: right;padding: 0">
						<table id="table1" style="width: 94% !important; float: right;" class="table table-bordered table-striped datatables fullwidth">
								<thead>
									<tr style="width: 10%">
										<th style="width: 216px">Sub Total</th>
										<th></th>
										<tr></tr>
										<th>VAT Total</th>
										<th></th>
										<tr></tr>
										<th>Total</th>
										<th></th>
									</tr>
								</thead>
								
							</table>
							</div>
					</div>
						

							<div class="row" style="float: right;">
						<div class="col-md-12">
							<button type="submit" style="float: right;" name="invoice" id="invoice" class="btn btn-block btn-primary btn-rounded">Submit Invoice</button>
						</div>
					</div>


						<h4 class="card-title" style="clear: both;">My Accounts</h4>
						<div class="row">
						<div class="col-md-12">							
							<table id="table2" class="table table-bordered table-striped datatables fullwidth">
								<thead>
									<tr>
										<th>Description</th>
										<th>Inv Number</th>        
										<th>Invocie Date</th>
										<th>Invoice Value</th>
										<th>Status</th>										
									</tr>
								</thead>
								<tbody>
									<tr >    
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>										
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					

					
				</form>

			</div>
		</div>
	</div>
</div>


<script type="text/javascript">

	$(document).ready(function() {
    $("#addarea").click(function() { 

        // var cty = $("#audit_city").val();
        // var srb = $("#audit_suburb").val();
        
        var val1 = $('input[id="audit_provin"]').val();
        var val2 = $('input[id="audit_city"]').val();
        var val3 = $('input[id="audit_suburb"]').val();

            if(val1 != '')
            {
                //('#table').append('<tr class="prov"><td>' + val1 + '</td></tr>');
                $('#table').append('<td class="ptty">' + val1 + '</td>');
                $('#table').append('<td class="cccty">' + val2 + '</td>');
                $('#table').append('<td class="qqty">' + val3 + '</td>');
            }
        


    });

    
});

	datepicker('#valid-from', ['currentdate'])		


	$(function(){
		// datepicker('.dob');

		// fileupload(["<?php echo base_url('ajax/index/ajaxfileupload'); ?>", ".document_file", "./assets/uploads/temp/"], ['.document', '.document_image', '<?php echo base_url()."assets/uploads/temp"; ?>']);

		fileupload(["<?php echo base_url('ajax/index/ajaxfileupload'); ?>", ".auditor_image", "./assets/uploads/auditor/<?php echo $userid; ?>/"], ['.auditor_picture', '.auditor_photo', '<?php echo base_url()."assets/uploads/auditor/".$userid; ?>']);
	
		fileupload(["<?php echo base_url('ajax/index/ajaxfileupload'); ?>", ".comp_emb", "./assets/uploads/auditor/<?php echo $userid; ?>/"], ['.comp_photo', '.comp_logo', '<?php echo base_url()."assets/uploads/auditor/".$userid; ?>']);
		

	validation(
			'.form',
			{
				name : {
					required	: true,
				},
				surname : {
					required	: true,
				},
				idnumber : {
					required	: true,
				},
				email : {
					required	: true,
				},
				pass : {
					required	: true,
				},
				phonework : {
					required	: true,
				},
				phonemobile : {
					required	: true,
				},
				billingname : {
					required	: true,
				},
				regnumber : {
					required	: true,
				},
				vat : {
					required	: true,
				},
				billingaddress : {
					required	: true,
				},
				postalcode : {
					required	: true,
				},
				bankname : {
					required	: true,
				},
				accountname : {
					required	: true,
				},
				branchcode : {
					required	: true,	
				},
				accountnumber : {
					required	: true,	
				},
				accounttype : {
					required	: true,	
				}			

			},

			{
				name 	: {
					required	: "Please enter the firstname."
				},
				surname 	: {
					required	: "Please enter the surname."
				},				
				idnumber : {
					required	: "Please enter the ID"
				},
				email : {
					required	: "Please enter the email"
				},
				pass : {
					required	: "Please enter the password"
				},
				phonework : {
					required	: "Please enter the work phone"
				},
				phonemobile : {
					required	: "Please enter the mobile phone"
				},
				billingname : {
					required	: "Please enter the billing name"
				},
				regnumber : {
					required	: "Please enter the register number"
				},
				vat : {
					required	: "Please enter the VAT"
				},
				billingaddress : {
					required	: "Please enter the billing address"
				},
				postalcode : {
					required	: "Please enter the postal code"
				},
				bankname : {
					required	: "Please enter the bank name"
				},				
				accountname : {
					required	: "Please enter the account name"
				},
				branchcode : {
					required	: "Please enter the branch code"	
				},
				accountnumber : {
					required	: "Please enter the account number"	
				},
				accounttype : {
					required	: "Please enter the account type"	
				}
			}
		);
	});
</script>