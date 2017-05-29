<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_image extends CI_model {

	function __construct()
	{
		parent::__construct();
		$this->table = 'data_image';
	}

	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	function select()
	{
		$query = $this->db->get($this->table);

		return $query->result_array();
	}

	function update($data, $id)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table, $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	function count_row()
	{
		$query = $this->db->get($this->table);

		return $query->num_rows();
	}
}
