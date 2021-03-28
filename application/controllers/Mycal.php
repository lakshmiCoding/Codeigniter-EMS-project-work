<?php
class Mycal extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        //  $year= date('YY');
        //  $month= date('mm');
        $this->load->model('Mycal_model');
        
        $year=$this->uri->segment(3);
        $month=$this->uri->segment(4);
    }
    public function index($year = NULL, $month  = NULL){

        // $data=array('year'=>$this->uri->segment(3),
        // 'month'=>$this->uri->segment(4));
        if (!$year) {
            $year = date('Y');
        }                                   //current year and month values are passed as arguements,so that the values are fetched
        if (!$month) {                      //from the database on the first display itself.
            $month = date('m');
        }
        
		$data['calender']=$this->Mycal_model->getcalendar($year,$month); 
		
		if($this->session->userdata('userdetails')){ 
        $this->load->view('header');
		$this->load->view('calender/mycal_view',$data);      
		}
		else{
			$this->load->view('header1');
			$this->load->view('calender/mycal_view',$data); 
		}
    }

    public function load_calendar(){
		
		redirect('MyCal/index/');
	}

    public function add_event(){
		$this->load->view('header');
		$this->load->view('add_events');
	}

	public function insert_event(){
		$this->form_validation->set_rules('e_date','Date','required');
		$this->form_validation->set_rules('event','Event Name','required');
		
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('err_form',"Error in validation!!");
			redirect('Mycal/add_event');
		}
		else{
			$data=array(
				'date' => $this->input->post('e_date'),
				'content' => $this->input->post('event')
			);

			$ins=$this->Mycal_model->insert_events($data);

			if($ins){
				$this->session->set_flashdata('succ_event',"Event Updated successfully!!");
				redirect('Mycal/load_calendar');
			}
			else{
				$this->session->set_flashdata('err_event',"Event Updation Failed!!");
				redirect('Admin/home');
			}
		}
	}

}

?>