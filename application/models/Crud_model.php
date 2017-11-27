<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model 
{

	/* Get All Data */
	public function fetch($table,$where="",$limit="",$offset="",$order="")
	{
		if (!empty($where)) {
			$this->db->where($where);
		}

		if (!empty($limit)) {
			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);
			}
		}

		if (!empty($order)) {
			$this->db->order_by($order);
		}

		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}

	/* Select specific column */
	public function fetchTag($tag,$table,$where="",$limit="",$offset="",$order="")
	{
		if (!empty($where)) {
			$this->db->where($where);
		}

		if (!empty($limit)) {

			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);
			}
		}

		if (!empty($order)) {

			$this->db->order_by($order);
		}

		$this->db->select($tag);
		$this->db->from($table);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}


	/* Select specific column & rows */
	public function fetchTagRow($tag,$table,$where="",$limit="",$offset="",$order="")
	{
		if (!empty($where)) {
			$this->db->where($where);
		}

		if (!empty($limit)) {

			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);
			}
		}

		if (!empty($order)) {
			$this->db->order_by($order);
		}

		$this->db->select($tag);
		$this->db->from($table);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}

	/* Insert Data */
	public function insert($table,$data)
	{
		$result = $this->db->insert($table,$data);

		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}


	/* Update Data */
	public function update($table,$data,$where="")
	{
		if($where!="") {
			$this->db->where($where);
		}

		$result = $this->db->update($table,$data);

		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	/* Delete Data */
	public function delete($table,$where="")
	{
		if($where!=""){
			$this->db->where($where);
		}

	 	$result = $this->db->delete($table);

 		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
