<html>
<!-- Copyright 2015 National Marrow Donor Program (NMDP)

This file is part of GTR Typing Forms.

GTR Typing Forms is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>. -->
<script src="<?php echo base_url('assets/js/jquery-2.1.4.js');?>"></script>
<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
<script src="http://localhost/GTR/assets/js/bootstrap.min.js"></script>
<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('assets/jquery-validation/lib/jquery.mockjax.js');?>"></script>
<script src="<?php echo base_url('assets/jquery-validation/lib/jquery.form.js');?>"></script>
<script src="<?php echo base_url('assets/jquery-validation/dist/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/jquery-validation/dist/additional-methods.js');?>"></script>
<script src="<?php echo base_url('assets/js/selectize.min.js');?>"></script>
<link href="<?php echo base_url('assets/css/selectize.bootstrap3.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/views-css/kit_form.css');?>" rel="stylesheet">
<!-- this allows the external js file to use base_url variable, since external js file is not a php file and cannot echo base url-->
<script type='text/javascript'>var base_url = '<?php echo base_url();?>';</script> 
<script src="<?php echo base_url('assets/js/views-js/kit_form.js');?>"></script>



<div class="container" style='margin-top:90px;'>

</br>
<legend>HLA Typing Kit Form</legend>
</br>
<p class='col-md-2'></p>
<p class='col-md-8'><small>This form is for HLA Typing Kit xml submission generation for the Genetic Testing Registry. Do not use this for other types of kits, it has fixed variables specific to HLA typing.</small></p>
<p class='col-md-2'></p>

<div style="margin-left:20%;margin-top:10px;margin-right:20%;" >
<form id="kit_form" class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="kit_xml">
<form class="form-horizontal" role="form">

	<legend><span class='legend'>Kit Information</span><button type='button' class='btn btn-info btn-xs' style='float:right;' data-toggle='popover' data-trigger='focus' title='Kit Information' data-content='Fill out fields about the kit'>
		<small>section instructions</small></button></legend>

	

	<div class='form-group'>
		<label for='name' class='control-label col-sm-3'>*Kit Name:</label> 
		<div class='col-sm-9'>
			<input type='text' name='name' class='form-control' required/>
		</div>
	</div>

	<div id='othername_container'></div><br/>
	<div class='col-sm-3'>
		<button type='button' id='add_other_name_button' class='btn btn-block'>Add Other Name</button>
	</div><br/><br/>

	
	
	<!-- fixed values now -->
	<!-- <div class='form-group'>
		<label for='purpose' class='control-label col-sm-3'>*Purpose(s):</label>
		<div class='col-sm-9'>
			<input name='purpose' id='purpose' class='form-control' placeholder='What is the purpose of the kit?' required/>
		</div>
	</div> -->
		
	<!-- <div class='form-group'>
		<label for='condition' class='control-label col-sm-3'>*Conditions:</label> 
		<div class='col-sm-9'>
			<input id='condition_input' class='form-control' placeholder='For which condition(s) is the test offered?' type='text' name='condition[]' required/>
		</div>
	</div> -->
	
	<legend><span class='legend'>Methodology</span><button style='float:right;' type='button' class='btn btn-xs btn-info' data-toggle='popover' data-trigger='focus' title='Methodology' data-content='Enter the category of the methodology used.
	Then specify any primary methodologies used within that category. List any instruments used for that type of method. If you cannot find the primary methodology or instrument, you may add a new one.
	Click the "+" to add more fields if there are more methods or instruments used. 
	Choose any platforms used in the test. Then describe the pipeline/procedure for the entire test, in as much detail as possible.'><small>section instructions</small></button></legend>

	

	<div class='form-group'>
		<label for='category' class='control-label col-sm-3'>*Major Method and Method Category:</label> 
		<div class='col-sm-9'>
			<select multiple id='category' class='form-control' name='category[]' required>
		</select>
		</div>
	</div>

	<div id='method_instr_indent' style='margin-left: 10%'>

	<div class='form-group'>
		<label for='primary_method' class='control-label col-sm-3'>*Primary Kit Methodology:</label> 
		<div class='col-sm-9'>
			<input type='text' id='primary_method' class='form-control' name='primary_method0[]' required/>
		</div>
	</div>

	<div class='form-group'>
		<label for='instrument' class='control-label col-sm-3'>Instrument(s) Used:</label> 
		<div class='col-sm-9'>
			<input type='text' id='instrument' class='form-control' name='instrument0[]' />
		</div>
	</div>

	<div id='methodology_container_0'></div>	<br/>
	<button type="button" id='methodology_add_button' class='btn'><i class='fa fa-plus-square'></i></button><label><small> Add Another Primary Methodology To This Category</small></label>


	</div>  <!-- ends indented div -->

	<div id="the_category_container"></div>	<br/>
	<button type="button" id="mybutton" class="btn"><i class="fa fa-plus-square"></i></button><label><small> Add Another Category</small></label>

	 
	
	<div class='form-group'>
		<label for='platform' class='control-label col-sm-3'>Platform(s) Used:</label> 
		<div class='col-sm-9'>
			<input type='text' id='platform' class='form-control' name='platform' />
		</div>
	</div>	
	
	<div class='form-group'>
		<label for='procedure' class='control-label col-sm-3'>Kit Procedure/Protocol:</label> 
		<div class='col-sm-9'>
			<textarea id='procedure' class='form-control' placeholder='Describe pipeline here' name='procedure'></textarea>
		</div>
	</div>



	<br/><br/>
	<legend><span class='legend'>Test Targets</span><button style='float:right;' type='button' class='btn btn-xs btn-info' data-toggle='popover' data-trigger='focus' title='Test Targets' data-content='Enter test target
	information here. One target per entry, add additional targets by clicking the "+" button.'><small>section instructions</small></button></legend>

	
<!-- 	<div class='form-group'>
	<label for='target' class='control-label col-sm-3'>*Kit target:</label>
		<div class='col-sm-9'>
			<label class='radio-inline'><input type='radio' name='target' value='germline' checked='checked' required>Germline</label>
			<label class='radio-inline'><input type='radio' name='target' value='somatic'>Somatic</label>
			<label class='radio-inline'><input type='radio' name='target' value='uncertain'>Both</label>
		</div>
	</div> -->
	
	<div class='form-group'>
		<label for='test_measure' class='control-label col-sm-3'>*Category of the analyte being tested:</label> 
		<div class='col-sm-9'>
			<select id='test_measure' class='form-control' name='test_measure[]' required>
			<option></option>
			<option value='Analyte'>Analyte</option>
			<option value='Chomosomal region/mitochondrion'>Chromosomal region/mitochondrion</option>
			<option value='Gene'>Gene</option>
			<option value='Protein'>Protein</option>
		</select>
		</div>
	</div>
	
	<div class='form-group'>
		<label for='gene' class='control-label col-sm-3'>*Gene:</label> 
		<div class='col-sm-9'>
			<input type='text' id='gene' class='form-control' name='gene[]' placeholder='Enter gene symbol' required/>
		</div>
	</div>
	

	<div class='form-group'>
		<label for='reference_sequence' class='control-label col-sm-3'>Associated Reference Sequence:</label> 
		<div class='col-sm-9'>
			<input type='text' id='reference_sequence' class='form-control' name='reference_sequence[]' />
		</div>
	</div>
	
	<div class='form-group'>
		<label for='exon' class='control-label col-sm-3'>Exon(s):</label>
		<div class='col-sm-9'>
			<input type='text' id='exon' name='exon[]' class='form-control' />
		</div>
	</div>
	
	<div class='form-group'>
		<label for='chromosome_region' class='control-label col-sm-3'>Chromosomal Region/Mitocondrion(s):</label> 
		<div class='col-sm-9'>
			<input type='text' id='chromosome_region' class='form-control' name='chromosome_region[]' placeholder='RefSeq genomic ID, transcript ID, or DNA sequence variation display name'/>
		</div>
	</div>
	
	<div class='form-group'>
		<label for='protein' class='control-label col-sm-3'>Protein Name(s):</label> 
		<div class='col-sm-9'>
			<input type='text' id='protein' class='form-control' name='protein[]' placeholder='Protein Name(s)'/>
		</div>
	</div>
	
	<div id="target_container"></div>
	<br/>
	<button type="button" id="my_target_button" class="btn"><i class="fa fa-plus-square"></i></button><label><small> Add Another Test Target</small></label>
	<br/><br/>

	<legend><span class='legend'>Results</span><button style='float:right;' type='button' class='btn btn-xs btn-info' data-toggle='popover' data-trigger='focus' title='Results' data-content='Describe how 
		results are interpreted'><small>section instructions</small></button></legend>

	<div class='form-group'>
		<label for='imgt_hla_version' class='control-label col-sm-3'>*IMGT/HLA Version:</label> 
		<div class='col-sm-9'>
			<input type='text' id='imgt_hla_version' class='form-control' name='imgt_hla_version' required/>
		</div>
	</div>


	<div id='software_container'></div><br/>
	<div class='col-sm-3'>
		<button type="button" id='add_software_button' class='btn btn-block'>Add Software</button>
	</div><br/><br/>

	
	
	<div class='form-group'>
		<label for='interpreation' class='control-label col-sm-3'>Interpretation:</label> 
		<div class='col-sm-9'>
			<textarea id='interpretation' class='form-control' placeholder='What is the protocol for interpreting a variation as a variant of unknown significance(VUS)?' name='interpretation'></textarea>
		</div>
	</div>

	<div class='form-group'>
		<label for='vus_software' class='control-label col-sm-3'>VUS Software:</label> 
		<div class='col-sm-9'>
			<textarea id='vus_software' class='form-control' placeholder='What software is used to interpret novel variations?' name='vus_software'></textarea>
		</div>
	</div>


	<legend><span class='legend'>Validity and Quality</span><button style='float:right;' type='button' class='btn btn-xs btn-info' data-toggle='popover' data-trigger='focus' title='Validity' data-content='Describe analytical validity 
		and quality control in this section.'><small>section instructions</small></button></legend>


	<div class='form-group'>
		<label for='analytical_validity' class='control-label col-sm-3'>*Analytical Validity:</label> 
		<div class='col-sm-9'>
			<textarea id='analytical_validity' class='form-control' placeholder='Describe analytical validity' name='analytical_validity' required></textarea>
		</div>
	</div>

	<div class='form-group'>
		<label for='clinical_validity' class='control-label col-sm-3'>Clinical Validity:</label> 
		<div class='col-sm-9'>
			<textarea id='clinical_validity' class='form-control' placeholder='Describe the clinical validity' name='clinical_validity'></textarea>
		</div>
	</div>


	<div class='form-group'>
		<label for='assay_limitations' class='control-label col-sm-3'>Assay Limitations:</label> 
		<div class='col-sm-9'>
			<textarea id='assay_limitations' class='form-control' placeholder='Describe any limitations' name='assay_limitations'></textarea>
		</div>
	</div>
<!-- 	
	<legend><span class='legend'>Regulations</span><button style='float:right;' type='button' class='btn btn-xs btn-info' data-toggle='popover'
	 data-trigger='focus' title='Regulations' data-content='FDA/IRB regulations in this section'><small>section instructions</small></button></legend>
	 <p>This is not required for the schema -- we may not care about this for our use and thus may not even include it</p>


	 <div class='form-group'>
		<label for='fda_category' class='control-label col-sm-3'>FDA Category:</label> 
		<div class='col-sm-9'>
			<input type='text' id='fda_category' class='form-control' name='fda_category' />
		</div>
	</div> -->
	
	<legend><span class='legend'>Comments</span></legend>
	<div class='form-group'>
		<label for='probes' class='control-label col-sm-3'>Probes being tested:</label> 
		<div class='col-sm-9'>
			<input type='text' id='probes' class='form-control' name='probes' placeholder='Identify probes used in the kit'/>
		</div>
	</div>

	<div class='form-group'>
		<label for='kit_comment' class='control-label col-sm-3'>Kit Comment:</label> 
		<div class='col-sm-9'>
			<textarea id='kit_comment' class='form-control' placeholder='Provide additional details on the kit that cannot be explicitly stated anywhere else in this form' name='kit_comment'></textarea>
		</div>
	</div>
	
</br>
<center>
<input type="submit" class="btn btn-primary" value="Download XML File"/>
</center>
</br>
</br>
</div>
</form>
</div>
</html>