<?php
// Copyright 2015 National Marrow Donor Program (NMDP)

// This file is part of GTR Typing Forms.

// GTR Typing Forms is free software: you can redistribute it and/or modify
//     it under the terms of the GNU Lesser General Public License as published by
//     the Free Software Foundation, either version 3 of the License, or
//     (at your option) any later version.

//     This program is distributed in the hope that it will be useful,
//     but WITHOUT ANY WARRANTY; without even the implied warranty of
//     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//     GNU Lesser General Public License for more details.

//     You should have received a copy of the GNU Lesser General Public License
//     along with this program.  If not, see <http://www.gnu.org/licenses/>.

class Form extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Kit_model');
	}

	public function index()
	{
	$selected_form = $this->input->post('form_select');
	if ($selected_form == 'kit')
	{
		$this->load->view('header');		
		$this->load->view('kit_form');
	}
	elseif ($selected_form == 'vendor')
	{
		$this->load->view('header');
		$this->load->view('vendor_form');
	}
	else
	{
		$this->load->view('header');
		$this->load->view('form_placeholder');
	}
	}

	public function get_genes()
	{
		$genes = $this->Kit_model->get_genes();
		$genes = json_encode($genes);
		$this->output
			->set_content_type('application/json')
			->set_output($genes);

	}

	public function get_platforms()
	{
		$platforms = $this->Kit_model->get_platforms();
		$platforms = json_encode($platforms);
		$this->output
			->set_content_type('application/json')
			->set_output($platforms);

	}

	public function get_category()
	{
		$category = $this->Kit_model->get_category();
		$category = json_encode($category);
		$this->output
			->set_content_type('application/json')
			->set_output($category);
	}
	
	public function get_method()
	{
		$method = $this->Kit_model->get_method();
		$method = json_encode($method);
		$this->output
			->set_content_type('application/json')
			->set_output($method);
	}

	public function get_instruments()
	{
		$instruments = $this->Kit_model->get_instruments();
		$instruments = json_encode($instruments);
		$this->output
			->set_content_type('application/json')
			->set_output($instruments);
	}

	public function get_purpose()
	{
		$purpose = $this->Kit_model->get_purpose();
		$purpose = json_encode($purpose);
		$this->output
			->set_content_type('application/json')
			->set_output($purpose);
	}

	public function get_condition()
	{
		$condition = $this->Kit_model->get_diseased();
		$condition = json_encode($condition);
		$this->output
			->set_content_type('application/json')
			->set_output($condition);
	}

	public function get_imgt_hla_versions()
	{
		$imgt_hla_versions = $this->Kit_model->get_imgt_hla_versions();
		$imgt_hla_versions = json_encode($imgt_hla_versions);
		$this->output
			->set_content_type('application/json')
			->set_output($imgt_hla_versions);
	}		
		
}
?>