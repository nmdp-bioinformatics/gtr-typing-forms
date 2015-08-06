<?php
// Copyright 2015 National Marrow Donor Program (NMDP)

// This file is part of HGTR.

// HGTR is free software: you can redistribute it and/or modify
//     it under the terms of the GNU Lesser General Public License as published by
//     the Free Software Foundation, either version 3 of the License, or
//     (at your option) any later version.

//     This program is distributed in the hope that it will be useful,
//     but WITHOUT ANY WARRANTY; without even the implied warranty of
//     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//     GNU Lesser General Public License for more details.

//     You should have received a copy of the GNU Lesser General Public License
//     along with this program.  If not, see <http://www.gnu.org/licenses/>.
class Kit_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_genes()
	{
		$sql = 'SELECT ENTREZ_GENE_ID,SYMBOL FROM HUMAN_GENE';
		$query = $this->db->query($sql);
		return $query->result();
	}		
	function get_platforms()
	{
		$sql = 'SELECT PLATFORM FROM PLATFORM';
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_category()
	{
		$sql = 'SELECT MAJOR_METHOD,METHOD,INPUT_VALUE as value FROM CATEGORY';
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_method() 
	{
		$sql = 'SELECT PRIMARY_METHODOLOGY as method FROM METHOD';
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_instruments()
	{
		$sql = 'SELECT INSTRUMENT FROM INSTRUMENT';
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_purpose()
	{
		$sql = 'SELECT PURPOSE FROM PURPOSE';
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_diseased()
	{
		$sql = 'SELECT NAME FROM DISEASE';
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_imgt_hla_versions()
	{
		$sql = 'SELECT VERSION FROM IMGT_HLA_META';
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_gene_id($gene_symbol)
	{
		$sql = 'SELECT ENTREZ_GENE_ID FROM HUMAN_GENE WHERE SYMBOl = ?';
		$query = $this->db->query($sql, array($gene_symbol));
		return $query->row_array();
	}
	function check_instruments($instrument)
	{
		$sql = 'SELECT * FROM INSTRUMENT WHERE INSTRUMENT=?';
		$query = $this->db->query($sql, array($instrument));
		return $query->row_array();
	}
	function check_method($primary_method)
	{
		$sql = 'SELECT * FROM METHOD WHERE PRIMARY_METHODOLOGY=?';
		$query = $this->db->query($sql, array($primary_method));
		return $query->row_array();
	}
	function check_platform($platform)
	{
		$sql = 'SELECT * FROM PLATFORM WHERE PLATFORM = ?';
		$query = $this->db->query($sql, array($platform));
		return $query->row_array();
	}
}
?>