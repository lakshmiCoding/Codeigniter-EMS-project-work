<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }
    public function index(){
		if($this->session->userdata('empdetails')){
			redirect('Employee/home');
		}
		else{
        redirect('Login');
		}
    }
    public function home(){
		if($this->session->userdata('empdetails')){
		$this->load->view('header1');
        $this->load->view('employee_page');
		}
		else{
			redirect('Login');
		}
			
    }
	public function login_validate(){
				
		$this->form_validation->set_rules('e_name','employee name','required');
        $this->form_validation->set_rules('e_pwd','employee password','required');

        if($this->form_validation->run()==FALSE){
            redirect('Login');
            $this->session->set_flashdata('err','Error in validation');
        }
		else{
			
			$name=$this->input->post('e_name');
			$pwd=$this->input->post('e_pwd');
		
			$result=$this->User_model->emp_compare($name,$pwd,"employee");
			
			if($result){
				$this->session->set_userdata('empdetails',$result);
				redirect('Employee/home');
			}
			else{
				$this->session->set_flashdata('err_login','Invalid Login');
				redirect('Login');
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
        $this->login_validate();
	}
	public function view($id){
		$data['key']=$this->User_model->fetch($id);
		$this->load->view('header1');
		$this->load->view('view_emp_profile',$data);
	}
	public function update($id){
		$data['key']=$this->User_model->fetch($id);
		$this->load->view('header1');
		$this->load->view('update_emp_profile',$data);
	}
	public function upd_profile($id){
		$u_id=array('e_id'=>$id);

		if($this->input->post('update'))
		{
		$this->form_validation->set_rules('e_name','Name','required');
        $this->form_validation->set_rules('e_dsgn','designation','required');
        $this->form_validation->set_rules('e_pwd','password','required');
		$this->form_validation->set_rules('e_gender','gender','required');
        $this->form_validation->set_rules('e_addr','address','required');
        $this->form_validation->set_rules('e_mail','email','required');
        $this->form_validation->set_rules('e_phn','phone','required');
		$this->form_validation->set_rules('e_date','join date','required');
		
		//if(!empty($_FILES['e_img']['e_name'])){		//validation for image upload
			$config['upload_path']='assets/uploads/';
			$config['allowed_types']='jpg|jpeg|png|gif|pdf';
			$config['file_name']=$_FILES['e_img']['e_name'];
			
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('e_img')){
				$upload_data=$this->upload->data();
				$picture=$upload_data['file_name'];
			}
			else{
				$picture='error';
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('update_emp_profile', $error);
			}
				
		
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata("err_form","error in form- validation");
		}
		else{
			
			$data=array('e_name'=>$this->input->post('e_name'),
			'e_dsgn'=>$this->input->post('e_dsgn'),
			'e_pwd'=>$this->input->post('e_pwd'),
			'gender'=>$this->input->post('e_gender'),
			'address'=>$this->input->post('e_addr'),
			'email'=>$this->input->post('e_mail'),
			'phone'=>$this->input->post('e_phn'),
			'join_date'=>$this->input->post('e_date'),
			'image'=>$picture);
			
			$val=$this->User_model->update_row($data,$u_id);
			if($val){
				$this->session->set_flashdata('succ_upd','Row updated successfully');
				redirect('Employee/home');
			}
			else{
				$this->session->set_flashdata('err_upd','Updation not performed!!');
				redirect('Employee/home');
			}
			
		}
	}
	}
	public function pwd($id){
		$data['key']=$this->User_model->get_pwd($id);
		//$pwd=$data->e_pwd;
		$this->load->view('header1');
		$this->load->view('change_pwd',$data);
	}
	
	public function pwd_change($id){
		$this->form_validation->set_rules('old_pwd','Old password','required');
		$this->form_validation->set_rules('new_pwd','New password','required');
		$this->form_validation->set_rules('confirm_pwd','Confirm password','required|matches[new_pwd]');
		
		
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata("err_form","Passwords don't match!!");
			//redirect('Employee/home');
			redirect('Employee/pwd/'.$id);
		}
		else{
			$old_pwd=$this->input->post('old_pwd');
			$new_pwd=$this->input->post('new_pwd');
			$data=$this->User_model->get_pwd($id);
			$pwd=$data->e_pwd;
			//if($pwd==$old_pwd){
				if(strcmp($old_pwd,$pwd)==0){

				$val=$this->User_model->upd_pwd($id,$new_pwd);
				if($val){
					$this->session->set_flashdata('succ_upd','Your password changed successfully!!');
					 redirect('Employee/home');
					//redirect('Employee/pwd/'.$id);					
				}
				else{
				$this->session->set_flashdata('err_upd','Error!! Password not updated!!');
				// redirect('Employee/home');
			redirect('Employee/pwd/'.$id);
				}
			}
			else{
				$this->session->set_flashdata('err_pwd','Current password is Wrong!!');
				redirect('Employee/pwd/'.$id);
			}
		}
	}
	public function load_leave(){
		$this->load->view('header1');
		$this->load->view('apply_leave');
	}

	public function applyleave($id){
		$this->form_validation->set_rules('fromdate','From date','required');
		$this->form_validation->set_rules('todate','To date','required');
		$this->form_validation->set_rules('description','description','required');

		if($this->form_validation->run()==true){

			$from=strtotime($this->input->post('fromdate'));
			$to=strtotime($this->input->post('todate'));
			// if($from==$to){
			// 	$datediff = 1;
			// }
			// else{
			$datediff = $to - $from;
			$no_days= round($datediff / (60 * 60 * 24)) + 1;
			// }
			$data=array(
				'leavetype'=>$this->input->post('leavetype'),
				'fromdate'=>$this->input->post('fromdate'),
				'todate'=>$this->input->post('todate'),
				'description'=>$this->input->post('description'),
				'e_id'=>$id
			);

			$res= $this->User_model->addleave($data);

			if($res){
				$this->session->set_flashdata('succ_ins','Leave Applied for '.$no_days.' days');
				redirect('Employee/home');
			}
			else{
				$this->session->set_flashdata('err_ins','errors in insertion!!!');
				redirect('Employee/home');
			}
		}
		else{
			$this->session->set_flashdata('err_frm','Validation errors!!!');
			redirect('Employee/load_leave');
		}
	}

}
?>