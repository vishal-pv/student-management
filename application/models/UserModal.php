<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModal extends CI_Model {


public function createData($data)
{
    $query= $this->db->insert('user',$data);
    return $query;
}

public function fetchAllData($data,$table,$where)
{
	$query= $this->db->select($data)
	                 ->from($table)
	                 ->where($where)
	                 ->get();

	        return $query->result_array();
}

  public function fetchSingleData($data,$table,$where)
{
	$query= $this->db->select($data)
	                 ->from($table)
	                 ->where($where)
	                 ->get();

	        return $query->row_array();
}
public function updateData($table, $data, $where)
	{
		$query = $this->db->update($table,$data,$where);
		return $query;
	}

	public function deleteData($tablename,$where)
	{
		$query = $this->db->delete($tablename,$where);
		return $query;
	}

	// public function average($table)
	// {
	// 	$this->db->select_avg('percentage');
 //       $query = $this->db->get('user');
 //       print_r($query); 
	// }
}

?>