<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	public function __construct()
        {
                parent::__construct();


                // Your own constructor code
            $this->load->helper("url");
			$this->load->helper("form");
			$this->load->library("form_validation");
			$this->load->database("");
			$this->load->model('Teacher_model','person');
			$this->load->model('Parent_model','p');
			$this->load->model('Student_model','s');
			$this->load->helper(array('form', 'url'));
			$this->load->library('upload');
			$this->load->model('mail_model' , 'm');


		}
	public function index()

	{
				$this->load->view('welcome_message');

		}



	public function login(){
		if($this->check_session()){
			$user=$this->db->get_where('users',array("id"=>$this->session->userdata('userid')))->first_row();
		$this->indexadmin($user);
		}else{

			$this->load->view("welcome_message");

		}
		}

	public function  check_session(){

			if($this->session->userdata('username')!=null){
				return true;
						}else{
				return false;
						}
	}
		function login_validation()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run())
			{
				//true
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				//model function
				$this->load->model('main_model');
				if($this->main_model->can_login($username, $password))
				{
					$userdata=$this->db->get_where("users",array("username"=>$username ,"password"=>$password))->first_row();

					$session_data = array(
						'username'     =>     $username,
						'userid'       => $userdata->id
					);
					$this->session->set_userdata($session_data);


					redirect(base_url() . 'Admin/enter');
				}
				else
				{
					$this->session->set_flashdata('error', 'Invalid Username and Password');
					redirect(base_url() . 'Admin/index');
				}
			}
			else
			{
				//false
				$this->login();
			}
		}

		function enter(){

			if($this->session->userdata('username') != '')
			{

				redirect(base_url() . 'Admin/indexadmin');

			}
			else
			{
				redirect(base_url() . 'Admin/login');
			}
		}
		function logout()
		{
			$this->session->unset_userdata('username');
			redirect(base_url() . 'Admin/login');
		}



		function  userdata(){
		return $this->db->get_where("users",array("id"=>$this->session->userdata("userid")))->first_row();

		}
	public function indexadmin(){
		if($this->check_session()){
			$userdata=$this->userdata();

			$this->load->view('templates/header',array("user"=>$userdata));
			$this->load->view('indexadmin');
			$this->load->view('templates/footer');

		}else{
			redirect(base_url() . 'Admin/login');
		}

	}
	public function modifiersup(){
		if($this->check_session()){
			$userdata=$this->userdata();

		$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/Student/crud_student');
		$this->load->view('templates/footer');

		}else{
			redirect(base_url() . 'Admin/login');
		}

	}
	
	
	public function modifiersupParent(){
		if($this->check_session()){
			$userdata=$this->userdata();

		$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/Parent/crud_parent');
		$this->load->view('templates/footer');


		}else{
			redirect(base_url() . 'Admin/login');
		}

	}
	
	public function modifiersupMaitresse(){
		if($this->check_session()){
			$userdata=$this->userdata();

		$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/Maitresse/crud_view');
		$this->load->view('templates/footer');


		}else{
			redirect(base_url() . 'Admin/login');
		}

	}

	public function Consultationmail(){

		if($this->check_session()){

			$userdata=$this->userdata();

			$this->load->view('templates/header',array("user"=>$userdata));
			$data['blogs'] = $this->m->getRecords();
			
		$this->load->view('Admin/Mail/consultation', $data);
		$this->load->view('templates/footer');



			}else{
	redirect(base_url() . 'Admin/login');
	}

}

	public function ajoutmail(){
		if($this->check_session()){
			$userdata=$this->userdata();

			$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/Mail/ajoutmail');
		$this->load->view('templates/footer');


		}else{
			redirect(base_url() . 'Admin/login');
		}

	}
	public function Listerdepaiement(){
		if($this->check_session()){
			$userdata=$this->userdata();

			$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/Paiement/Listerdepaiement');
		$this->load->view('templates/footer');


		}else{
			redirect(base_url() . 'Admin/login');
		}

	}
	public function historique(){
		if($this->check_session()){
			$userdata=$this->userdata();

		$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/Paiement/historique');
		$this->load->view('templates/footer');



		}else{
			redirect(base_url() . 'Admin/login');
		}

	}
	public function detail(){
			if($this->check_session()){
				$userdata=$this->userdata();

		$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/Paiement/detail');
		$this->load->view('templates/footer');



		}else{
	redirect(base_url() . 'Admin/login');
	}
	}

	public function annoncecreation(){
				if($this->check_session()){
					$userdata=$this->userdata();

					$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/Annonce/annoncecreation');
		$this->load->view('templates/footer');



				}else{
					redirect(base_url() . 'Admin/login');
				}

	}
	public function upcoming(){
					if($this->check_session()){
						$userdata=$this->userdata();

						$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/Annonce/upcoming');
		$this->load->view('templates/footer');



					}else{
						redirect(base_url() . 'Admin/login');
					}

	}
	public function detailevent(){
						if($this->check_session()){
							$userdata=$this->userdata();

		$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/Annonce/detailevent');
		$this->load->view('templates/footer');



						}else{
							redirect(base_url() . 'Admin/login');
						}

	}
	public function leaverequest(){
				if($this->check_session()){
				$userdata=$this->userdata();
		$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/congee/Viewrequest');
		$this->load->view('templates/footer');


		}else{
		redirect(base_url() . 'Admin/login');
		}

	}
	public function detailcongee(){
			if($this->check_session()){
			$userdata=$this->userdata();
		$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/congee/detail');
		$this->load->view('templates/footer');


		}else{
		redirect(base_url() . 'Admin/login');
		}

	}
	public function Availability(){
		if($this->check_session()){
		$userdata=$this->userdata();
		$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/congee/Availability');
		$this->load->view('templates/footer');


			}else{
			redirect(base_url() . 'Admin/login');
			}

	}

	public function profil(){
			if($this->check_session()){
			$userdata=$this->userdata();
     	$this->load->view('templates/header',array("user"=>$userdata));
		$this->load->view('Admin/profil');
		$this->load->view('templates/footer');


			}else{
			redirect(base_url() . 'Admin/login');
		}

	}

public function ajax_uploadstudent (\http\Env\Request $request)
{

$img=$request->pos;

	$config['upload_path']          =base_url().'assets/upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = '30000';
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($img))
		{
			$error = array('error' => $this->upload->display_errors());

			//$this->load->view('upload_form', $error);
			print_r($error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			//$this->load->view('upload_success', $data);
			print_r($data);
		}



}
	/*public function do_upload()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image_file'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}*/


	public function ajax_list()
	{

		$uri=base_url();
				//$img='<img src="'+uri+.'upload/'+data.picture+'" width="300" height="225" class="img-thumbnail" />';

		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			//'<img src="'.base_url().'upload/'.$person->picture.'" width="300" height="225" class="img-thumbnail" />';
			//
			$row = array();
			//$row[] = '<img src="'.site_url().'assets/upload/'.$person->picture.'" width="300" height="225" class="img-thumbnail" />';
			$row[] = $person->firstName;
			$row[] = $person->lastName;
			$row[] = $person->gender;
			$row[] = $person->address;
			$row[] = $person->dob;
			$row[] = $person->telephone;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class=" icon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class=" icon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->person->count_all(),
			"recordsFiltered" => $this->person->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();

		//chager la bib upload
		/*$img="";
		if(isset($_FILES["image_file"]["name"])){
			$img=$_FILES["image_file"]["name"];

		}else{
			$img=$this->input->post('image_file');
		}*/

		$data = array(
			//'picture' => $img,
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
			'dob' => $this->input->post('dob'),
			'telephone' => $this->input->post('telephone'),

		);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		/*$data1=array();
		$field_name = $this->input->post('image_file');

		$this->_validate();
		$config['upload_path'] = '.assets/upload/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($field_name))
		{
			echo $this->upload->display_errors();
		}
		else
		{
			$data1 = $this->upload->data();

			//echo '<img src="'.base_url().'assets/upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
		}


		//$img=$data1["file_name"];
		/*if(isset($_FILES["image_file"]["name"])){
			$img=$_FILES["image_file"]["name"];



		}else{
			$img=$this->input->post('image_file');
		}*/


		$data = array(
			//'picture' => ajax_upload(),
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
			'dob' => $this->input->post('dob'),
			'telephone' => $this->input->post('telephone'),

		);
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		

		if($this->input->post('firstName') == '')
		{
			$data['inputerror'][] = 'firstName';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('telephone') == '')
		{
			$data['inputerror'][] = 'telephone';
			$data['error_string'][] = 'Phone is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('lastName') == '')
		{
			$data['inputerror'][] = 'lastName';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('dob') == '')
		{
			$data['inputerror'][] = 'dob';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('gender') == '')
		{
			$data['inputerror'][] = 'gender';
			$data['error_string'][] = 'Please select gender';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function save()
	{
		//Setting values for tabel columns
		$data = array(
		'destinataire' => $this->input->post('destinataire'),
		'message' => $this->input->post('message'),
		'sujet' => $this->input->post('sujet'),
		);
		//Transfering data to Model
		$this->m->form_insert($data);
		$data['message'] = 'Data Inserted Successfully';

		//Loading View
		if($this->check_session()){
					$userdata=$this->userdata();

					$this->load->view('templates/header',array("user"=>$userdata));
				$this->load->view('Admin/Mail/ajoutmail', $data);
				$this->load->view('templates/footer');


				}else{
					redirect(base_url() . 'Admin/login');
				}

	}

	function delete_all()
	{
		if($this->input->post('checkbox_value'))
	  {
	   $id = $this->input->post('checkbox_value');
	   for($count = 0; $count < count($id); $count++)
	   {
	    $this->m->delete($id[$count]);
	   }
	  }
	}

    public function ajax_listparent()
    {

		$uri=base_url();
				//$img='<img src="'+uri+.'upload/'+data.picture+'" width="300" height="225" class="img-thumbnail" />';

		$list = $this->p->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $p) {
			$no++;
			//'<img src="'.base_url().'upload/'.$person->picture.'" width="300" height="225" class="img-thumbnail" />';
			//
			$row = array();
			//$row[] = '<img src="'.site_url().'assets/upload/'.$person->picture.'" width="300" height="225" class="img-thumbnail" />';
			$row[] = $p->firstName;
			$row[] = $p->lastName;
			$row[] = $p->gender;
			$row[] = $p->address;
			$row[] = $p->dob;

			$row[] = $p->telephone;



			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_parent('."'".$p->id."'".')"><i class=" icon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_parent('."'".$p->id."'".')"><i class=" icon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->p->count_all(),
			"recordsFiltered" => $this->p->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_editparent($id)
	{
		$data = $this->p->get_by_id($id);
		$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_addparent()
	{
		$this->_validate_parent();
		$data = array(
			//'picture' => $img,
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
			'dob' => $this->input->post('dob'),
			'telephone' => $this->input->post('telephone'),

		);
		$insert = $this->p->save($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_updateparent()
	{
		$data = array(
			//'picture' => ajax_upload(),
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
			'dob' => $this->input->post('dob'),
			'telephone' => $this->input->post('telephone'),

		);
		$this->p->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_deleteparent($id)
	{
		$this->p->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


private function _validate_parent()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		

		if($this->input->post('firstName') == '')
		{
			$data['inputerror'][] = 'firstName';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('telephone') == '')
		{
			$data['inputerror'][] = 'telephone';
			$data['error_string'][] = 'Phone is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('lastName') == '')
		{
			$data['inputerror'][] = 'lastName';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('dob') == '')
		{
			$data['inputerror'][] = 'dob';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('gender') == '')
		{
			$data['inputerror'][] = 'gender';
			$data['error_string'][] = 'Please select gender';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function ajax_liststudent()
	{

		$uri=base_url();
				//$img='<img src="'+uri+.'upload/'+data.picture+'" width="300" height="225" class="img-thumbnail" />';

		$list = $this->s->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $s) {
			$no++;
			//'<img src="'.base_url().'upload/'.$person->picture.'" width="300" height="225" class="img-thumbnail" />';
			//
			$row = array();
			//$row[] = '<img src="'.site_url().'assets/upload/'.$person->picture.'" width="300" height="225" class="img-thumbnail" />';
			$row[] = $s->firstName;
			$row[] = $s->lastName;
			$row[] = $s->gender;
			$row[] = $s->address;
			$row[] = $s->dob;




			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_student('."'".$s->id."'".')"><i class=" icon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_student('."'".$s->id."'".')"><i class=" icon-trash"></i> Delete</a>
                  <a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="Dossier Upload" onclick="Upload_student('."'".$s->id."'".')"><i class="  icon-cloud-upload"></i> Fold Upload</a>
';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->s->count_all(),
			"recordsFiltered" => $this->s->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_editstudent($id)
	{
		$data = $this->s->get_by_id($id);
		$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_addstudent()
	{
		$this->_validate_student();

		//chager la bib upload
		/*$img="";
		if(isset($_FILES["image_file"]["name"])){
			$img=$_FILES["image_file"]["name"];

		}else{
			$img=$this->input->post('image_file');
		}*/

		$data = array(
			//'picture' => $img,
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
			'dob' => $this->input->post('dob'),

		);
		$insert = $this->s->save($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_updatestudent()
	{
		/*$data1=array();
		$field_name = $this->input->post('image_file');

		$this->_validate();
		$config['upload_path'] = '.assets/upload/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($field_name))
		{
			echo $this->upload->display_errors();
		}
		else
		{
			$data1 = $this->upload->data();

			//echo '<img src="'.base_url().'assets/upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
		}


		//$img=$data1["file_name"];
		/*if(isset($_FILES["image_file"]["name"])){
			$img=$_FILES["image_file"]["name"];



		}else{
			$img=$this->input->post('image_file');
		}*/


		$data = array(
			//'picture' => ajax_upload(),
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
			'dob' => $this->input->post('dob'),

		);
		$this->s->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_deletestudent($id)
	{
		$this->s->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	


private function _validate_student()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		

		if($this->input->post('firstName') == '')
		{
			$data['inputerror'][] = 'firstName';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}
	

		if($this->input->post('lastName') == '')
		{
			$data['inputerror'][] = 'lastName';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('dob') == '')
		{
			$data['inputerror'][] = 'dob';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('gender') == '')
		{
			$data['inputerror'][] = 'gender';
			$data['error_string'][] = 'Please select gender';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
