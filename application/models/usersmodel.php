<?php

class Usersmodel extends CI_Model {
	public function feedbackdata($data)
	{
		return $this->db->insert('feedback',$data);
	}
	public function getfeedback()
	{
		$q=	$this->db->select()
					 ->from('feedback')
				   	 ->get();
			return $q->result();
	}
	public function editfeedback($id)
	{
		$q = $this->db->select()
		          	  ->where(['id'=>$id])
		          	  ->get('feedback');
		          	  return $q->row();
	}
	public function updatefeedback($id, array $post)
	{
		
		return $this->db->where('id',$id)->update('feedback',$post);
		
	}
	public function deletefeed($id)
	{
		return $this->db->where(['id'=>$id])->delete('feedback');
	}
	public function getarticles()
	{
		$query=	$this->db->select()->from('articlelist')->get();
		return $query->result();
	}
}
