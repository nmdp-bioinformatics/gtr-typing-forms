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

jQuery.get(base_url+'/index.php/form/get_imgt_hla_versions', function(data){
	$('#imgt_hla_version').selectize({
	plugins: ['remove_button'],
    delimiter: '%',
    persist: false,
    maxItems: 1,
    options: data,
    labelField: "VERSION",
    valueField: "VERSION",
    // sortField: "VERSION",
    searchField: "VERSION"
});
});

function selectize_category(){
jQuery.get(base_url+'/index.php/form/get_category', function(data){
$('[id^=category]').selectize({
					plugins: ['remove_button'],
					options: data,
					maxItems: 1,
					optgroups: [
						{value: 'Biochemical Genetics', label: 'Biochemical Genetics'},
						{value: 'Molecular Genetics', label: 'Molecular Genetics'},
						{value: 'Cytogenetics', label: 'Cytogenetics'}
					],
					optgroupField: 'MAJOR_METHOD',
					labelField: 'METHOD',
					searchField: ['METHOD'],
					render: {
						optgroup_header: function(data, escape) {
							return '<div class="optgroup-header">' + escape(data.label) + '</div>';
						}
					}
				});
});
};
	
function selectize_method() {
jQuery.get(base_url+'/index.php/form/get_method', function(data){
$('[id^=primary_method]').selectize({
	plugins: ['remove_button'],
    delimiter: '%',
    persist: false,
    maxItems: 1,
    options: data,
    labelField: "method",
    valueField: "method",
    sortField: "method",
    searchField: "method",
    create: function(input) {
        return {
            value: input,
            text: input,
			method: input
        }
    }
});
});
}

// commas in entries, using diff delimiter, need to account for that on server side
function selectize_platform() {
jQuery.get(base_url+'/index.php/form/get_platforms', function(data){
$('#platform').selectize({
	plugins: ['remove_button'],
    delimiter: '%',
    persist: false,
    options: data,
    labelField: "PLATFORM",
    valueField: "PLATFORM",
    sortField: "PLATFORM",
    searchField: "PLATFORM",
    create: function(input) {
        return {
            value: input,
            text: input,
			PLATFORM: input
        }
    }
});
});
};

function selectize_instrument()
{
jQuery.get(base_url+'/index.php/form/get_instruments', function(data){
		$('[id^=instrument]').selectize({
		plugins: ['remove_button'],
	    delimiter: '%',
	    persist: false,
	    options: data,
	    labelField: "INSTRUMENT",
	    valueField: "INSTRUMENT",
	    sortField: "INSTRUMENT",
	    searchField: "INSTRUMENT",
	    create: function(input) {
	        return {
	            value: input,
	            text: input,
				INSTRUMENT: input
				        }
				    }
				});
	});
};

function selectize_genes() {
jQuery.get(base_url+'/index.php/form/get_genes', function(data){
$('[id^=gene]').selectize({
	plugins: ['remove_button'],
    delimiter: '%',
    persist: false,
    maxItems: 1,
    options: data,
    labelField: "SYMBOL",
    valueField: "SYMBOL",
    sortField: "SYMBOL",
    searchField: "SYMBOL",
    create: function(input) {
        return {
            value: input,
            text: input,
			SYMBOL: input
        }
    }
});
});
};

function selectize_reference_sequence() {
$('[id^=reference_sequence]').selectize({
			plugins: ['remove_button'],
		    delimiter: '%',
		    persist: false,
			maxItems: 1,
		    labelField: "text",
		    valueField: "text",
		    sortField: "text",
		    searchField: "text",
		    create: function(input) {
		        return {
		            value: input,
		            text: input,
					        }
					    }
					});
};



function selectize_protein(){
		$('[id^=protein]').selectize({
			plugins: ['remove_button'],
		    delimiter: '%',
		    persist: false,
		    labelField: "text",
		    valueField: "text",
		    sortField: "text",
		    searchField: "text",
		    create: function(input) {
		        return {
		            value: input,
		            text: input,
					        }
					    }
					});
	};

function selectize_test_measure(){
		$('[id^=test_measure]').selectize({
			sortField: 'text'
			});
	};




$('#probes').selectize({
	plugins: ['remove_button','restore_on_backspace'],
    delimiter: '%',
    persist: false,
    labelField: "text",
    valueField: "text",
    sortField: "text",
    searchField: "text",
    create: function(input) {
        return {
            value: input,
            text: input,
        }
    }
});


//This validates the fields. Add rules and restrictions here. It will not allow a download until it passes this validation.
$(document).ready(function () {

    $('#kit_form').validate({
		// focusInvalid: false,
        rules: {
            name: {
                minlength: 2,
                required: true
            },
            email: {
                required: true,
                email: true
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
        //the default ignore selector is ':hidden', the following selectors restore the default behaviour when using selectize.js
		//:hidden:not([class~=selectized]) | selects all hidden elements, but not the original selects/inputs hidden by selectize
		//:hidden > .selectized | to restore the behaviour of the default selector, the original selects/inputs are only validated if their parent is visible
		//.selectize-control .selectize-input input | this rule is not really necessary, but ensures that the temporary inputs created by selectize on the fly are never validated
		ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
		//optional: add rules etc. according to jquery-validation docs
    });

    // This overrides some functions in validate jquery to make sure to apply too all fields with the same name.

    $.validator.prototype.checkForm = function () {
                //overriden in a specific page
                this.prepareForm();
                for (var i = 0, elements = (this.currentElements = this.elements()); elements[i]; i++) {
                    if (this.findByName(elements[i].name).length != undefined && this.findByName(elements[i].name).length > 1) {
                        for (var cnt = 0; cnt < this.findByName(elements[i].name).length; cnt++) {
                            this.check(this.findByName(elements[i].name)[cnt]);
                        }
                    } else {
                        this.check(elements[i]);
                    }
                }
                return this.valid();
            };
});	

//this function takes the template for repeating method sections and appends it, while updating IDs so selectize can be reapplied.
(function($){
		$countForms = 1;
		$.fn.addForms = function(){
				var myform = "<hr>"+
				"<div class='form-group'>"+
		"<label for='category_"+$countForms+"' class='control-label col-sm-3'>*Major Method and Method Category:</label> "+
		"<div class='col-sm-9'>"+
			"<select multiple id='category_"+$countForms+"' class='form-control' name='category[]' required>"+
			"</select>"+
			"</div>"+
		"</div>" +

		"<div id='method_instr_indent' style='margin-left: 10%'>"+

		"<div class='form-group'>"+
			"<label for='primary_method_"+$countForms+"' class='control-label col-sm-3'>*Primary Kit Methodology:</label> "+
			"<div class='col-sm-9'>"+
				"<input type='text' id='primary_method_"+$countForms+"' class='form-control' name='primary_method"+$countForms+"[]' required/>"+
			"</div>"+
		"</div>"+

		"<div class='form-group'>"+
		"<label for='instrument_"+$countForms+"' class='control-label col-sm-3'>Instrument(s) Used:</label> "+
			"<div class='col-sm-9'>"+
				"<input type='text' id='instrument_"+$countForms+"' class='form-control' name='instrument"+$countForms+"[]' />"+
			"</div>"+
		"</div>"+

		"<div id='methodology_container_"+$countForms+"' data-container='method_container'></div>	<br/>"+
		"<button type='button' id='methodology_add_button"+$countForms+"' class='btn'><i class='fa fa-plus-square'></i> </button><label><small> Add Another Primary Methodology To This Category</small></label>"+

		"</div>"+	
	
	"<button id='remove_category' class='btn' type='button'><i class='fa fa-minus-square'></i></button><label><small>Remove Above Category Section</small></label>";
			
	myform = $("<div>"+myform+"</div>");
    			 $("#remove_category", $(myform)).click(function(){ $(this).parent().remove(); });
    			 $(this).append(myform);
    			 $countForms++;
    	  };
    })(jQuery);		


//template for inside category, to only add another method within that same category.
 (function($){
		$countmethodForms = 1;
		$.fn.addmethodForms = function(){
				var mymethodform = "<hr>"+
				
		"<div class='form-group'>"+
			"<label for='primary_method_"+$(this).attr("id").split("_")[2]+"_"+$countmethodForms+"' class='control-label col-sm-3'>*Primary Kit Methodology:</label> "+
			"<div class='col-sm-9'>"+
				"<input type='text' id='primary_method_"+$(this).attr("id").split("_")[2]+"_"+$countmethodForms+"' class='form-control' name='primary_method"+$(this).attr("id").split("_")[2]+"[]' required/>"+
			"</div>"+
		"</div>"+

		"<div class='form-group'>"+
		"<label for='instrument_"+$(this).attr("id").split("_")[2]+"_"+$countmethodForms+"' class='control-label col-sm-3'>Instrument(s) Used:</label> "+
			"<div class='col-sm-9'>"+
				"<input type='text' id='instrument_"+$(this).attr("id").split("_")[2]+"_"+$countmethodForms+"' class='form-control' name='instrument"+$(this).attr("id").split("_")[2]+"[]' />"+
			"</div>"+
		"</div>"+
	
	"<button id='methodology_remove_button' class='btn' type='button'><i class='fa fa-minus-square'></i></button><label><small>Remove Above Methodology Section</small></label>";
	
	
	mymethodform = $("<div>"+mymethodform+"</div>");
    			 $("#methodology_remove_button", $(mymethodform)).click(function(){ $(this).parent().remove(); });
    			 $(mymethodform).appendTo(this);
    			 $countmethodForms++;
    	  };
    })(jQuery);		

    

//This function takes test target/gene template repeating section and appends it while updating IDs so selectize can be reapplied
(function($){
		$countForms2 = 1;
		$.fn.addForms2 = function(){
				var myform2 = 		"<hr>"+
				"<div class='form-group'>"+
		"<label for='test_measure"+$countForms2+"' class='control-label col-sm-3'>*Category of the analyte being tested:</label> "+
		"<div class='col-sm-9'>"+
			"<select id='test_measure"+$countForms2+"' class='form-control' name='test_measure[]' required>"+
			"<option></option>"+
			"<option value='Analyte'>Analyte</option>"+
			"<option value='Chomosomal region/mitochondrion'>Chromosomal region/mitochondrion</option>"+
			"<option value='Gene'>Gene</option>"+
			"<option value='Protein'>Protein</option>"+
		"</select>"+
		"</div>"+
	"</div>"+

	"<div class='form-group'>"+
		"<label for='gene"+$countForms2+"' class='control-label col-sm-3'>*Gene:</label> "+
		"<div class='col-sm-9'>"+
			"<input type='text' id='gene"+$countForms2+"' class='form-control' name='gene[]' placeholder='Enter gene symbol' required/>"+
		"</div>"+
	"</div>"+

	"<div class='form-group'>"+
		"<label for='reference_sequence"+$countForms2+"' class='control-label col-sm-3'>Associated Reference Sequence:</label> "+
		"<div class='col-sm-9'>"+
			"<input type='text' id='reference_sequence"+$countForms2+"' class='form-control' name='reference_sequence[]' />"+
		"</div>"+
	"</div>"+

	"<div class='form-group'>"+
		"<label for='exon"+$countForms2+"' class='control-label col-sm-3'>Exon(s):</label>"+
		"<div class='col-sm-9'>"+
			"<input type='text' id='exon"+$countForms2+"' name='exon[]' class='form-control' />"+
		"</div>"+
	"</div>"+

	"<div class='form-group'>"+
		"<label for='chromosome_region"+$countForms2+"' class='control-label col-sm-3'>Chromosomal Region/Mitocondrion(s):</label> "+
		"<div class='col-sm-9'>"+
			"<input type='text' id='chromosome_region"+$countForms2+"' class='form-control' name='chromosome_region[]' placeholder='RefSeq genomic ID, transcript ID, or DNA sequence variation display name'/>"+
		"</div>"+
	"</div>"+

	"<div class='form-group'>"+
		"<label for='protein"+$countForms2+"' class='control-label col-sm-3'>Protein Name(s):</label> "+
		"<div class='col-sm-9'>"+
			"<input type='text' id='protein"+$countForms2+"' class='form-control' name='protein[]' placeholder='Protein Name(s)'/>"+
		"</div>"+
	"</div>"+ 
	"<button id='target_remove_button' type='button' class='btn'><i class='fa fa-minus-square'></i></button><label><small>Remove Above Section</small></label>";


		
	myform2 = $("<div>"+myform2+"</div>");
    			 $("#target_remove_button", $(myform2)).click(function(){ $(this).parent().remove(); });
    			 $(this).append(myform2);
    			 $countForms2++;
    	  };
    })(jQuery);		

    $(function(){
    	$("#my_target_button").on("click", function(){
    		$("#target_container").addForms2();	

    	});
		});

(function($){
		$countsoftForms = 1;
		$.fn.addSoftware = function(){
				var mysoftware = "    <div class='form-group'>"+
		"<label for='software' class='control-label col-sm-3'>Software:</label> "+
"		<div class='col-sm-2'>"+
"			<input type='text' id='software_version' class='form-control' name='software_version[]' placeholder='version' />"+
"		</div>"+
"		<div class='col-sm-3'>"+
"			<input type='text' id='software_name' class='form-control' name='software_name[]' placeholder='*name' required/>"+
"		</div>"+
"		<div class='col-sm-4'>"+
"			<input type='text' id='software_purpose' class='form-control' name='software_purpose[]' placeholder='purpose' />"+
"		</div>"+
"	</div>"+
"<button id='remove_software_button' type='button' class='btn'><i class='fa fa-minus-square'></i></button><label><small>Remove Above Software</small></legend>";
	mysoftware = $("<div>"+mysoftware+"</div>");
    			 $("#remove_software_button", $(mysoftware)).click(function(){ $(this).parent().remove(); });
    			 $(this).append(mysoftware);
    			 $countsoftForms++;
    	  };
    	})(jQuery);

(function($){
	$countOtherName = 1;
	$.fn.addOtherName = function(){
		var otherNameTemplate = "<div class='form-group'>"+
				"<label for='other_name' class='control-label col-sm-3'>Other Name:</label> "+
				"<div class='col-sm-3'>"+
					"<select id='other_name_type"+$countOtherName+"' class='form-control' name='other_name_type[]' required>"+
						"<option></option>"+
						"<option value='Synonym'>Synonym</option>"+
						"<option value='Archived'>Archived</option>"+
						"<option value='Keyword'>Keyword</option>"+
						"<option value='Other'>Other</option>"+
					"</select>"+
				"</div>"+
				"<div class='col-sm-6'>"+
					"<input type='text' name='other_name[]' class='form-control' placeholder='other name for kit' required/>"+
				"</div>"+
			"</div>"+
		"<button id='remove_othername_button' type='button' class='btn'><i class='fa fa-minus-square'></i></button><label><small>Remove Above Other Name</small></legend>";
		otherNameTemplate = $("<div>"+otherNameTemplate+"</div>");
							$("#remove_othername_button", $(otherNameTemplate)).on('click',function(){ $(this).parent().remove();});
							$(this).append(otherNameTemplate);
							$countOtherName++;
						};
					})(jQuery);


// this function handles button clicks and applies new selectize on the new IDs when a new section is added.
$(document).ready(function () {
		$(function(){
		selectize_method();
		selectize_instrument();
		selectize_category();
		selectize_platform();
		selectize_genes();
		selectize_reference_sequence();
		selectize_protein();
		selectize_test_measure();
    	$("#add_other_name_button").on("click", function(){
    		$("#othername_container").addOtherName();
	    	$('[id^=other_name_type]').selectize({			
				});
    	});
		});
	    $(function(){
    	$("#mybutton").on("click", function(){
    		$("#the_category_container").addForms();    	
    	});
		});
		$(function(){
    	$("#add_software_button").on("click", function(){
    		$("#software_container").addSoftware();
    	});
		});
		$(function(){
    	$("#methodology_add_button").on("click", function(){
    		$("#methodology_container_0").addmethodForms();
    	});
		});
		$('#the_category_container').on('click', "[id^=methodology_add_button]", function(event){
    		$(event.target).siblings('[data-container="method_container"]').addmethodForms();
    	});


	$('#kit_form')
	.on('click', '#mybutton', function() {
		selectize_category();
		selectize_method();
		selectize_instrument();	            
	        })

	.on('click', "[id^=methodology_add_button]", function() {
		selectize_method();
		selectize_instrument();
	})

	.on('click', '#my_target_button', function() {
		selectize_genes();
		selectize_reference_sequence();
		selectize_protein();
		selectize_test_measure();
        })


//enable tooltips
$(function () { $('[data-toggle="popover"]').popover(
	{'placement': 'bottom'}); }); 




});