<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function insert($data){
        $ins=$this->db->insert("employee",$data);
        return $ins;
    }

    public function compare($name1,$pwd1){
        $this->db->select("aid,name,email");
        $condition=array('name'=>$name1,'password'=>$pwd1);
        $this->db->where($condition);
       // $this->db->from('admin_reg');
        $data=$this->db->get('admin_reg');
       // return $data;					//directly returns the fetched row without extracting its results.
		return $data->row_array();		//returns the fetched row by extracting the result as an array.
    }
	public function fetch($id){
		$condition=array('e_id'=>$id);
		$query=$this->db->get_where('employee',$condition);
		return $query->row();
	}
    public function fetch_emp(){
        //$query=$this->db->get("employee");	//getting all rows - method 1
		$this->db->select('*');
		$this->db->from('employee');
		$query=$this->db->get();
        $data=$query->result();
        return $data;
    }
	public function del($id){
		$condition=array('e_id'=>$id);
		$this->db->where($condition);
		$this->db->delete('employee');
		return true;
	}
	public function update_row($data,$id){
		$this->db->set($data);
		$this->db->where($id);
		$upd=$this->db->update('employee');
		return $upd;

	}
	
	/*		---for employee module---		*/
	
	public function emp_compare($name,$pwd,$tbl){
		$this->db->select("e_id,e_name,image");
		$condition=array('e_name'=>$name,'e_pwd'=>$pwd);
		$this->db->where($condition);
		$this->db->from($tbl);
		$data=$this->db->get();
		return $data->row_array();
	}
	
	public function get_pwd($id){
		$condition=array('e_id'=>$id);			//compare old_pwds here with the passed arguements
		$this->db->select("*");
		$this->db->where($condition);
		$this->db->from('employee');
		$data=$this->db->get();
		return $data->row();
	}

	public function get_pwd_admin($id){
		$condition=array('aid'=>$id);			//compare old_pwds here with the passed arguements
		$this->db->select('password');
		$this->db->where($condition);
		$this->db->from('admin_reg');
		$data=$this->db->get();
		return $data->row();
	}
	
	public function upd_pwd($id,$new_pwd){
		$condition=array('e_id'=>$id,);
		$data=array('e_pwd'=>$new_pwd);
		$this->db->set($data);
		$this->db->where($condition);
		$upd=$this->db->update('employee');
		return $upd;
	}

	public function addleave($data){
		$ins=$this->db->insert('empleaves',$data);
		return $ins;
	}

	public function get_leaves($stat){
		$this->db->select('l_id,leavetype,posted_on,status,e_name,employee.e_id');
		$this->db->order_by('l_id', 'desc');
		$this->db->from('empleaves');
		$this->db->join('employee','employee.e_id = empleaves.e_id');
		if($stat!=NULL){
			$this->db->where('status',$stat);
			$query=$this->db->get();
			return $query->result();
		}
		else{
			$query=$this->db->get();
			return $query->result();
		}
	}

	// public function get_leave_by_status(){
	// 	$this->db->select('l_id,leavetype,posted_on,status,e_name,employee.e_id');
	// 	$this->db->order_by('l_id', 'desc');
	// 	$this->db->from('empleaves');
	// 	$this->db->join('employee','employee.e_id = empleaves.e_id');
	// 	$query=$this->db->get();
	// 	return $query->result();
	// }

	public function leave_count(){
		// $this->db->select('status, COUNT(status) as total');

			// $this->db->select('COUNT(status) as total');
			// $this->db->group_by('status'); 
			// $this->db->order_by('status', 'asc'); 
			// $query = $this->db->get('empleaves');
			// return $query->result();
		$condition=array('status'=>0, 'isread'=>0);
		$this->db->select('COUNT(status) as total');
		//$this->db->where('status=0');
		$this->db->where($condition);
		$query = $this->db->get('empleaves');
		return $query->result();
	}

	public function get_leave_details($id){
		$condition=array('l_id'=>$id);
		$this->db->select('l_id,leavetype,fromdate,todate,posted_on,description,status,employee.e_id,e_name,e_dsgn,email,phone');
		$this->db->from('empleaves');
		$this->db->join('employee','employee.e_id = empleaves.e_id');
		$this->db->where($condition);
		$query=$this->db->get();
		return $query->row_array();
	}

	public function leave_update($data, $lid){
		$condition=array('l_id'=>$lid);
		$this->db->set($data);
		$this->db->where($condition);
		$upd=$this->db->update('empleaves');
		return $upd;
	}
	
	// public function updread($data, $lid){
	// 	$condition=array('l_id'=>$lid);
	// 	$this->db->set($data);
	// 	$this->db->where($condition);
	// 	$upd=$this->db->update('empleaves');
	// 	return $upd;
	// }
	
	public function is_read(){
		$condition=array('l_id'=>$lid);
		$data=array('isread'=>1);
		$this->db->set($data);
		$this->db->where($condition);

	}
	
	public function upd_pwd_admin($aid,$new_pwd){
		$condition=array('aid'=>$aid);
		$data=array('password'=> $new_pwd);
		$this->db->set($data);
		$this->db->where($condition);
		$upd=$this->db->update('admin_reg');
		return $upd;
	}

	public function get_projects(){
		$this->db->select('*');
		$this->db->from('projects');
		$query=$this->db->get();
		return $query->result();
	}

	public function upd_project($e_id, $pid){
		$data= array('e_id' => $e_id, 'pid' => $pid);
		$this->db->set($data);
		$this->db->where('pid',$pid);
		$upd=$this->db->update('projects');
		return $upd;
	}

	public function full_proj_details($pid){
		$this->db->select('pid,proj_name,due_date,submission,status,employee.e_id,e_name');
		$this->db->from('projects');
		$this->db->join('employee','employee.e_id = projects.e_id');
		$this->db->where('pid',$pid);
		$query=$this->db->get();
		return $query->row_array();
	}
}

?>