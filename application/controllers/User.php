<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct() {
        parent::__construct();
        // Load member model
        $this->load->model('UserModal');

    }
    
	public function index()
	{
         $this->load->view('UserView/User_View');

     }
     public function create()
     {
     	$name =$this->input->post('name');
     	$roll_no =$this->input->post('roll_no');
     	 $dob =$this->input->post('dob');
        
        // $dob =$this->input->post('dob');
     	$percentage =$this->input->post('percentage');
    
     $data= array(
       'name'=>$name,
       'roll_no'=>$roll_no,
       'dob'=>$dob,
       'percentage'=>$percentage,     
     );
      
   

      $insert= $this->UserModal-> createData($data);

      echo json_encode($insert);
     }

     public function fetchDatafromDB()
     {
     	$resultList= $this->UserModal->fetchAllData('*','user',array());

     	// echo "<pre>";
     	// print_r($result);die;

     	 $result= array();
         $button='';
          $i =1;
     	 foreach ($resultList as $key => $value) {
            $button = '<a class="btn-sm btn-success text-light" onclick="editData('.$value['id'].')" href="#"> Edit</a> ';

			$button .= ' <a class="btn-sm btn-danger text-light" onclick="deleteData('.$value['id'].')" href="#"> Delete</a>';

         $date=date_create($value['dob']);
         $newDate = date_format($date,"d/m/Y");

			$result['data'][] = array(
     	 		$i++,
     	 		$value['name'],
     	 		$value['roll_no'],
     	 		$newDate,
     	 		$value['percentage'],
                $button
     	 	);
     	 }
     	 echo json_encode($result);
     }

     public function getEditData()
     {
     	$id = $this->input->post('id');
		$resultData = $this->UserModal->fetchSingleData('*','user',array('id'=>$id));
		echo json_encode($resultData);

     }
     public function update()
	{    

		$id =$this->input->post('id');
		$name =$this->input->post('name');
     	$roll_no =$this->input->post('roll_no');
     	 $dob =$this->input->post('dob');
     	$percentage =$this->input->post('percentage');

		 $data= array(
       'name'=>$name,
       'roll_no'=>$roll_no,
       'dob'=>$dob,
       'percentage'=>$percentage,     
     );
		$update = $this->UserModal->updateData('user',$data,array('id'=>$id));
		if($update==true)
		{
			echo 1;
		}
		else{
			echo 2;
		}
	}
	public function deleteSingleData()
	{
		$id = $this->input->post('id');
		$dataDelete = $this->UserModal->deleteData('user',array('id'=>$id));
		if($dataDelete==true)
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
	}

    // public function averageper()
    // {
    //     $this->db->select_avg('percentage');
    //    $query = $this->db->get('user');
    //    print_r($query);
    // }
}
