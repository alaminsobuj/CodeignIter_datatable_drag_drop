<?php
// namespace Phppot;
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
     }
  
	public function index()
	{
    $data['data_list']= $this->db->select('*')->from('sorting_record')
    ->order_by('display_order','asc')
    ->get()
    ->result(); 
		$this->load->view('welcome_message',$data);
	}

  function save_drag_data(){
    $allData= $this->input->post('allData');
    $i = 1;
    if($allData){
    foreach ($allData as $key => $value) {
        $data=array(
          'display_order'=>$i,
        );
        $this->db->where('id',$value)->update('sorting_record',$data);
        // $sql = "UPDATE sorting_record SET display_order=".$i." WHERE id=".$value;
        // $mysqli->query($sql);
        $i++;
    }
   }
   exit;
  }







  }

  

