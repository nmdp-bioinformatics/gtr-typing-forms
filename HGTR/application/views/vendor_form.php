<html>
<!-- Copyright 2015 National Marrow Donor Program (NMDP)

This file is part of HGTR.

HGTR Typing Forms is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>. -->
<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/jquery-validation/lib/jquery.mockjax.js');?>"></script>
<script src="<?php echo base_url('assets/jquery-validation/lib/jquery.form.js');?>"></script>
<script src="<?php echo base_url('assets/jquery-validation/dist/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/jquery-validation/dist/additional-methods.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.bootstrap3.min.css" rel="stylesheet">


<div class="container" id="maindiv">

</br>
<legend>Vendor Submission Form</legend>
</br>

<div style="margin-left:20%;margin-top:20px;margin-right:20%;" >

<form id="vendor_form" class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="vendor_xml">

	<legend>Vendor Name</legend>
	
	<div class="form-group">
		<label for="name_of_vendor" class="control-label col-sm-3">*Name of Vendor:</label> 
		<div class="col-sm-9">
			<input type="text" name="name_of_vendor" class="form-control" required/>
		</div>
	</div>
	
	</br>
	<legend>Vendor Address</legend>

	<div class="form-group">
		<label for="address_line_1" class="control-label col-sm-3">Address:</label>
		<div class="col-sm-9">
			<input type="text" name="address_line_1" class="form-control" />
		</div>
	</div>
	
	<div class="form-group">
		<label for="address_line_2" class="control-label col-sm-3">Address Line 2:</label>
		<div class="col-sm-9">
			<input type="text" name="address_line_2" class="form-control" />
		</div>
	</div><div class="form-group">
		<label for="address_line_3" class="control-label col-sm-3">Address Line 3:</label>
		<div class="col-sm-9">
			<input type="text" name="address_line_3" class="form-control" />
		</div>
	</div>
	
	<div class="form-group">
		<label for="city" class="control-label col-sm-3">*City:</label>
		<div class="col-sm-9">
			<input type="text" name="city" class="form-control" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="state" class="control-label col-sm-3">*State:</label>
		<div class="col-sm-9">
			<input type="text" name="state" class="form-control" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="postal_code" class="control-label col-sm-3">*Postal Code:</label>
		<div class="col-sm-9">
			<input maxlength="10" name="postal_code" class="form-control" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="country" class="control-label col-sm-3">*Select Country:</label>
		<div class="col-sm-9">
		<select name="country" id="country" class="form-control">
		<option value="">Country...</option>
		<option value="Afganistan">Afghanistan</option>
		<option value="Albania">Albania</option>
		<option value="Algeria">Algeria</option>
		<option value="American Samoa">American Samoa</option>
		<option value="Andorra">Andorra</option>
		<option value="Angola">Angola</option>
		<option value="Anguilla">Anguilla</option>
		<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
		<option value="Argentina">Argentina</option>
		<option value="Armenia">Armenia</option>
		<option value="Aruba">Aruba</option>
		<option value="Australia">Australia</option>
		<option value="Austria">Austria</option>
		<option value="Azerbaijan">Azerbaijan</option>
		<option value="Bahamas">Bahamas</option>
		<option value="Bahrain">Bahrain</option>
		<option value="Bangladesh">Bangladesh</option>
		<option value="Barbados">Barbados</option>
		<option value="Belarus">Belarus</option>
		<option value="Belgium">Belgium</option>
		<option value="Belize">Belize</option>
		<option value="Benin">Benin</option>
		<option value="Bermuda">Bermuda</option>
		<option value="Bhutan">Bhutan</option>
		<option value="Bolivia">Bolivia</option>
		<option value="Bonaire">Bonaire</option>
		<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
		<option value="Botswana">Botswana</option>
		<option value="Brazil">Brazil</option>
		<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
		<option value="Brunei">Brunei</option>
		<option value="Bulgaria">Bulgaria</option>
		<option value="Burkina Faso">Burkina Faso</option>
		<option value="Burundi">Burundi</option>
		<option value="Cambodia">Cambodia</option>
		<option value="Cameroon">Cameroon</option>
		<option value="Canada">Canada</option>
		<option value="Canary Islands">Canary Islands</option>
		<option value="Cape Verde">Cape Verde</option>
		<option value="Cayman Islands">Cayman Islands</option>
		<option value="Central African Republic">Central African Republic</option>
		<option value="Chad">Chad</option>
		<option value="Channel Islands">Channel Islands</option>
		<option value="Chile">Chile</option>
		<option value="China">China</option>
		<option value="Christmas Island">Christmas Island</option>
		<option value="Cocos Island">Cocos Island</option>
		<option value="Colombia">Colombia</option>
		<option value="Comoros">Comoros</option>
		<option value="Congo">Congo</option>
		<option value="Cook Islands">Cook Islands</option>
		<option value="Costa Rica">Costa Rica</option>
		<option value="Cote DIvoire">Cote D'Ivoire</option>
		<option value="Croatia">Croatia</option>
		<option value="Cuba">Cuba</option>
		<option value="Curaco">Curacao</option>
		<option value="Cyprus">Cyprus</option>
		<option value="Czech Republic">Czech Republic</option>
		<option value="Denmark">Denmark</option>
		<option value="Djibouti">Djibouti</option>
		<option value="Dominica">Dominica</option>
		<option value="Dominican Republic">Dominican Republic</option>
		<option value="East Timor">East Timor</option>
		<option value="Ecuador">Ecuador</option>
		<option value="Egypt">Egypt</option>
		<option value="El Salvador">El Salvador</option>
		<option value="Equatorial Guinea">Equatorial Guinea</option>
		<option value="Eritrea">Eritrea</option>
		<option value="Estonia">Estonia</option>
		<option value="Ethiopia">Ethiopia</option>
		<option value="Falkland Islands">Falkland Islands</option>
		<option value="Faroe Islands">Faroe Islands</option>
		<option value="Fiji">Fiji</option>
		<option value="Finland">Finland</option>
		<option value="France">France</option>
		<option value="French Guiana">French Guiana</option>
		<option value="French Polynesia">French Polynesia</option>
		<option value="French Southern Ter">French Southern Ter</option>
		<option value="Gabon">Gabon</option>
		<option value="Gambia">Gambia</option>
		<option value="Georgia">Georgia</option>
		<option value="Germany">Germany</option>
		<option value="Ghana">Ghana</option>
		<option value="Gibraltar">Gibraltar</option>
		<option value="Great Britain">Great Britain</option>
		<option value="Greece">Greece</option>
		<option value="Greenland">Greenland</option>
		<option value="Grenada">Grenada</option>
		<option value="Guadeloupe">Guadeloupe</option>
		<option value="Guam">Guam</option>
		<option value="Guatemala">Guatemala</option>
		<option value="Guinea">Guinea</option>
		<option value="Guyana">Guyana</option>
		<option value="Haiti">Haiti</option>
		<option value="Hawaii">Hawaii</option>
		<option value="Honduras">Honduras</option>
		<option value="Hong Kong">Hong Kong</option>
		<option value="Hungary">Hungary</option>
		<option value="Iceland">Iceland</option>
		<option value="India">India</option>
		<option value="Indonesia">Indonesia</option>
		<option value="Iran">Iran</option>
		<option value="Iraq">Iraq</option>
		<option value="Ireland">Ireland</option>
		<option value="Isle of Man">Isle of Man</option>
		<option value="Israel">Israel</option>
		<option value="Italy">Italy</option>
		<option value="Jamaica">Jamaica</option>
		<option value="Japan">Japan</option>
		<option value="Jordan">Jordan</option>
		<option value="Kazakhstan">Kazakhstan</option>
		<option value="Kenya">Kenya</option>
		<option value="Kiribati">Kiribati</option>
		<option value="Korea North">Korea North</option>
		<option value="Korea Sout">Korea South</option>
		<option value="Kuwait">Kuwait</option>
		<option value="Kyrgyzstan">Kyrgyzstan</option>
		<option value="Laos">Laos</option>
		<option value="Latvia">Latvia</option>
		<option value="Lebanon">Lebanon</option>
		<option value="Lesotho">Lesotho</option>
		<option value="Liberia">Liberia</option>
		<option value="Libya">Libya</option>
		<option value="Liechtenstein">Liechtenstein</option>
		<option value="Lithuania">Lithuania</option>
		<option value="Luxembourg">Luxembourg</option>
		<option value="Macau">Macau</option>
		<option value="Macedonia">Macedonia</option>
		<option value="Madagascar">Madagascar</option>
		<option value="Malaysia">Malaysia</option>
		<option value="Malawi">Malawi</option>
		<option value="Maldives">Maldives</option>
		<option value="Mali">Mali</option>
		<option value="Malta">Malta</option>
		<option value="Marshall Islands">Marshall Islands</option>
		<option value="Martinique">Martinique</option>
		<option value="Mauritania">Mauritania</option>
		<option value="Mauritius">Mauritius</option>
		<option value="Mayotte">Mayotte</option>
		<option value="Mexico">Mexico</option>
		<option value="Midway Islands">Midway Islands</option>
		<option value="Moldova">Moldova</option>
		<option value="Monaco">Monaco</option>
		<option value="Mongolia">Mongolia</option>
		<option value="Montserrat">Montserrat</option>
		<option value="Morocco">Morocco</option>
		<option value="Mozambique">Mozambique</option>
		<option value="Myanmar">Myanmar</option>
		<option value="Nambia">Nambia</option>
		<option value="Nauru">Nauru</option>
		<option value="Nepal">Nepal</option>
		<option value="Netherland Antilles">Netherland Antilles</option>
		<option value="Netherlands">Netherlands (Holland, Europe)</option>
		<option value="Nevis">Nevis</option>
		<option value="New Caledonia">New Caledonia</option>
		<option value="New Zealand">New Zealand</option>
		<option value="Nicaragua">Nicaragua</option>
		<option value="Niger">Niger</option>
		<option value="Nigeria">Nigeria</option>
		<option value="Niue">Niue</option>
		<option value="Norfolk Island">Norfolk Island</option>
		<option value="Norway">Norway</option>
		<option value="Oman">Oman</option>
		<option value="Pakistan">Pakistan</option>
		<option value="Palau Island">Palau Island</option>
		<option value="Palestine">Palestine</option>
		<option value="Panama">Panama</option>
		<option value="Papua New Guinea">Papua New Guinea</option>
		<option value="Paraguay">Paraguay</option>
		<option value="Peru">Peru</option>
		<option value="Phillipines">Philippines</option>
		<option value="Pitcairn Island">Pitcairn Island</option>
		<option value="Poland">Poland</option>
		<option value="Portugal">Portugal</option>
		<option value="Puerto Rico">Puerto Rico</option>
		<option value="Qatar">Qatar</option>
		<option value="Republic of Montenegro">Republic of Montenegro</option>
		<option value="Republic of Serbia">Republic of Serbia</option>
		<option value="Reunion">Reunion</option>
		<option value="Romania">Romania</option>
		<option value="Russia">Russia</option>
		<option value="Rwanda">Rwanda</option>
		<option value="St Barthelemy">St Barthelemy</option>
		<option value="St Eustatius">St Eustatius</option>
		<option value="St Helena">St Helena</option>
		<option value="St Kitts-Nevis">St Kitts-Nevis</option>
		<option value="St Lucia">St Lucia</option>
		<option value="St Maarten">St Maarten</option>
		<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
		<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
		<option value="Saipan">Saipan</option>
		<option value="Samoa">Samoa</option>
		<option value="Samoa American">Samoa American</option>
		<option value="San Marino">San Marino</option>
		<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
		<option value="Saudi Arabia">Saudi Arabia</option>
		<option value="Senegal">Senegal</option>
		<option value="Serbia">Serbia</option>
		<option value="Seychelles">Seychelles</option>
		<option value="Sierra Leone">Sierra Leone</option>
		<option value="Singapore">Singapore</option>
		<option value="Slovakia">Slovakia</option>
		<option value="Slovenia">Slovenia</option>
		<option value="Solomon Islands">Solomon Islands</option>
		<option value="Somalia">Somalia</option>
		<option value="South Africa">South Africa</option>
		<option value="Spain">Spain</option>
		<option value="Sri Lanka">Sri Lanka</option>
		<option value="Sudan">Sudan</option>
		<option value="Suriname">Suriname</option>
		<option value="Swaziland">Swaziland</option>
		<option value="Sweden">Sweden</option>
		<option value="Switzerland">Switzerland</option>
		<option value="Syria">Syria</option>
		<option value="Tahiti">Tahiti</option>
		<option value="Taiwan">Taiwan</option>
		<option value="Tajikistan">Tajikistan</option>
		<option value="Tanzania">Tanzania</option>
		<option value="Thailand">Thailand</option>
		<option value="Togo">Togo</option>
		<option value="Tokelau">Tokelau</option>
		<option value="Tonga">Tonga</option>
		<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
		<option value="Tunisia">Tunisia</option>
		<option value="Turkey">Turkey</option>
		<option value="Turkmenistan">Turkmenistan</option>
		<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
		<option value="Tuvalu">Tuvalu</option>
		<option value="Uganda">Uganda</option>
		<option value="Ukraine">Ukraine</option>
		<option value="United Arab Erimates">United Arab Emirates</option>
		<option value="United Kingdom">United Kingdom</option>
		<option value="United States of America">United States of America</option>
		<option value="Uraguay">Uruguay</option>
		<option value="Uzbekistan">Uzbekistan</option>
		<option value="Vanuatu">Vanuatu</option>
		<option value="Vatican City State">Vatican City State</option>
		<option value="Venezuela">Venezuela</option>
		<option value="Vietnam">Vietnam</option>
		<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
		<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
		<option value="Wake Island">Wake Island</option>
		<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
		<option value="Yemen">Yemen</option>
		<option value="Zaire">Zaire</option>
		<option value="Zambia">Zambia</option>
		<option value="Zimbabwe">Zimbabwe</option>
		</select>
		</div>
	</div>

	
	
	<div class="form-group">
	<label for="public_address_choice" class="control-label col-sm-3">*Can this address be made public?</label>
		<div class="col-sm-9">
			<label class="radio-inline"><input type="radio" name="public_address_choice" value="true" required>Yes</label>
			<label class="radio-inline"><input type="radio" name="public_address_choice" value="false">No</label>
		</div>
	</div>
	
	<div class="form-group">
		<label for="phone" class="control-label col-sm-3">*Vendor Phone Number:</label>
		<div class="col-sm-9">
			<input name="phone" id="phone" class="form-control" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="vendor_email" class="control-label col-sm-3">*Vendor Email:</label>
		<div class="col-sm-9">
			<input type="email" name="vendor_email" class="form-control" data-error="Invalid email." required/>
			<div class="help-block with-errors"></div>
		</div>
	</div>
	
	</br>
	<legend>Personnel Information</legend>
	
	<div class="repeatingSection" id="repeat">
           
			
            
	
	<div class="form-group">
		<label for="personnel_first_name[]" class="control-label col-sm-3">*First Name:</label>
		<div class="col-sm-9">
			<input type="text" name="personnel_first_name[]" id="personnel_first_name[]"class="form-control" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="personnel_middle_initial[]" class="control-label col-sm-3">Middle Initial:</label>
		<div class="col-sm-9">
			<input type="text" name="personnel_middle_initial[]" id="personnel_middle_initial[]" class="form-control"/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="personnel_last_name[]" class="control-label col-sm-3">*Last Name:</label>
		<div class="col-sm-9">
			<input type="text" name="personnel_last_name[]" id="personnel_last_name[]"class="form-control" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="personnel_prefix[]" class="control-label col-sm-3">Prefix:</label>
		<div class="col-sm-9">
			<input type="text" name="personnel_prefix[]" id="personnel_prefix[]" class="form-control"/>
		</div>
	</div>
	
	<div class="form-group">
	<label for="public_personnel_choice_id_0" class="control-label col-sm-3">*Can this person's information be made public?</label>
		<div class="col-sm-9">
			<label class="radio-inline"><input type="radio" name="public_personnel_choice_id_0" id="public_personnel_choice_id_0" value='true' required>Yes</label>
			<label class="radio-inline"><input type="radio" name="public_personnel_choice_id_0" id="public_personnel_choice_id_0" value='false'>No</label>
		</div>
	</div>
	
	<div class="form-group">
	<label for="primary_vendor_contact_choice_id_0" class="control-label col-sm-3">*Is this person the primary vendor contact?</label>
		<div class="col-sm-9">
			<label class="radio-inline"><input type="radio" name="primary_vendor_contact_choice_id_0" id="primary_vendor_contact_choice_id_0" value='true' required>Yes</label>
			<label class="radio-inline"><input type="radio" name="primary_vendor_contact_choice_id_0" id="primary_vendor_contact_choice_id_0" value='false'>No</label>
		</div>
	</div>
	
	<div class="form-group">
	<label for="vendor_director_choice_id_0" class="control-label col-sm-3">*Is this person the vendor director?</label>
		<div class="col-sm-9">
			<label class="radio-inline"><input type="radio" name="vendor_director_choice_id_0" id="vendor_director_choice_id_0"value='true' required>Yes</label>
			<label class="radio-inline"><input type="radio" name="vendor_director_choice_id_0" id="vendor_director_choice_id_0" value='false'>No</label>
		</div>
	</div>
	
	<div class="form-group">
		<label for="personnel_id[]" class="control-label col-sm-3">*Person ID:</label>
		<div class="col-sm-9">
			<input type="text" name="personnel_id[]" id="personnel_id[]" class="form-control" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="personnel_public_phone[]" class="control-label col-sm-3">*Public Phone Number:</label>
		<div class="col-sm-9">
			<input type="tel" name="personnel_public_phone[]" id="personnel_public_phone[]" class="form-control" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="personnel_private_phone[]" class="control-label col-sm-3">*Private Phone Number (for GTR to contact):</label>
		<div class="col-sm-9">
			<input type="tel" name="personnel_private_phone[]" id="personnel_private_phone[]" class="form-control" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="personnel_public_email[]" class="control-label col-sm-3">*Public Email:</label>
		<div class="col-sm-9">
			<input type="email" name="personnel_public_email[]" id="personnel_public_email[]" class="form-control" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="personnel_private_email[]" class="control-label col-sm-3">*Private email (for GTR to contact):</label>
		<div class="col-sm-9">
			<input type="email" name="personnel_private_email[]" id="personnel_private_email[]" class="form-control" required/>
		</div>
	</div>
	<h5>Click the + symbol below if you would like to add more personnel</h5>
	</div>
	
	<script type="text/javascript">
	(function($){
		$countForms = 1;
		$.fn.addForms = function(){
				var myform = "<div class='form-group'>" +
		"<label for='personnel_first_name[]' class='control-label col-sm-3'>*First Name:</label>"+
		"<div class='col-sm-9'>"+
			"<input type='text' name='personnel_first_name[]' id='personnel_first_name[]' class='form-control' required/>"+
		"</div>"+
	"</div>" +

	"<div class='form-group'>" +
		"<label for='personnel_middle_initial[]' class='control-label col-sm-3'>Middle Initial:</label>"+
		"<div class='col-sm-9'>"+
			"<input type='text' name='personnel_middle_initial[]' id='personnel_middle_initial[]' class='form-control'/>"+
		"</div>"+
	"</div>"+
	
	"<div class='form-group'>"+
		"<label for='personnel_last_name[]' class='control-label col-sm-3'>*Last Name:</label>"+
		"<div class='col-sm-9'>"+
			"<input type='text' name='personnel_last_name[]' id='personnel_last_name[]' class='form-control' required/>"+
		"</div>"+
	"</div>"+
	
	"<div class='form-group'>"+
		"<label for='personnel_prefix[]' class='control-label col-sm-3'>Prefix:</label>"+
		"<div class='col-sm-9'>"+
			"<input type='text' name='personnel_prefix[]' id='personnel_prefix[]' class='form-control'/>"+
		"</div>"+
	"</div>"+
	
	"<div class='form-group'>"+
	"<label for='public_personnel_choice_id_"+$countForms+"' class='control-label col-sm-3'>*Can this person's information be made public?</label>"+
		"<div class='col-sm-9'>"+
			"<label class='radio-inline'><input type='radio' name='public_personnel_choice_id_"+$countForms+"' id='public_personnel_choice_id_"+$countForms+"' value='true' required>Yes</label>"+
			"<label class='radio-inline'><input type='radio' name='public_personnel_choice_id_"+$countForms+"' id='public_personnel_choice_id_"+$countForms+"' value='false'>No</label>"+
		"</div>"+
	"</div>"+
	
	"<div class='form-group'>"+
	"<label for='primary_vendor_contact_choice_id_"+$countForms+"' class='control-label col-sm-3'>*Is this person the primary vendor contact?</label>"+
		"<div class='col-sm-9'>"+
			"<label class='radio-inline'><input type='radio' name='primary_vendor_contact_choice_id_"+$countForms+"' id='primary_vendor_contact_choice_id_"+$countForms+"' value='true' required>Yes</label>"+
			"<label class='radio-inline'><input type='radio' name='primary_vendor_contact_choice_id_"+$countForms+"' id='primary_vendor_contact_choice_id_"+$countForms+"' value='false'>No</label>"+
		"</div>"+
	"</div>"+
	
	"<div class='form-group'>"+
	"<label for='vendor_director_choice_id_"+$countForms+"' class='control-label col-sm-3'>*Is this person the vendor director?</label>"+
		"<div class='col-sm-9'>"+
			"<label class='radio-inline'><input type='radio' name='vendor_director_choice_id_"+$countForms+"' id='vendor_director_choice_id_"+$countForms+"' value='true' required>Yes</label>"+
			"<label class='radio-inline'><input type='radio' name='vendor_director_choice_id_"+$countForms+"' id='vendor_director_choice_id_"+$countForms+"' value='false'>No</label>"+
		"</div>"+
	"</div>"+
	
	"<div class='form-group'>"+
		"<label for='personnel_id[]' class='control-label col-sm-3'>*Person ID:</label>"+
		"<div class='col-sm-9'>"+
			"<input type='text' name='personnel_id[]' id='personnel_id[]' class='form-control' required/>"+
		"</div>"+
	"</div>"+
	
	"<div class='form-group'>"+
		"<label for='personnel_public_phone[]' class='control-label col-sm-3'>*Public Phone Number:</label>"+
		"<div class='col-sm-9'>"+
			"<input type='text' name='personnel_public_phone[]' id='personnel_public_phone[]' class='form-control' required/>"+
		"</div>"+
	"</div>"+
	
	"<div class='form-group'>"+
		"<label for='personnel_private_phone[]' class='control-label col-sm-3'>*Private Phone Number (for GTR to contact):</label>"+
		"<div class='col-sm-9'>"+
			"<input type='text' name='personnel_private_phone[]' id='personnel_private_phone[]' class='form-control' required/>"+
		"</div>"+
	"</div>"+
	
	"<div class='form-group'>"+
		"<label for='personnel_public_email[]' class='control-label col-sm-3'>*Public Email:</label>"+
		"<div class='col-sm-9'>"+
			"<input type='text' name='personnel_public_email[]' id='personnel_public_email[]' class='form-control' required/>"+
		"</div>"+
	"</div>"+
	
	"<div class='form-group'>"+
		"<label for='personnel_private_email[]' class='control-label col-sm-3'>*Private email (for GTR to contact):</label>"+
		"<div class='col-sm-9'>"+
			"<input type='text' name='personnel_private_email[]' id='personnel_private_email[]' class='form-control' required/>"+
		"</div>"+
	"</div>"+
	
	
	
	"<button type='button' class='btn'><i class='fa fa-minus-square'></button>";

	
	
	
	myform = $("<div>"+myform+"</div>");
    			 $("button", $(myform)).click(function(){ $(this).parent().remove(); });

    			 $(this).append(myform);
    			 $countForms++;
    	  };
    })(jQuery);		

    $(function(){
    	$("#mybutton").bind("click", function(){
    		$("#container").addForms();
    	});
		});
	</script>

</head>
<body>
<button id="mybutton" type='button' class="btn"><i class="fa fa-plus-square"></i></button>
<div id="container"></div>

	

	
	

	
	
	
	
</br>
<center>
<input type="submit" name="name" class="btn btn-primary" value="Download XML File"/>
</center>
</form>
</div>
</div>
</body>

</html>

<script>

            
$(document).ready(function () {

    $('#vendor_form').validate({
        rules: {
            name: {
                minlength: 2,
                required: true
            },
            email: {
                required: true,
                email: true
            },
            message: {
                minlength: 2,
                required: true
            },
			phone: {
				required: true,
				phoneUS: true
			}
			
        },
        highlight: function (element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function (element) {
            element.text('OK!').addClass('valid')
                .closest('.control-group').removeClass('error').addClass('success');
        },
		ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
    });

});
$('#country').selectize({

    
});


</script>
<style>

.error, textarea.error, input.error {
    color:#FF0000;
}
</style>
