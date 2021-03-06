<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plumberperformance extends CC_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Plumberperformance_Model');
	}
	
	public function index($id='')
	{
		if($id!=''){
			$result = $this->Plumberperformance_Model->getList('row', ['id' => $id, 'status' => ['0','1']]);
			if($result){
				$pagedata['result'] = $result;
			}else{
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect('admin/systemsetup/performancesettings/Plumberperformance'); 
			}
		}
		
		if($this->input->post()){
			$requestData 	= 	$this->input->post();

			if($requestData['submit']=='submit'){
				$data 	=  $this->Plumberperformance_Model->action($requestData);
				if($data) $message = 'Plumber Performance Types '.(($id=='') ? 'created' : 'updated').' successfully.';
			}else{
				$data 			= 	$this->Plumberperformance_Model->changestatus($requestData);
				$message		= 	'Plumber Performance Types deleted successfully.';
			}

			if(isset($data)) $this->session->set_flashdata('success', $message);
			else $this->session->set_flashdata('error', 'Try Later.');
			
			redirect('admin/systemsetup/performancesettings/Plumberperformance'); 
		}
		
		$pagedata['notification'] 	= $this->getNotification();
		$data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation', 'datepicker'];
		$data['content'] 			= $this->load->view('admin/systemsetup/performancesettings/index', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}
	
	public function DTPlumberPerformance()
	{
		$post 			= $this->input->post();
		$totalcount 	= $this->Plumberperformance_Model->getList('count', ['status' => ['0','1']]+$post);
		$results 		= $this->Plumberperformance_Model->getList('all', ['status' => ['0','1']]+$post);
		
		$totalrecord 	= [];
		if(count($results) > 0){
			foreach($results as $result){
				$totalrecord[] = 	[
										'type' 		=> 	$result['type'],
										'allocation' => $result['allocation'],
										'status' 	=> 	$this->config->item('statusicon')[$result['status']],
										'action'	=> 	'
															<div class="table-action">
																<a href="'.base_url().'admin/systemsetup/performancesettings/plumberperformance/index/'.$result['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-alt"></i></a>
																<a href="javascript:void(0);" data-id="'.$result['id'].'" class="delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
															</div>
														'
									];
			}
		}
		
		$json = array(
			"draw"            => intval($post['draw']),   
			"recordsTotal"    => intval($totalcount),  
			"recordsFiltered" => intval($totalcount),
			"data"            => $totalrecord
		);

		echo json_encode($json);
	}
}
