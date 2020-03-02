<?php

class Loginmodel extends CI_Model {

	public function getdata($uname,$pwd){
		$q = $this->db->where(['uname'=>$uname, 'pwd'=>$pwd])->get('users');

		if($q->num_rows())
		{
		return $q->row()->id;
		}
		else{
			return false;
		}
	}
	public function articlelist($limit,$offset)
	{
		$id=$this->session->userdata('id');
		$q= $this->db->select()
				->from('articlelist')
				->where(['user_id'=>$id])
				->limit($limit,$offset)
				->get();
				return $q->result();
	}
	public function insertdata($array)
	{
		return $this->db->insert('users',$array);

	}
	public function addarticles($array)
	{
	return $this->db->insert('articlelist', $array);
	}
	public function delete($id)
	{
		return $this->db->delete('articlelist',['id'=>$id]);
	}

	public function num_rows()
	{
		$id = $this->session->userdata('id');
		$q= $this->db->select()
		->from('articlelist')
			->where(['user_id'=>$id])
			->get();
			return $q->num_rows();
	}
	public function editarticle($id)
	{
		$q=$this->db->select(['article_title','article_body','id'])
					->where(['id'=>$id])
					->get('articlelist');
		return $q->row();
	}
	public function updatearticle($id, array $post)
	{
	return	$this->db->where('id',$id)
				 ->update('articlelist',$post);
	}
}
