<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$data = $this->usersmodel->getarticles();
		$this->load->view('users/articlelist',['data'=>$data]);
	}
	public function feedback()
	{
		log_message('info', 'feedback method called');
		$data = $this->usersmodel->getfeedback();
		$this->load->view('users/feedback',['data'=>$data]);
	}
	public function addfeedback()
	{
		if($this->form_validation->run('add_feedback_rules'))
		{
		$data = $this->input->post();
			if($this->usersmodel->feedbackdata($data))
			{
			 $this->session->set_flashdata('feedback','Feed back inserted successfuly');
			return redirect('users/feedback');
			}
			else
			{
				$this->session->set_flashdata('feedback','Feed back not inserted');
				return redirect('users/addfeedback');
			}

		}
		else
		{
		$this->load->view('users/addfeedback');
		}
	}
	public function editfeedback($id)
	{
		$data = $this->usersmodel->editfeedback($id);
		$this->load->view('users/editfeedback',['data'=>$data]);
	}
	public function updatefeedback()
	{
		
		
			$post = $this->input->post();
			$id = $this->input->post('id');
			if($this->usersmodel->updatefeedback($id,$post))
			{
				$this->session->set_flashdata('feedback','Feed back updated successfuly');
				return redirect('users/feedback');
			}
			else
			{
				$this->session->set_flashdata('feedback','Feedback not updated');
				return redirect('users/feedback');
			}
		

	}
	public function deletefeed($id)
	{
		
		if($this->usersmodel->deletefeed($id))
		{
			$this->session->set_flashdata('feedback','Feed back deleted successfuly');
			return redirect('users/feedback');
		}
		else
			{
				$this->session->set_flashdata('feedback','Feedback not deleted');
				return redirect('users/feedback');
			}
	}
}
