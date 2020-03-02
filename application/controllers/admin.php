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

	public function index()
	{
		if($this->session->userdata('id'))
		{
			return redirect('admin/welcome');
		}
	 		$this->form_validation->set_rules('uname','User name','required|alpha');
			$this->form_validation->set_rules('pwd', 'password', 'required');
		    if($this->form_validation->run())
					 {
						$uname =  $this->input->post('uname');
						$pwd = $this->input->post('pwd');
						$id = $this->loginmodel->getdata($uname, $pwd);
						 if($id){
									 $this->load->library("session");
									 $this->session->set_userdata("id",$id);
									 return redirect('admin/welcome');
								 }
						 else
						 {
							 $this->session->set_flashdata('Login_Failed','invalid data');	
							 return redirect ('admin/index');
						 }
					 }
	 		else
	 		{
		 		$this->load->view('admin/login');
	 		}
	}
	public function welcome()
	{
		
		if(!$this->session->userdata('id')){
			return redirect('admin/index');
		}
					$this->load->library('pagination');

		$config=[
			'base_url'=> base_url('admin/welcome'),
			'per_page' => 5,
			'total_rows' => $this->loginmodel->num_rows(),
		];

		$this->pagination->initialize($config);


		$articles = $this->loginmodel->articlelist($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/dashboard',['articles'=>$articles]);
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		redirect ('admin/index');
	}

	public function signup()
	{
		
		if($this->form_validation->run('add_users_rules'))
		{
			$post = $this->input->post();
			if($this->loginmodel->insertdata($post))
			{
				$this->session->set_flashdata('userreg','User registered successfully. Please login');
				redirect ('admin/index');
			}
			else
			{
				$this->session->set_flashdata('userreg', 'user register not success');
			redirect ('admin/index');
			}
			//return redirect('admin/index');
		}
		else
		{
					$this->load->view('admin/signup');	

		}
	}
	public function addarticle()
	{
		$config =[
						'upload_path' => './uploads/',
						'allowed_types' => 'gif|jpg|png',

			];
			$this->load->library('upload',$config);
		if($this->form_validation->run('add_article_rules') && $this->upload->do_upload('article_img'))
		{
			$post = $this->input->post();
			$data = $this->upload->data();
			$image_path=base_url('uploads/'.$data['raw_name'].$data['file_ext']);
			$post['image_path']=$image_path;
			if($this->loginmodel->addarticles($post))
			{
				$this->session->set_flashdata('articleadding','Article added successfully');
				$this->session->set_flashdata('msg_class', 'alert-success');
			}
			else
			{
				$this->session->set_flashdata('articleadding', 'Article not added successfully');
				$this->session->set_flashdata('msg_class', 'alert-danger');	
			}
			 return redirect('admin/welcome');
		}		
		else
		{
			$upload_error=$this->upload->display_errors();
			$this->load->view('admin/add_articles',compact('upload_error'));
		}
		
	}

	public function articledelet()
	{
		$id =$this->input->post('id'); 
		if($this->loginmodel->delete($id))
		{
				$this->session->set_flashdata('articleadding','Article deleted successfully');
				$this->session->set_flashdata('msg_class', 'alert-success');
			}
			else
			{
				$this->session->set_flashdata('articleadding', 'Article not delted successfully');
				$this->session->set_flashdata('msg_class', 'alert-danger');	
			}
			 return redirect('admin/welcome');

	}
	public function updatearticle()
	{

		if($this->form_validation->run('add_article_rules'))
		{
			$post = $this->input->post();
				$id = $this->input->post('id');
			if($this->loginmodel->updatearticle($id,$post))
			{
				$this->session->set_flashdata('articleadding','Article updated successfully');
				$this->session->set_flashdata('msg_class', 'alert-success');
			}
			else
			{
				$this->session->set_flashdata('articleadding', 'Article not updated successfully');
				$this->session->set_flashdata('msg_class', 'alert-danger');	
			}
			 return redirect('admin/welcome');
		}		
		else
		{
			$this->load->view('admin/editarticles');
		}
	}

	public function editarticle($id)
	{
		$data = $this->loginmodel->editarticle($id);
		$this->load->view('admin/editarticles',['article'=>$data]);
	}
}
