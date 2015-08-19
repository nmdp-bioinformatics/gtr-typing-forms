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

class Kit_xml extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->database();
		$this->load->model('Kit_model');
	}

	public function index()
	{
		//These settings are for demo purpose only and need to be updated.
		//Discuss with NCBI if we can have our own credentials, otherwise we need to generate
		//them for each submitter/vendor.
	$username = 'NMDP';
	$authority = 'NMDP';
	$org_type = 'institute';
	$org_id = '1';
	$org_name = 'National Marrow Donor Program';
	$org_name_abbr = 'NMDP';
	
	
	$setdescription = 'HLA Typing';
	$clinvarsubID_localkey = '1';
	
	
	$val_type = 'name'; // can be either 'name' or 'id' but external submission should use name
	$assertiontype = 'Allele Identification for Histocompatability'; // variation to disease, variation in modifier gene to disease, gene to disease
	// THIS NEEDS TO BE UPDATED in schema, added this assertiontype.. could be something else as well, but need a new one.
	$methodtype = 'curation'; // curation, reference population, case-control, clinical testing, in vitro, in vivo -- may have to remove this as a required option.
	$observedattributetype = 'VariantAlleles'; // incomplete list right now, not fully utilized - can choose Description, VariantAlleles, SubjectsWithVariant, 
	// SubjectsWithDifferentCausativeVariant, UnaffectedFamilyMemberWithCausitiveVariant, Non-pathogenicAllelesTransmitted
	// or can use ObsDecAttributeType to select AlleleFrequency
	$affectedstatus = 'no'; // can be yes, no, not provided
	
	//Grab data from form		
	$kit_name = $this->input->post('name');
	$other_name_array = $this->input->post('other_name');
	$other_nametype_array = $this->input->post('other_name_type');
	// $target = $this->input->post('target');  // other acceptable values: germline, somatic, de novo, uncertain, not provided
	$target = 'somatic';
	$measuretype = $this->input->post('test_measure'); //Gene, Variant, gene-variant, Analyte, Drug, chromosomal region, undefined
	// $measuresettype = $this->input->post('test_measure'); // Variation, Gene, undetermined variant, insertion, deletion, single nucleotide variant, indel,
	// Duplication, analyte, pharmacologic substance, protein, chromosomal region
	$measuresettype = 'Variation'; // or maybe gene, undetermined variant.. trying to fix value, other options above.
	$traitsettype = 'undefined'; // can be Disease or undefined
	$traittype = 'Not Applicable'; //can be Disease, phenocopy, subphenotype .. ADDING Not Applicable here
	$elementvaluetype = 'Preferred'; //can be Preferred, Alternate, LabPreferredName, LabPreferredSymbol
	$vendor_unique_code = 'test_kit_id_here'; //string, required for bulk upload, a unique code for vendor to identify the kit to help with data exchange. should do a post for it, add this field to form.
	// $purpose = $this->input->post('purpose'); //can be Diagnosis, Screening, Drug Response, Risk Assessment, Pre-symptomatic, Mutation Confirmation (family-specific or research results, etc), Pre-implantation genetic diagnosis
	$purpose = 'Screening,Therapeutic management'; // need to update schema, i don't think these values are in there but they should be according to the field definitions pdf. Explode this to two elements.
	$purpose_array = explode(',',$purpose);
	$test_type = 'Kit'; // Kit, Clinical, or Research
	
	// need to split and add controls for multiple input
	$category_array = $this->input->post('category');
	// $primary_methodology = $this->input->post('primary_method');
	// $instrument = $this->input->post('instrument');

	//primary_methodlogy and instrument come in as different named arrays. due to deleting sections and adding some, numbering may be off - we go by length of categories and match up in order.

	$loop_count = 0;
	$inner_count = 0;
	$total_categories = count($category_array);

	while(true)
	{
		$primary_meth = 'primary_method'.$loop_count;
		if ($this->input->post($primary_meth))
		{
			$primary_method[$inner_count] = ($this->input->post($primary_meth));
			$inner_count++;			
		}		
		$loop_count++;
		if (count($primary_method) == $total_categories)
		{			
			break;				
		}
	}	

	$loop_count = 0;
	$inner_count = 0;

	while(true)
	{
		$instr = 'instrument'.$loop_count;
		if ($this->input->post($instr))
		{
			$instrument[$inner_count] = ($this->input->post($instr));
			$inner_count++;			
		}		
		$loop_count++;
		if (count($instrument) == $total_categories)
		{			
			break;				
		}
	}	

	$platform = $this->input->post('platform');
	$protocol = $this->input->post('procedure');
	$gene_array = $this->input->post('gene');
	$exons = $this->input->post('exon');
	// $analytical_validity = 'Analytical validity free text here.'; //(REMOVE THIS FOR KITS?)
	$analytical_validity = $this->input->post('analytical_validity');
	$assay_limitations = $this->input->post('assay_limitations');
	$clinical_validity = $this->input->post('clinical_validity');
	$software_version_array = $this->input->post('software_version');
	$software_name_array = $this->input->post('software_name');
	$software_purpose_array = $this->input->post('software_purpose');
	$imgt_hla_version = $this->input->post('imgt_hla_version');

	

	////////////////////////////////////
	// End data binding construction, begin document build
	///////////////////////////////////
	
	//Building XML Document	
	$xml = new DOMDocument('1.0', 'UTF-8');
	$xml->formatOutput = true;
	$xml->preserveWhiteSpace = false;	
	
	//root
	$submission_element = $xml->createElement('Submission');
	$xml->appendChild($submission_element);
	
	//description
	$description_element = $xml->createElement('Description');
	$submission_element->appendChild($description_element);
	
	$description_comment_element = $xml->createElement('Comment','XML File Generated by NMDP');
	$description_element->appendChild($description_comment_element);
	
	$submitter_element = $xml->createElement('Submitter');
	$submitter_attribute_user = $xml->createAttribute('user_name');
	$submitter_attribute_user->value = $username;
	$submitter_element->appendChild($submitter_attribute_user);
	$submitter_attribute_authority = $xml->createAttribute('authority');
	$submitter_attribute_authority->value = $authority;
	$submitter_element->appendChild($submitter_attribute_authority);
	$description_element->appendChild($submitter_element);
	
	$organization_element = $xml->createElement('Organization');
	$organization_attribute_type = $xml->createAttribute('type');
	$organization_attribute_type->value = $org_type;
	$organization_element->appendChild($organization_attribute_type);
	$organization_attribute_id = $xml->createAttribute('org_id');
	$organization_attribute_id->value = $org_id;
	$organization_element->appendChild($organization_attribute_id);
	$description_element->appendChild($organization_element);
	
	$org_name_element = $xml->createElement('Name',$org_name);
	$org_name_attribute = $xml->createAttribute('abbr');
	$org_name_attribute->value = $org_name_abbr;
	$org_name_element->appendChild($org_name_attribute);
	$organization_element->appendChild($org_name_element);	
	
	//action
	$action_element = $xml->createElement('Action');
	$submission_element->appendChild($action_element);
	
	$adddata_element = $xml->createElement('AddData');
	$adddata_attribute_target_db = $xml->createAttribute('target_db');
	$adddata_attribute_target_db->value = "GTR";
	$adddata_element->appendChild($adddata_attribute_target_db);
	$adddata_attribute_target_db_context = $xml->createAttribute('target_db_context');
	$adddata_attribute_target_db_context->value = "Org";
	$adddata_element->appendChild($adddata_attribute_target_db_context);
	$action_element->appendChild($adddata_element);
	
	$data_element = $xml->createElement('Data');
	$data_attribute = $xml->createAttribute('content_type');
	$data_attribute->value = "xml";
	$data_element->appendChild($data_attribute);
	$adddata_element->appendChild($data_element);
	
	$xmlcontent_element = $xml->createElement('XmlContent');
	$data_element->appendChild($xmlcontent_element);
	
	$add_kit_element = $xml->createElement('GTRVendorKit');
	$xmlcontent_element->appendChild($add_kit_element);
	$clinvar_element = $xml->createElement('ClinVarSet');
	$add_kit_element->appendChild($clinvar_element);
	$setdescr_element = $xml->createElement('SetDescr',$setdescription);
	$setdescr_attrib = $xml->createAttribute('Type');
	$setdescr_attrib->value = 'preferred';
	$setdescr_element->appendChild($setdescr_attrib);
	$clinvar_element->appendChild($setdescr_element);
	$clinvarsub_element = $xml->createElement('ClinvarSubmission');
	$clinvar_element->appendChild($clinvarsub_element);
	$clinvarsubID_element = $xml->createElement('ClinvarSubmissionID');
	$clinvarsub_element->appendChild($clinvarsubID_element);
	$clinvarsubID_attr_localkey = $xml->createAttribute('localKey');
	$clinvarsubID_attr_localkey->value = $clinvarsubID_localkey;
	$clinvarsubID_element->appendChild($clinvarsubID_attr_localkey);
	
	//MeasureTrait
	
	$measuretrait_element = $xml->createElement('MeasureTrait');
	$clinvarsub_element ->appendChild($measuretrait_element);
	$assertion_element = $xml->createElement('Assertion');
	$measuretrait_element->appendChild($assertion_element);
	$assertiontype_element = $xml->createElement('AssertionType',$assertiontype);
	$assertion_element->appendChild($assertiontype_element);
	$assertiontype_attrib = $xml->createAttribute('val_type');
	$assertiontype_attrib->value = $val_type;
	$assertiontype_element->appendChild($assertiontype_attrib);
	$observedin_element = $xml->createElement('ObservedIn');
	$measuretrait_element->appendChild($observedin_element);
	
		//measuretrait/sample
		$observationsample_element = $xml->createElement('Sample');
		$observedin_element->appendChild($observationsample_element);
		$sampleorigin_element = $xml->createElement('Origin',$target);
		$observationsample_element->appendChild($sampleorigin_element);
		$sample_affectedstatus_element = $xml->createElement('AffectedStatus',$affectedstatus);
		$observationsample_element->appendChild($sample_affectedstatus_element);
		// Can add ethniciy, GeographicOrigin, Tissue, Cellline, Species, Age, Strain, NumberTested, NumberMales,NumberFemales,NumberChrTested,
		// FamilyData, XRef, Citation, Comment
		
		//measuretrait/method	
		$observationmethod_element = $xml->createElement('Method');
		$observedin_element->appendChild($observationmethod_element);
		$methodtype_element = $xml->createElement('MethodType',$methodtype);
		$observationmethod_element->appendChild($methodtype_element);
		$methodtype_attrib = $xml->createAttribute('val_type');
		$methodtype_attrib->value = $val_type;
		$methodtype_element->appendChild($methodtype_attrib);


		// Software

		//methodtype needs to include MethodType for curation.. can put software here as well as nameplatform, typeplatform, purpose, resulttype, minreported
		// maxreported, referencestandard, citation xref, description, sourcetype  can put version of IMGT/HLA in ReferenceStandard?

		if(!empty($software_name_array))
		{
			$software_count = 0;
			foreach($software_name_array as $software_name)
			{
				$software_version = $software_version_array[$software_count];
				$software_purpose = $software_purpose_array[$software_count];
				if($software_name)
				{
					$software_element = $xml->createElement('Software');
					$software_name_attrib = $xml->createAttribute('name');
					$software_name_attrib->value = $software_name;
					$software_element->appendChild($software_name_attrib);
					if($software_version)
					{
						$software_version_attrib = $xml->createAttribute('version');
						$software_version_attrib->value = $software_version;
						$software_element->appendChild($software_version_attrib);
					}
					if($software_purpose)
					{
						$software_purpose_attrib = $xml->createAttribute('purpose');
						$software_purpose_attrib->value = $software_purpose;
						$software_element->appendChild($software_purpose_attrib);
					}
					$methodtype_element->appendChild($software_element);
				}
				$software_count++;
			}			

		}

		//reference standard
		$imgt_hla_version_element = $xml->createElement('ReferenceStandard','IMGT/HLA Version: '.$imgt_hla_version);
		$methodtype_element ->appendChild($imgt_hla_version_element);

		

		
		//measuretrait/observeddata
		$observeddata_element = $xml->createElement('ObservedData');
		$observedin_element->appendChild($observeddata_element);
		$ObsAttributeType_element = $xml->createElement('ObsAttributeType',$observedattributetype);
		$obsattributetype_attrib = $xml->createAttribute('val_type');
		$obsattributetype_attrib->value = $val_type;
		$ObsAttributeType_element->appendChild($obsattributetype_attrib);
		$observeddata_element->appendChild($ObsAttributeType_element);
		$observedinattribute_element = $xml->createElement('Attribute');
		$observeddata_element->appendChild($observedinattribute_element);
		
		//can add citations for the observed data here as well	
	
	
	//MeasureSet
	
	$measureset_element = $xml->createElement('MeasureSet');
	$clinvarsub_element ->appendChild($measureset_element);
	$measuresettype_element = $xml->createElement('MeasureSetType',$measuresettype);
	$measureset_element->appendChild($measuresettype_element);
	$measuresettype_attrib = $xml->createAttribute('val_type');
	$measuresettype_attrib->value = $val_type;
	$measuresettype_element->appendChild($measuresettype_attrib);

	$gene_count = 0;
	foreach ($gene_array as $gene_symbol)
	{
		$measuresetmeasure_element = $xml->createElement('Measure');
		$measureset_element->appendChild($measuresetmeasure_element);
		$measuretype_element = $xml->createElement('MeasureType',$measuretype[$gene_count]);
		$measuresetmeasure_element->appendChild($measuretype_element);
		$measuretype_attrib = $xml->createAttribute('val_type');
		$measuretype_attrib->value = $val_type;
		$measuretype_element->appendChild($measuretype_attrib);
		$measure_symbol = $xml->createElement('Symbol');
		$measuresetmeasure_element ->appendChild($measure_symbol);
		$measuresymbol_elementvaluetype = $xml->createElement('ElementValueType','Preferred');
		$measuresymbol_elementvaluetype_attrib = $xml->createAttribute('val_type');
		$measuresymbol_elementvaluetype_attrib->value = $val_type;
		$measuresymbol_elementvaluetype->appendChild($measuresymbol_elementvaluetype_attrib);
		$measure_symbol->appendChild($measuresymbol_elementvaluetype);
		$measuresymbol_elementvalue = $xml->createElement('ElementValue',$gene_symbol);
		$measure_symbol ->appendChild($measuresymbol_elementvalue);
		$gene_id = $this->Kit_model->get_gene_id($gene_symbol);
		if ($gene_id)
		{
			$id = $gene_id['ENTREZ_GENE_ID'];
			$symbolxref_element = $xml->createElement('XRef');
			$symbolxref_attribdb = $xml->createAttribute('db');
			$symbolxref_attribid = $xml->createAttribute('id');
			$symbolxref_attribdb->value = 'Gene';
			$symbolxref_attribid->value = $id;
			$symbolxref_element->appendChild($symbolxref_attribdb);
			$symbolxref_element->appendChild($symbolxref_attribid);
			$measuresetmeasure_element->appendChild($symbolxref_element);
		}

		$gene_count++;
	}
	
	//under measuretype can have Name, Symbol, AttributeSet, CytogeneticLocation, SequenceLocation, MeasureRelationship, Citation, Xref, Comment for what is being measured
	//AttributeSet has a few more levels of required elements
	//MeasureRelationship has a few more levels of required elements
	
	//Measure can also have AttributeSet, citation, XRef, Comment
	
	
	//Traitset
	$traitset_element = $xml->createElement('TraitSet');
	$clinvarsub_element->appendChild($traitset_element);
	$traitsettype_element = $xml->createElement('TraitSetType',$traitsettype);
	$traitset_element->appendChild($traitsettype_element);
	$traitsettype_attrib = $xml->createAttribute('val_type');
	$traitsettype_attrib->value = $val_type;
	$traitsettype_element->appendChild($traitsettype_attrib);
	
		//Traitset/trait
		$trait_element = $xml->createElement('Trait');
		$traitset_element->appendChild($trait_element);
		$traittype_element = $xml->createElement('TraitType',$traittype);
		$trait_element->appendChild($traittype_element);
		$traittype_attrib = $xml->createAttribute('val_type');
		$traittype_attrib->value = $val_type;
		$traittype_element->appendChild($traittype_attrib);
		$traitname_element = $xml->createElement('Name');
		$trait_element->appendChild($traitname_element);
		$traitname_elementvaluetype_element = $xml->createElement('ElementValueType',$elementvaluetype);
		$traitname_element->appendChild($traitname_elementvaluetype_element);
		$traitname_elementvaluetype_attrib = $xml->createAttribute('val_type');
		$traitname_elementvaluetype_attrib->value = $val_type;
		$traitname_elementvaluetype_element->appendChild($traitname_elementvaluetype_attrib);
		
		$traitname_elementvalue_element = $xml->createElement('ElementValue');
		$traitname_element->appendChild($traitname_elementvalue_element);
		//elementvalue is required, but nothing is required in it.. it can be populated with attributes, db or id to define attributes of sets of data or their relationships
	
	//under trait can add optional symbol and attributeset(complextype), TraitRelationship(complextype), citation, Xref, and Comment
	//measure can also include CytogeneticLocation, SequenceLocation, MeasureRelationship, Citation, XRef, Comment
	//measureset can include attributeset, citation, xref, comment
	
	
	//KitName	
	$kitname_element = $xml->createElement('KitName',$kit_name);
	$add_kit_element->appendChild($kitname_element);

	if(!empty($other_name_array))
	{
		$othername_count = 0;
		foreach($other_name_array as $other_name)
		{
			$name_type = $other_nametype_array[$othername_count];
			$other_name_element = $xml->createElement('OtherName',$other_name);
			$other_name_type_attrib = $xml->createAttribute('Type');
			$other_name_type_attrib->value=$name_type;
			$other_name_element->appendChild($other_name_type_attrib);
			$add_kit_element->appendChild($other_name_element);

			$othername_count++;
		}
	}
	
	// optional fields KitShortName, ManufacturerTestName (REMOVE THIS FOR KITS?), OtherName, TestDevelopment, VendorUniqueCode (required for bulk upload), Order, Specimen, 
	//KitContact, KitContactPolicy, KitStrategy, KitOrderCode, KitCodes (REMOVE THIS FOR KTIS?), KitURL, OrderableBy, KitResults (FILE UPLOAD, SAMPLE REPORT field. The file identifier on FileTrack.),
	//and TestComment
	
	$vendoruniquecode_element = $xml->createElement('VendorUniqueCode',$vendor_unique_code);
	$add_kit_element->appendChild($vendoruniquecode_element);
	
	//Indications
	$indications_element = $xml->createElement('Indications');
	$add_kit_element->appendChild($indications_element);
	

	foreach ($purpose_array as $reason)
	{
		$purpose_element = $xml->createElement('Purpose',$reason);
		$indications_element->appendChild($purpose_element);
		$purpose_attrib = $xml->createAttribute('val_type');
		$purpose_attrib->value = $val_type;
		$purpose_element->appendChild($purpose_attrib);
	}
	
	$testtype_element = $xml->createElement('TestType',$test_type); //need to edit TestType documentation to include kit.
	$testtype_attrib = $xml->createAttribute('val_type'); 
	$testtype_attrib->value = $val_type;
	$testtype_element->appendChild($testtype_attrib);
	$indications_element->appendChild($testtype_element);
	//indications can also have targetpop

	//need to setup separate entry fields for methodology and instrument, description..?

	$method_element = $xml->createElement('Method');
	$add_kit_element->appendChild($method_element);
	$method_attribute = $xml->createAttribute('val_type');
	$method_attribute->value = $val_type;
	$method_element->appendChild($method_attribute);

	$category_count = 0;
	//Flags to help collapse the categories into the same top categories, so that number of top cats is the max number of topcat elements.
	$appendedMolgen = False;
	$appendedBiochem = False;
	$appendedCyto = False;

	foreach ($category_array as $cat)
	{
		// $instrument_array = explode('%', $instrument[$category_count]); // for multiple instruments on same entry
		// $methodology_array = explode('%',$primary_methodology[$category_count]); // for multiple methodologies on same entry

		
		$split_methods = explode(';',$cat);
		$topcategory = $split_methods[0];
		$middlecategory = $split_methods[1];

		//would be helpful to set these all equal to variables if this ever changes.
		//These conditionals will help keep only 3 max top categories so adding categories in two entries with the same parent cateogry,
		//will place them under the same parent.
		if ($topcategory == 'Biochemical Genetics')
		{
			if (!$appendedBiochem)
			{
				$biochemtopcategory_element = $xml->createElement('TopCategory');
				$method_element->appendChild($biochemtopcategory_element);
				$biochemtopcategory_attribute = $xml->createAttribute('val_type');
				$biochemtopcategory_attribute->value = $val_type;
				$biochemtopcategory_element->appendChild($biochemtopcategory_attribute);
				$biochemtypetopcategorylist_element = $xml->createElement('typeTopCategoryList',$topcategory);
				$biochemtopcategory_element->appendChild($biochemtypetopcategorylist_element);

				$appendedBiochem = True;
			}

			$category_element = $xml->createElement('Category');
			$biochemtopcategory_element->appendChild($category_element);
			$category_attrib = $xml->createAttribute('val_type');
			$category_attrib->value = $val_type;
			$category_element->appendChild($category_attrib);
			$typecategorylist_element = $xml->createElement('typeCategoryList',$middlecategory);
			$category_element->appendChild($typecategorylist_element);

		}

		elseif ($topcategory == 'Molecular Genetics')
		{
			if (!$appendedMolgen)
			{
				$molgentopcategory_element = $xml->createElement('TopCategory');
				$method_element->appendChild($molgentopcategory_element);
				$molgentopcategory_attribute = $xml->createAttribute('val_type');
				$molgentopcategory_attribute->value = $val_type;
				$molgentopcategory_element->appendChild($molgentopcategory_attribute);
				$molgentypetopcategorylist_element = $xml->createElement('typeTopCategoryList',$topcategory);
				$molgentopcategory_element->appendChild($molgentypetopcategorylist_element);

				$appendedMolgen = True;
			}

			$category_element = $xml->createElement('Category');
			$molgentopcategory_element->appendChild($category_element);
			$category_attrib = $xml->createAttribute('val_type');
			$category_attrib->value = $val_type;
			$category_element->appendChild($category_attrib);
			$typecategorylist_element = $xml->createElement('typeCategoryList',$middlecategory);
			$category_element->appendChild($typecategorylist_element);
			
		
		}

		elseif ($topcategory == 'Cyogenetics')
		{
			if (!$appendedCyto)
			{
				$cytotopcategory_element = $xml->createElement('TopCategory');
				$method_element->appendChild($cytotopcategory_element);
				$cytotopcategory_attribute = $xml->createAttribute('val_type');
				$cytotopcategory_attribute->value = $val_type;
				$cytotopcategory_element->appendChild($mcytotopcategory_attribute);
				$cytotypetopcategorylist_element = $xml->createElement('typeTopCategoryList',$topcategory);
				$cytotopcategory_element->appendChild($cytotypetopcategorylist_element);

				$appendedCyto = True;
			}

			$category_element = $xml->createElement('Category');
			$cytotopcategory_element->appendChild($category_element);
			$category_attrib = $xml->createAttribute('val_type');
			$category_attrib->value = $val_type;
			$category_element->appendChild($category_attrib);
			$typecategorylist_element = $xml->createElement('typeCategoryList',$middlecategory);
			$category_element->appendChild($typecategorylist_element);
		
		}

		
		$method_count = 0;
		foreach($primary_method[$category_count] as $primary_methodology)
		{
			$methodology_array = explode('%',$primary_methodology); // for multiple methodologies on same entry.. currently disabled, can only enter one per field
			$instrument_array = explode('%', $instrument[$category_count][$method_count]);	// for multiple instruments on same primary methodology entry	

			foreach ($methodology_array as $primary) 
			{
				// conditional check here. since it's required in our form, it shouldn't matter, but if it is disabled as required (gtr does not require) this could potentially be '' and should be checked.
				if ($primary)
				{
				$method_check = $this->Kit_model->check_method($primary);
					if (empty($method_check)) 
					{
						//if user enters a new primary methodology
					$methodology_element = $xml->createElement('Methodology');
					$methodology_attrib = $xml->createAttribute('val_type');
					$methodology_attrib->value = $val_type;
					$methodology_attrib_other = $xml->createAttribute('OtherValue');
					$methodology_attrib_other->value = $primary;
					$methodology_element->appendChild($methodology_attrib);
					$methodology_element->appendChild($methodology_attrib_other);
					$category_element->appendChild($methodology_element);
					$typemethodologylist_element = $xml->createElement('typeMethodologyList', 'Other');
					$methodology_element->appendChild($typemethodologylist_element);
					}
					else
					{
					$methodology_element = $xml->createElement('Methodology');
					$methodology_attrib = $xml->createAttribute('val_type');
					$methodology_attrib->value = $val_type;
					$methodology_element->appendChild($methodology_attrib);
					$category_element->appendChild($methodology_element);
					$typemethodologylist_element = $xml->createElement('typeMethodologyList', $primary);
					$methodology_element->appendChild($typemethodologylist_element);
					}
				}
			}

			foreach($instrument_array as $instr)
			{
				if ($instr) //makes sure it is not '' empty value (i.e. no instrument entered for that section) since this is optional field
				{
				$instrument_check = $this->Kit_model->check_instruments($instr);
					if (empty($instrument_check)) 
					{
						//This is for the case of a user entering a new instrument not in the db already
					$instrument_element = $xml->createElement('Instrument','Other'); //Need to add control here for user submitted OTHER (attrib type OtherValue)
					$instrument_attrib = $xml->createAttribute('val_type');
					$instrument_attrib_other = $xml->createAttribute('OtherValue');
					$instrument_attrib_other->value = $instr;
					$instrument_attrib->value = $val_type;
					$instrument_element->appendChild($instrument_attrib);
					$instrument_element->appendChild($instrument_attrib_other);
					$methodology_element->appendChild($instrument_element);

					}
					else 
					{

					$instrument_element = $xml->createElement('Instrument',$instr); //Need to add control here for user submitted OTHER (attrib type OtherValue)
					$instrument_attrib = $xml->createAttribute('val_type');
					$instrument_attrib->value = $val_type;
					$instrument_element->appendChild($instrument_attrib);
					$methodology_element->appendChild($instrument_element);
					}
				}
			}
		$method_count++;
		}

		$category_count++;
	}

	if($platform || $protocol || $exons) // method_add is optional section by schema defintion
	{
		$methodadd_element = $xml->createElement('MethodAdd');
		$add_kit_element->appendChild($methodadd_element);
		$platform_array = explode('%',$platform);
		if(!empty($platform_array))
		{
			foreach($platform_array as $platform)
			{
				$platform_check = $this->Kit_model->check_platform($platform);
				if (empty($platform_check)) // handles other/added values
				{
					$platform_element = $xml->createElement('Platform','Other');
					$platform_attrib = $xml->createAttribute('val_type');
					$platform_attrib_other = $xml->createAttribute('OtherValue');
					$platform_attrib_other->value = $platform;
					$platform_attrib->value = $val_type;
					$platform_element->appendChild($platform_attrib);
					$platform_element->appendChild($platform_attrib_other);
					$methodadd_element->appendChild($platform_element);
				}
				else
				{
					$platform_element = $xml->createElement('Platform',$platform);
					$platform_attrib = $xml->createAttribute('val_type');
					$platform_attrib->value = $val_type;
					$platform_element->appendChild($platform_attrib);
					$methodadd_element->appendChild($platform_element);
				}
			}
		}
		if($protocol)
		{
			$protocol_element = $xml->createElement('Protocol');
			$methodadd_element->appendChild($protocol_element);
			$protocoldescription_element = $xml->createElement('Description',$protocol);
			$protocol_element->appendChild($protocoldescription_element);
		}
		if(!empty($exons))
		{
			$exon_count = 0;
			foreach($exons as $exon)
			{
				if($exon)
				{
					$matched_gene_symbol = $gene_array[$exon_count]; //find respective gene input for this exon
					$matched_gene_id = $this->Kit_model->get_gene_id($gene_symbol);
					$id = $matched_gene_id['ENTREZ_GENE_ID'];
					$exon_element = $xml->createElement('Exons',$exon);
					$exon_attribute = $xml->createAttribute('GeneID');
					$exon_attribute->value = $id;
					$exon_element->appendChild($exon_attribute);
					$methodadd_element->appendChild($exon_element);
				}
				//can match up array position with gene input from form for this. and add attribute for GeneID.
				$exon_count++;
			}

		}
	}
	//can add citation element to protocol as well.
	// confirmation (REMOVE THIS FOR KITS?) and Exons can be added to methodadd as well.
	//Analytical Validity
	$analyticalvalidity_element = $xml->createElement('AnalyticalValidity');
	$add_kit_element->appendChild($analyticalvalidity_element);
	$analyticalvaliditydescription_element = $xml->createElement('Description',$analytical_validity);
	$analyticalvalidity_element->appendChild($analyticalvaliditydescription_element);
	//can also add citation field as well.
	
	if($assay_limitations)
	{
		$assay_limitations_element = $xml->createElement('AssayLimitations');
		$add_kit_element->appendChild($assay_limitations_element);
		$assay_limitations_description = $xml->createElement('Description',$assay_limitations);
		$assay_limitations_element->appendChild($assay_limitations_description);
	}

	//Quality Control --> Clinical Validity

		//should clinical validity be required? QualityControl is in gtr schema, but clinical validity was not.
	if($clinical_validity)
	{
		$qualitycontrol_element = $xml->createElement('QualityControl');
		$add_kit_element->appendChild($qualitycontrol_element);
		// internal validation could be added here optionally as well
		$clinical_validity_element = $xml->createElement('ClinicalValidity');
		$clinical_validity_description = $xml->createElement('Description',$clinical_validity);
		$clinical_validity_element->appendChild($clinical_validity_description);
		$qualitycontrol_element->appendChild($clinical_validity_element);

	}

	//REGULATIONS

	
	
	
	
	
	// Generate the XML File
	$xml_string = $xml->saveXML();	

	// create filename
	$kit_underscore = str_replace(' ', '_', $kit_name);
	$name = $kit_underscore.'_submission.xml';	

	// set headers and output/download
	header('Content-Disposition: attachment; filename="'.$name.'"');
	header('Content-Type: text/xml');
	header('Content-Length: ' . strlen($xml_string));
	header('Connection: close');
	echo $xml_string;

	}
}
?>