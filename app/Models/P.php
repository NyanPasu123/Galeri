<?php

namespace App\Models;
use CodeIgniter\Model;

class P extends Model
{

public function getwhere($table, $where)
{
	return $this->db->table($table)
					->getWhere($where)
					->getRow();
}
public function bebas($terserah)
{
	return $this->db->table($terserah)
					->get()
					->getResult();
	}
}