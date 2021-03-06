<?php
// print_r($cpdstream);die;
if(isset($result) && $result){
	$details_id 				= $result['id'];
	$address_id 				= $result['id'];
	$cpd_id 					= $result['id'];

	$addresses 					= explode('@@@', $result['address']);
	$cpd 						= explode('@@@', $result['cpd']);

	foreach($addresses as $address){
		$address 						= explode('@-@', $address);
		$addresstype    				= (isset($address[6])) ?  $address[6] : '';

		if($addresstype!=''){
			$addressid    			= (isset($addresstype[0])) ?  $addresstype[0] : '';
			$addressname    		= (isset($addresstype[1])) ?  $addresstype[1] : '';
			$addresssuburb    		= (isset($addresstype[2])) ?  $addresstype[2] : '';
			$addresscity    		= (isset($addresstype[3])) ?  $addresstype[3] : '';
			$addressprovince    	= (isset($addresstype[4])) ?  $addresstype[4] : '';
			$addressprostal    		= (isset($addresstype[5])) ?  $addresstype[5] : '';
		}
	}

	if(isset($address[1])){
		$address1 					= explode('@-@', $address[1]);
		$physicaladdress    		= (isset($address1[1])) ?  $address1[1] : '';
		$physicaladdress1    		= (isset($address1[2])) ?  $address1[2] : '';
		$physicaladdress2    		= (isset($address1[3])) ?  $address1[3] : '';
		$physicaladdress3    		= (isset($address1[4])) ?  $address1[4] : '';
		$physicaladdress4    		= (isset($address1[5])) ?  $address1[5] : '';
		$physicaladdress4    		= (isset($address1[6])) ?  $address1[6] : '';
	}
	if(isset($address[2])){
		$address2 					= explode('@-@', $address[2]);
		$postaladdress    		= (isset($address2[1])) ?  $address2[1] : '';
		$postaladdress1   		= (isset($address2[2])) ?  $address2[2] : '';
		$postaladdress2   		= (isset($address2[3])) ?  $address2[3] : '';
		$postaladdress3  		= (isset($address2[4])) ?  $address2[4] : '';
		$postaladdress4    		= (isset($address2[5])) ?  $address2[5] : '';
		$postaladdress5   		= (isset($address2[6])) ?  $address2[6] : '';
	}
	
	// $physical_province 			= (set_value('physical_province')) ? set_value('physical_province') : $result['physical_province'];
	// $postal_province 			= (set_value('postal_province')) ? set_value('postal_province') : $result['postal_province'];
	$company_name 				= (set_value('company_name')) ? set_value('company_name') : $result['company_name'];
	$reg_no 					= (set_value('reg_no')) ? set_value('reg_no') : $result['reg_no'];
	$vat_no 					= (set_value('vat_no')) ? set_value('vat_no') : $result['vat_no'];
	//$vat_no 					= (set_value('workphone')) ? set_value('workphone') : $result['workphone'];
	$system_email 				= (set_value('system_email')) ? set_value('email') : $result['email'];
	$bank_name 					= (set_value('bank_name')) ? set_value('bank_name') : $result['bank_name'];
	$branch_code 				= (set_value('branch_code')) ? set_value('branch_code') : $result['branch_code'];
	$account_name 				= (set_value('account_name')) ? set_value('account_name') : $result['account_name'];
	$account_no 				= (set_value('account_no')) ? set_value('account_no') : $result['account_no'];
	$account_type 				= (set_value('account_type')) ? set_value('account_type') : $result['account_type'];
	$vat_percentage 			= (set_value('vat_percentage')) ? set_value('vat_percentage') : $result['vat_percentage'];
	$vat_percentage 			= (set_value('vat_percentage')) ? set_value('vat_percentage') : $result['vat_percentage'];
	$email 						= (set_value('email')) ? set_value('email') : $result['email'];
	$work_phone 				= (set_value('work_phone')) ? set_value('work_phone') : $result['work_phone'];
	$plumber_certificate 		= (set_value('plumber_certificate')) ? set_value('plumber_certificate') : $result['plumber_certificate'];
	$reseller_certificate 		= (set_value('reseller_certificate')) ? set_value('reseller_certificate') : $result['reseller_certificate'];
	$refix_period 				= (set_value('refix_period')) ? set_value('refix_period') : $result['refix_period'];
	$audit_percentage 			= (set_value('audit_percentage')) ? set_value('audit_percentage') : $result['audit_percentage'];
	$penalty 					= (set_value('penalty')) ? set_value('penalty') : $result['penalty'];
	$expired 					= (set_value('expired')) ? set_value('expired') : $result['expired'];

	
	
	$heading					= 'Update';
}else{
	$details_id 				= '';
	$address_id 				= '';
	$cpd_id 					= '';

	$company_name				= set_value('company_name');
	$reg_no						= set_value('reg_no');
	$vat_no						= set_value('vat_no');
	$workphone					= set_value('workphone');
	$system_email				= set_value('system_email');
	$bank_name					= set_value('bank_name');
	$branch_code				= set_value('branch_code');
	$account_name				= set_value('account_name');
	$account_no					= set_value('account_no');
	$account_type				= set_value('account_type');
	$vat_percentage				= set_value('vat_percentage');
	$email						= set_value('email');
	$work_phone					= set_value('work_phone');
	$plumber_certificate		= set_value('plumber_certificate');
	$reseller_certificate		= set_value('reseller_certificate');
	$refix_period				= set_value('refix_period');
	$audit_percentage			= set_value('audit_percentage');
	$penalty					= set_value('penalty');
	$expired					= set_value('expired');

	$physical_province			= set_value('physical_province');
	$postal_province			= set_value('postal_province');
	

	$heading					= 'Add';
}
?>
<style type="text/css">
	.cpd_body input[type="number"] {
		width: 105px;
	}

	input#individual1, input#individual2, input#individual3, input#individual4, input#individual5, input#individual6 {
		width: 105px;
	}

	input#direct-plumber, input#master-plumber, input#license-plumber, input#techinical-plumber, input#assisting-plumber, input#learner-plumber {
		width: 105px;
		max-width: 100%;
	}
</style>

<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Settings</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="j<?php echo base_url().'admin/dashboard'; ?>">Home</a></li>
				<li class="breadcrumb-item active">Settings</li>
			</ol>
		</div>
	</div>
</div>
<?php echo $notification; ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Settings</h4>
				<form class="mt-4 form" action="" method="post">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">PIRB Company Details</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Physical Address</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Contact Details</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Banking Details</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab5" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Global Settings</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab6" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">CPD Points Settings</span></a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active p-20" id="tab1" role="tabpanel">
							<div class="row">
								<div class="form-group col-md-6">
									<label for="company_name">Company Name *</label>
									<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name *" value="<?php echo $company_name; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="reg_no">Company Registration Number *</label>
									<input type="text" class="form-control" id="reg_no" name="reg_no" placeholder="Enter Company Registration Number *" value="<?php echo $reg_no; ?>">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="vat_no">VAT Number *</label>
									<input type="text" class="form-control" id="vat_no" name="vat_no" placeholder="Enter VAT Number *" value="<?php echo $vat_no; ?>">
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="tab2" role="tabpanel">
							<div class="row">
								<div class="form-group col-md-6">
									<label for="physical_address">Physical Address *</label>
									<input type="text" class="form-control" id="physical_address" name="address1[1][address]" placeholder="Enter Physical Address *" value="<?php echo $physicaladdress; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="postal_address">Postal Address *</label>
									<input type="text" class="form-control" id="postal_address" name="address1[2][address]" placeholder="Enter Postal Address *" value="<?php echo $postaladdress; ?>">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="phy_suburb">Suburb *</label>
									<input type="text" class="form-control" id="phy_suburb" name="address1[1][suburb]" placeholder="Enter Suburb *" value="<?php echo $physicaladdress1; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="postal_suburb">Suburb *</label>
									<input type="text" class="form-control" id="postal_suburb" name="address1[2][suburb]" placeholder="Enter Suburb *" value="<?php echo $postaladdress1; ?>">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="phy_city">City *</label>
									<input type="text" class="form-control" id="phy_city" name="address1[1][city]" placeholder="Enter City *" value="<?php echo $physicaladdress2; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="postal_city">City *</label>
									<input type="text" class="form-control" id="postal_city" name="address1[2][city]" placeholder="Enter City *" value="<?php echo $postaladdress2; ?>">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="physical_province">Province *</label>
									<?php echo form_dropdown("address1[1][province]", $provinceList, $physicaladdress3, ['id' => 'physical_province', 'class' => 'form-control']); ?>
								</div>
								<div class="form-group col-md-6">
									<label for="postal_province">Province *</label>
									<?php echo form_dropdown("address1[2][province]", $provinceList, $postaladdress3, ['id' => 'postal_province', 'class' => 'form-control']); ?>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">									
								</div>
								<div class="form-group col-md-6">
									<label for="postal_code">Postal Code *</label>
									<input type="text" class="form-control" id="postal_code" name="address1[2][postal_code]" placeholder="Enter Postal Code *" value="<?php echo $postaladdress4; ?>">
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="tab3" role="tabpanel">
							<div class="row">
								<div class="form-group col-md-6">
									<label for="work_phone">Work Phone *</label>
									<input type="text" class="form-control" id="workphone" name="work_phone" placeholder="Enter Work Phone *" value="<?php echo $work_phone; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="email">Email Address *</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address *" value="<?php echo $email; ?>">
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="tab4" role="tabpanel">
							<div class="row">
								<div class="form-group col-md-6">
									<label for="bank_name">Bank Name *</label>
									<input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name *" value="<?php echo $bank_name; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="branch_code">Branch Code *</label>
									<input type="number" class="form-control" id="branch_code" name="branch_code" placeholder="Enter Branch Code *" value="<?php echo $branch_code; ?>">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="account_name">Account Name *</label>
									<input type="text" class="form-control" id="account_name" name="account_name" placeholder="Enter Account Name *" value="<?php echo $account_name; ?>">
								</div>
								<div class="form-group col-md-6">									
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="account_no">Account Number *</label>
									<input type="number" class="form-control" id="account_no" name="account_no" placeholder="Enter Company Account Number *" value="<?php echo $account_no; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="account_type">Account Type *</label>
									<input type="text" class="form-control" id="account_type" name="account_type" placeholder="Enter Account Type *" value="<?php echo $account_type; ?>">
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="tab5" role="tabpanel">
							<div class="row">
								<div class="form-group col-md-6">
									<label for="vat_percentage">Vat as a Percentage *</label>
									<input type="number" class="form-control" id="vat_percentage" name="vat_percentage" placeholder="Enter Vat as a Percentage *" value="<?php echo $vat_percentage; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="system_email">System Email Address *</label>
									<input type="text" class="form-control" id="system_email" name="system_email" placeholder="Enter System Email Address *" value="<?php echo $system_email; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="plumber_certificate">Default Plumber Max Non - Logged Certificates *</label>
									<input type="number" class="form-control" id="plumber_certificate" name="plumber_certificate" placeholder="Enter Default Plumber Max Non - Logged Certificates *" value="<?php echo $plumber_certificate; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="reseller_certificate">Default  Resellers Max Non - Logged Certificates *</label>
									<input type="number" class="form-control" id="reseller_certificate" name="reseller_certificate" placeholder="Enter Default  Resellers Max Non - Logged Certificates *" value="<?php echo $reseller_certificate; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="refix_period">Defult Refix Period in days *</label>
									<input type="number" class="form-control" id="refix_period" name="refix_period" placeholder="Enter Defult Refix Period in days *" value="<?php echo $refix_period; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="audit_percentage">Audit Ratio as a Percentage *</label>
									<input type="number" class="form-control" id="audit_percentage" name="audit_percentage" placeholder="Enter Audit Ratio as a Percentage *" value="<?php echo $audit_percentage; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="penalty">Days allowed after regsitration date has passed to apply Late Date Payment penalty *</label>
									<input type="number" class="form-control" id="penalty" name="penalty" placeholder="Enter Days allowed after regsitration date has passed to apply Late Date Payment penalty *" value="<?php echo $penalty; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="expired">Days allowed after regsitration date has passed before making registration expired *</label>
									<input type="number" class="form-control" id="expired" name="expired" placeholder="Enter Days allowed after regsitration date has passed before making registration expired *" value="<?php echo $expired; ?>">
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="tab6" role="tabpanel">
							<div class="col-md-12">
								<table id="mainTable" class="table table-bordered">
									<thead>
										<tr>
											<th>CPD Stream</th>
											<th>Master Plumber</th>
											<th>Licsensed Plumber</th>
											<th>Operating Technician</th>
											<th>Assistant Technician</th>
											<th>Learner</th>
										</tr>
									</thead>
									<tbody class="cpd_body">
										<?php
											foreach($cpdstream as $key => $stream){
										?>
												<tr>
													<td><?php echo $stream; ?></td>
													<td><input type="number" name="cpd[<?php echo $key; ?>][master]"></td>
													<td><input type="number" name="cpd[<?php echo $key; ?>][licensed]"></td>
													<td><input type="number" name="cpd[<?php echo $key; ?>][operating]"></td>
													<td><input type="number" name="cpd[<?php echo $key; ?>][assistant]"></td>
													<td><input type="number" name="cpd[<?php echo $key; ?>][learner]"></td>
												</tr>
										<?php
										}
										?>
										<tr>
											<td>Total</td>
											<td><input id="direct-plumber" class="col-sm-5" type="text" name="" readonly="readonly"></td>
											<td><input id="master-plumber" class="col-sm-5" type="text" name="" readonly="readonly"></td>
											<td><input id="license-plumber" class="col-sm-5" type="text" name="" readonly="readonly"></td>
											<td><input id="techinical-plumber" class="col-sm-5" type="text" name="" readonly="readonly"></td>
											<td><input id="assisting-plumber" class="col-sm-5" type="text" name="" readonly="readonly"></td>										   
										</tr>

									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-right">
							<input type="hidden" name="address_id" value="<?php echo $address_id; ?>">
							<input type="hidden" name="details_id" value="<?php echo $details_id; ?>">
							<input type="hidden" name="cpd_id" value="<?php echo $cpd_id; ?>">
							<button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(function(){		
		validation(
			'.form',
			{
					reg_no : {
					required	: true,
				},
				company_name : {
					required	: true,
				},
				vat_no : {
					required	: true,
				},
				physical_address : {
					required	: true,
				},
				postal_address : {
					required	: true,
				},
				phy_suburb : {
					required	: true,
				},
				postal_suburb : {
					required	: true,
				},
				phy_city : {
					required	: true,
				},
				postal_city : {
					required	: true,
				},
				postal_code : {
					required	: true,
				},
				workphone : {
					required	: true,
				},
				email : {
					required	: true,
				},
				bank_name : {
					required	: true,
				},
				branch_code : {
					required	: true,
				},
				account_name : {
					required	: true,
				},
				account_no : {
					required	: true,
				},
				account_type : {
					required	: true,
				},
				vat_percentage : {
					required	: true,
				},
				email : {
					required	: true,
				},
				plumber_certificate : {
					required	: true,
				},
				reseller_certificate : {
					required	: true,
				},
				refix_period : {
					required	: true,
				},
				audit_percentage : {
					required	: true,
				},
				penalty : {
					required	: true,
				},
				expired : {
					required	: true,
				}
			},
			{
					reg_no 	: {
					required	: "Company Registration Number field is required."
				},
				company_name 	: {
					required	: "Company Name field is required."
				},
				vat_no 	: {
					required	: "VAT field is required."
				},
				physical_address 	: {
					required	: "Physical Address field is required."
				},
				postal_address 	: {
					required	: "Postal Address field is required."
				},
				phy_suburb 	: {
					required	: "Physical Suburb field is required."
				},
				postal_suburb 	: {
					required	: "Postal Suburb field is required."
				},
				phy_city 	: {
					required	: "Physical City field is required."
				},
				postal_city 	: {
					required	: "Postal City field is required."
				},
				postal_code 	: {
					required	: "Postal Code field is required."
				},
				workphone 	: {
					required	: "Wrok Phone field is required."
				},
				email 	: {
					required	: "Email field is required."
				},
				bank_name 	: {
					required	: "Bank Name field is required."
				},
				branch_code 	: {
					required	: "Branch Code field is required."
				},
				account_name 	: {
					required	: "Account Name field is required."
				},
				account_no 	: {
					required	: "Account Number field is required."
				},
				account_type 	: {
					required	: "Account Type field is required."
				},
				vat_percentage 	: {
					required	: "VAT Percentage field is required."
				},
				email: {
					required	: "System Email field is required."
				},
				plumber_certificate 	: {
					required	: "Default Plumber Max Non - Logged Certificates field is required."
				},
				reseller_certificate 	: {
					required	: "Default Resellers Max Non - Logged Certificates field is required."
				},
				refix_period 	: {
					required	: "Defult Refix Period in days field is required."
				},
				audit_percentage 	: {
					required	: "Audit Ratio as a Percentage field is required."
				},
				penalty 	: {
					required	: "Days allowed after regsitration date has passed to apply Late Date Payment penalty  field is required."
				},
				expired 	: {
					required	: "Days allowed after regsitration date has passed before making registration expired field is required."
				}
			}
			);
		
	});
</script>
