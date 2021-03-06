<?php

class Plumber_Model extends CC_Model
{
	public function getList($type, $requestdata=[])
	{ 
		$usersdetail 	= ['ud.id as usersdetailid','ud.title','ud.name','ud.surname','ud.dob','ud.gender','ud.company_name','ud.reg_no','ud.vat_no','ud.contact_person','ud.home_phone','ud.mobile_phone','ud.work_phone','ud.email','ud.file1','ud.file2'];
		$usersplumber 	= ['up.id as usersplumberid','up.racial','up.nationality','up.othernationality','up.idcard','up.otheridcard','up.homelanguage','up.disability','up.citizen','up.registration_card','up.delivery_card','up.employment_details','up.company_details','up.designation'];
		
		$this->db->select('
			u.id,
			u.status,
			'.implode(',', $usersdetail).',
			'.implode(',', $usersplumber).',
			concat_ws("@-@", ua1.id, ua1.user_id, ua1.address, ua1.suburb, ua1.city, ua1.province, ua1.postal_code, ua1.type)  as physicaladdress,
			concat_ws("@-@", ua2.id, ua2.user_id, ua2.address, ua2.suburb, ua2.city, ua2.province, ua2.postal_code, ua2.type)  as postaladdress,
			concat_ws("@-@", ua3.id, ua3.user_id, ua3.address, ua3.suburb, ua3.city, ua3.province, ua3.postal_code, ua3.type)  as billingaddress,
			group_concat(concat_ws("@@@", ups.id, ups.user_id, ups.date, ups.certificate, ups.skills, ups.training, ups.attachment, qr.name) separator "@-@") as skills
		');
		$this->db->from('users u');
		$this->db->join('users_detail ud', 'ud.user_id=u.id', 'left');
		$this->db->join('users_address ua1', 'ua1.user_id=u.id and ua1.type="1"', 'left');
		$this->db->join('users_address ua2', 'ua2.user_id=u.id and ua2.type="2"', 'left');
		$this->db->join('users_address ua3', 'ua3.user_id=u.id and ua3.type="3"', 'left');
		$this->db->join('users_plumber up', 'up.user_id=u.id', 'left');
		$this->db->join('users_plumber_skill ups', 'ups.user_id=u.id', 'left');
		$this->db->join('qualificationroute qr', 'qr.id=ups.skills', 'left');
		
		if(isset($requestdata['id'])) 			$this->db->where('u.id', $requestdata['id']);
		if(isset($requestdata['idcard']) && $requestdata['idcard']!='')				$this->db->where('up.idcard', $requestdata['idcard']);
		if(isset($requestdata['mobile_phone']) && $requestdata['mobile_phone']!='')	$this->db->where('up.mobile_phone', $requestdata['mobile_phone']);
		// if(isset($requestdata['mobile_phone'])) $this->db->where('ud.mobile_phone', $requestdata['mobile_phone']);
		if(isset($requestdata['status']))		$this->db->where_in('u.status', $requestdata['status']);
		
		if($type!=='count' && isset($requestdata['start']) && isset($requestdata['length'])){
			$this->db->limit($requestdata['length'], $requestdata['start']);
		}
		if(isset($requestdata['order']['0']['column']) && isset($requestdata['order']['0']['dir'])){
			$column = ['u.id', 'ud.name'];
			$this->db->order_by($column[$requestdata['order']['0']['column']], $requestdata['order']['0']['dir']);
		}
		if(isset($requestdata['search']['value']) && $requestdata['search']['value']!=''){
			$searchvalue = $requestdata['search']['value'];
			$this->db->like('ud.name', $searchvalue);
		}
		
		$this->db->group_by('u.id');
		
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}
	
	public function action($data)
	{
		$this->db->trans_begin();
		
		$datetime				= 	date('Y-m-d H:i:s');
		$idarray				= 	[];
		
		if(isset($data['title'])) 				$request1['title'] 				= $data['title'];
		if(isset($data['name'])) 				$request1['name'] 				= $data['name'];
		if(isset($data['surname'])) 			$request1['surname'] 			= $data['surname'];
		if(isset($data['dob'])) 				$request1['dob'] 				= date('Y-m-d', strtotime($data['dob']));
		if(isset($data['gender'])) 				$request1['gender'] 			= $data['gender'];		
		if(isset($data['company_name'])) 		$request1['company_name'] 		= $data['company_name'];
		if(isset($data['reg_no'])) 				$request1['reg_no'] 			= $data['reg_no']; 
		if(isset($data['vat_no'])) 				$request1['vat_no'] 			= $data['vat_no'];
		if(isset($data['home_phone'])) 			$request1['home_phone'] 		= $data['home_phone'];
		if(isset($data['mobile_phone'])) 		$request1['mobile_phone'] 		= $data['mobile_phone'];
		if(isset($data['work_phone'])) 			$request1['work_phone'] 		= $data['work_phone'];
		if(isset($data['image1'])) 				$request1['file1'] 				= $data['image1'];
		if(isset($data['image2'])) 				$request1['file2'] 				= $data['image2'];
		
		if(isset($request1)){
			$usersdetailid	= 	$data['usersdetailid'];
			if(isset($data['user_id'])) $request1['user_id'] = $data['user_id'];
			
			if($usersdetailid==''){
				$usersdetail = $this->db->insert('users_detail', $request1);
				$usersdetailinsertid = $this->db->insert_id();
			}else{
				$usersdetail = $this->db->update('users_detail', $request1, ['id' => $usersdetailid]);
				$usersdetailinsertid = $usersdetailid;
			}
			
			$idarray['usersdetailid'] = $usersdetailinsertid;
		}
		
		if(isset($data['racial'])) 				$request2['racial'] 			= $data['racial'];
		if(isset($data['nationality'])) 		$request2['nationality'] 		= $data['nationality'];
		if(isset($data['othernationality'])) 	$request2['othernationality'] 	= $data['othernationality'];
		if(isset($data['idcard'])) 				$request2['idcard'] 			= $data['idcard'];
		if(isset($data['otheridcard'])) 		$request2['otheridcard'] 		= $data['otheridcard'];
		if(isset($data['homelanguage'])) 		$request2['homelanguage'] 		= $data['homelanguage'];
		if(isset($data['disability'])) 			$request2['disability'] 		= $data['disability'];
		if(isset($data['citizen'])) 			$request2['citizen'] 			= $data['citizen'];
		if(isset($data['registration_card'])) 	$request2['registration_card'] 	= $data['registration_card'];
		if(isset($data['delivery_card'])) 		$request2['delivery_card'] 		= $data['delivery_card'];
		if(isset($data['employment_details'])) 	$request2['employment_details'] = $data['employment_details'];
		if(isset($data['company_details'])) 	$request2['company_details'] 	= $data['company_details'];
		if(isset($data['designation'])) 		$request2['designation'] 		= $data['designation'];
		
		if(isset($request2)){
			$usersplumberid	= $data['usersplumberid'];
			if(isset($data['user_id'])) $request2['user_id'] 	= $data['user_id'];
			
			if($usersplumberid==''){
				$usersplumber = $this->db->insert('users_plumber', $request2);
				$usersplumberinsertid = $this->db->insert_id();
			}else{
				$usersplumber = $this->db->update('users_plumber', $request2, ['id' => $usersplumberid]);
				$usersplumberinsertid = $usersplumberid;
			}
			
			$idarray['usersplumberid'] = $usersplumberinsertid;
		}
		
		if(isset($data['address']) && count($data['address'])){
			$usersaddressinsertids = [];
			foreach($data['address'] as $key => $request3){
				if(isset($data['user_id'])) $request3['user_id'] = $data['user_id'];
				if($request3['id']==''){
					$usersaddress = $this->db->insert('users_address', $request3);
					$usersaddressinsertids[$request3['type']] = $this->db->insert_id();
				}else{
					$usersaddress = $this->db->update('users_address', $request3, ['id' => $request3['id']]);
					$usersaddressinsertids[$request3['type']] = $request3['id'];
				}
			}
			
			$idarray['usersaddressinsertid'] = $usersaddressinsertids;
		}
		
		if(isset($data['skill_date'])) 				$request4['date'] 				= date('Y-m-d', strtotime($data['skill_date']));
		if(isset($data['skill_certificate'])) 		$request4['certificate'] 		= $data['skill_certificate'];
		if(isset($data['skill_route'])) 			$request4['skills'] 			= $data['skill_route'];
		if(isset($data['skill_training'])) 			$request4['training'] 			= $data['skill_training'];
		if(isset($data['skill_attachment'])) 		$request4['attachment'] 		= $data['skill_attachment'];
		
		if(isset($request4)){
			$skillid = (isset($data['skill_id'])) ? $data['skill_id'] : '';
			if(isset($data['user_id'])) $request4['user_id'] = $data['user_id'];
			
			if($skillid==''){
				$skill = $this->db->insert('users_plumber_skill', $request4);
				$skillid = $this->db->insert_id();
			}else{
				$skill = $this->db->update('users_plumber_skill', $request4, ['id' => $skillid]);
			}
			
			$idarray['skillid'] = $skillid;
		}
		
		if(isset($data['flag'])) 		$request5['flag'] 	= $data['flag'];
		if(isset($data['email'])) 		$request5['email'] 	= $data['email'];
		
		if(isset($request5)){
			if(isset($data['user_id'])){
				$userid = $data['user_id'];			
				$users = $this->db->update('users', $request5, ['id' => $userid]);
			}
		}
		
		
		if((isset($usersdetail) || isset($usersplumber) || isset($usersaddress) || isset($skill) || isset($users)) && $this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return $idarray;
		}
	}
	
	public function getSkillList($type, $requestdata=[])
	{
		$this->db->select('ups.*,qr.name as skillname');
		$this->db->from('users_plumber_skill ups');
		$this->db->join('qualificationroute qr', 'qr.id=ups.skills', 'left');
		
		if(isset($requestdata['id'])) 		$this->db->where('ups.id', $requestdata['id']);
		
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}
	
	public function deleteSkillList($id)
	{
		return $this->db->where('id', $id)->delete('users_plumber_skill');
	}
}