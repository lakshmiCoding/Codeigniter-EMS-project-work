<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }
    public function index(){
		if($this->session->userdata('userdetails')){
			redirect('Admin/home');
		}
		else{
			//$this->load->view('first_page');
			redirect('Login');
		}
	}
	
    public function home(){										//this if-else will work only for login code 2
		if($this->session->userdata('userdetails')){
			$data['key']=$this->User_model->leave_count();
			
		   $this->load->view('header');
		   $this->load->view('successpage',$data);
		}
		else{
			redirect('Admin/index');
		}
    }

    public function logout(){
		$this->session->unset_userdata('userdetails'); // destroying or unsetting the session value
        $this->login_validate();

    }
	
    public function login_validate(){
        
        $this->form_validation->set_rules('a_name','Admin name','required');  	//checking for form-validtion
        $this->form_validation->set_rules('a_pwd','Admin password','required');

        if($this->form_validation->run()==FALSE){								//if form not validated, first page is displayed with
            //$this->load->view('first_page');									// error msg
			redirect('Login');
            $this->session->set_flashdata('err-form','Error in form-validation');
        }
        else{
			$name=$this->input->post('a_name');
			$pwd=$this->input->post('a_pwd');

			/*
			$query=$this->User_model->compare($name,$pwd);			//$data(in user_model) is passed exactly as it is,without extractin the results
			
            if($query->num_rows()==1){										//login code 1
            $data=$query->result();
            $userdetails=array('admin_id'=>aid,
			'admin_name'=>$data[0]->name,
            'admin_email'=>$data[0]->email);
            $this->session->set_userdata($userdetails);
            redirect('Admin/home');
			}
			*/
			
			$result=$this->User_model->compare($name,$pwd);
			
			if($result){													//login code2
				$this->session->set_userdata('userdetails',$result);
				redirect('Admin/home');
			}
            else{
                $this->session->set_flashdata('err_login','Invalid_login'); 
                redirect('Login');
            }
        }

    }

    public function load_emp_details(){
        $data['key']=$this->User_model->fetch_emp();
		$this->load->view('header');
        $this->load->view('emp_details',$data);
    }
    
    public function reg(){
		$this->load->view('header');
        $this->load->view('new_empreg');
    }
	
    public function reg_validate(){

            $this->form_validation->set_rules('e_name','Name','required');
            $this->form_validation->set_rules('e_dsgn','designation','required');
            $this->form_validation->set_rules('e_pwd','password','required');

            if($this->form_validation->run()==TRUE){

            $data=array(
                'e_name'=>$this->input->post('e_name'), 
                'e_dsgn'=>$this->input->post('e_dsgn'), 
                'e_pwd'=>$this->input->post('e_pwd'));

            $val=$this->User_model->insert($data);

            if($val){
                $this->session->set_flashdata('success_msg','Details added successfully');
                redirect('Admin/reg');

            }
            else{
                $this->session->set_flashdata('error_msg','Insertion Failed!!');
                redirect('Admin/reg');
            }
            }
            else{
			$this->session->set_flashdata('err-form','Error in form-validation');
            redirect('Admin/reg'); 
            }
       

    }
	public function delete_row($id){
		$val=$this->User_model->del($id);
		if($val){
			redirect('Admin/load_emp_details');
		}
		else{
			$this->session->set_flashdata('err-del','Action not perormed');
			redirect('Admin/load_emp_details');
		}
	}
	public function update_row($id){
		$data['key']=$this->User_model->fetch($id);
		$this->load->view('header');
		$this->load->view('edit_empdetails',$data);
	}
	
	public function upd_validate($id){
		$this->form_validation->set_rules('e_name','Name','required');
        $this->form_validation->set_rules('e_dsgn','designation','required');
        $this->form_validation->set_rules('e_pwd','password','required');
		
		if($this->form_validation->run()==true){
			$data=array('e_name'=>$this->input->post('e_name'),
			'e_dsgn'=>$this->input->post('e_dsgn'),
			'e_pwd'=>$this->input->post('e_pwd'));
			$val=$this->User_model->update_row($data,$id);
			if($val){
				$this->session->set_flashdata('succ_upd','Row updated successfully');
				redirect('Admin/load_emp_details');
			}
			else{
				$this->session->set_flashdata('err_upd','Updation not performed!!');
				redirect('Admin/load_emp_details');
			}

		}
		else{
			$this->session->set_flashdata('err-form','Error in form-validation');
			redirect('Admin/load_emp_details');
		}
	}
	

	public function load_leaves($stat = NULL){
		
		$data['key']=$this->User_model->get_leaves($stat);
		if($stat!=NULL){
			$this->load->view('header');
			$this->load->view('view_pending_leaves',$data);
		}
		else{
			$this->load->view('header');
			$this->load->view('view_leaves',$data);
		}
	}

	// public function updateRead($lid){
	// 	$data=array('isread'=>'1');
	// 	$val=$this->User_model->leave_update($data, $lid);

	// }

	public function view_leave_details($id){
		$data['key']=$this->User_model->get_leave_details($id);
		//  print_r($data);
		//  exit;
		$this->load->view('header');
		$this->load->view('view_leave_details',$data);
	}

	public function updateaction($lid){
		$this->form_validation->set_rules('action','Action','required');
		$this->form_validation->set_rules('remarks','Remarks','alpha');

		if($this->form_validation->run()==true){
			$data=array(
				'status' => $this->input->post('action'),
				'admin_comments' => $this->input->post('remarks')
			);
			$upd=$this->User_model->leave_update($data, $lid);
			if($upd){
				$this->session->set_flashdata('succ_upd','Row updated successfully');
				redirect('Admin/load_leaves');
			}
			else{
				$this->session->set_flashdata('err_upd','Updation not performed!!');
				redirect('Admin/load_leaves');
			}
		}
		else{
			$this->session->set_flashdata('err-form','Error in form-validation');
			redirect('Admin/load_leaves');
		}
	}

	public function change_pwd(){
		$this->load->view('header');
		$this->load->view('admin/change_pwd');
	}

	public function pwd_change($aid){
		$this->form_validation->set_rules('old_pwd','Old password','required');
		$this->form_validation->set_rules('new_pwd','New password','required');
		$this->form_validation->set_rules('confirm_pwd','Confirm password','required|matches[new_pwd]');
		
		
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata("err_form","Passwords don't match!!");
			redirect('Admin/change_pwd');
		}
		else{
			$old_pwd=$this->input->post('old_pwd');
			$new_pwd=$this->input->post('new_pwd');
			$data=$this->User_model->get_pwd_admin($aid);
			$pwd=$data->password;
			//if($pwd==$old_pwd){
				if(strcmp($old_pwd,$pwd)==0){

				$val=$this->User_model->upd_pwd_admin($aid,$new_pwd);
				if($val){
					$this->session->set_flashdata('succ_upd','Your password changed successfully!!');
					 redirect('Admin/home');
				}
				else{
				$this->session->set_flashdata('err_upd','Error!! Password not updated!!');
			redirect('Admin/change_pwd');
				}
			}
			else{
				$this->session->set_flashdata('err_pwd','Current password is Wrong!!');
				redirect('Admin/change_pwd'.$id);
			}
		}
	}

	public function view_assign(){
		$this->load->view('header');
		$this->load->view('assign_project');
	}

	public function assign_project(){
		$this->form_validation->set_rules('e_id','Employee ID','required');
		$this->form_validation->set_rules('pr_id','Project ID','required');

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata("err_form","Validation errors");
			redirect('Admin/view_assign');
		}
		else{
			// $data=array(
			// 	'e_id' => $this->input->post('e_id'),
			// 	'pid' => $this->input->post('pr_id')
			// );
			$e_id = $this->input->post('e_id');
			$pid = $this->input->post('pr_id');
			$upd=$this->User_model->upd_project($e_id,$pid);
			if($upd){
				$this->session->set_flashdata('succ_upd','Row updated successfully');
				redirect('Admin/view_proj_status');
			}
			else{
				$this->session->set_flashdata('err_upd','Updation not performed!!');
				redirect('Admin/view_proj_status');
			}
		}
	}

	public function view_proj_status(){

		$projects['key']= $this->User_model->get_projects();
		$this->load->view('header');
		$this->load->view('admin/project_status',$projects);
	}

	public function view_proj_details($pid){
		$projects['key']= $this->User_model->full_proj_details($pid);
		$this->load->view('header');
		$this->load->view('admin/view_project_details',$projects);
	}


}

?>