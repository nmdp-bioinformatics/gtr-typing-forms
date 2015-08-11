<!DOCTYPE html>
<html lang="en">
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

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/gif">

    <title>HGTR - Histoimmunogenetics Genotyping Test Registration</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/agency.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="https://bethematch.org/"><img src="<?php echo base_url('assets/img/btm_logo.png');?>"></img></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="#page-top">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#resources">Resources</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#submission">Submission</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in col-md-8 col-md-offset-2">HGTR: Histoimmunogenetics Genotyping Test Registration</div>
                <div class=" red-border col-md-4 col-md-offset-4" >This site is a non-production proof of concept</div>
                <div>
                    <div class='col-md-6 col-md-offset-3'>
                    <p class='lead'>Metadata on genotyping 
                        methodology can be stored in XML format. The forms in this site will generate that XML file.</p>
                    </div>
                        <div class='container'>
                        <div class='col-md-4 col-md-offset-4' >
                        <form role="form" method="POST" action="index.php/form">
                        <div class="form-group">
                          <label for="gtr_form_selection">Select a submission form:</label><br/><br/>
                          <select name="form_select"  class="form-control" id="gtr_form_selection">
                            <option value="lab">Lab</option>
                            <option value="vendor">Vendor</option>
                            <option value="clinicaltest">Clinical Test</option>
                            <option value="researchtest">Research Test</option>
                            <option value="kit" selected="selected">Kit</option>
                          </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Continue</button>
                        </form>
                        </div>
                        </div>

                </div><br><p>or</p><br>
                <a href="#about" class="page-scroll btn btn-primary">Tell Me More</a>
            </div>
        </div>
    </header>


 <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">The GTR and HGTR</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="text-muted">
                    Currently, the NCBI Genetic Testing Registry (GTR) houses data from labs that includes clinical tests and research tests.
                    Tests can describe instruments, platforms, and manufactured products used, but has no standardized way
                    to reference these products. We have proposed to add entries for manufactured products, such as vendor kits,
                    so that metadata on them is stored and can be referenced internally from other test submissions and externally
                    by other formats, such as HML.
                    </br>
                    The benefit to NMDP in storing kit information is to preserve HLA genotyping metadata such as the specific kit version, primers, probes, and typing methodology.
                    </p>
                </div>
            </div>
        </div>
    </section>
	

    <!-- GTR Overview Section -->
    <section id="resources">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Resources</h2>
                    <h3 class="section-subheading text-muted">Places to learn more</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-3">
				<a href="http://www.ncbi.nlm.nih.gov/gtr/" target="blank">
                    <span class="fa-stack fa-3x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                    </span>
				</a>
                    <h4 class="service-heading">GTR</h4>
                    <p class="text-muted">The Genetic Testing Registry provides a central location for voluntary submission of genetic test information by providers.</p>
					<p>The GTR website may be found by clicking on the icon above.</p>
                </div>
                <div class="col-md-3">
				<a href="ftp://ftp.ncbi.nlm.nih.gov/pub/GTR/data/gtr_ftp.xml.gz" target="blank">
                    <span class="fa-stack fa-3x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-exchange fa-stack-1x fa-inverse"></i>
                    </span>
				</a>
                    <h4 class="service-heading">Data</h4>
                    <p class="text-muted">The overarching goal of the GTR is to advance the public health 
					and research into the genetic basis of health and disease.</p>
					<p>The data is freely available in full detail through FTP. Click above to download.</p>
                </div>
                <div class="col-md-3">
				<a href="ftp://ftp.ncbi.nlm.nih.gov/pub/GTR/submission_templates/GTRSubmission.3.xsd" target="blank">
                    <span class="fa-stack fa-3x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-file-code-o fa-stack-1x fa-inverse"></i>
                    </span>
				</a>
                    <h4 class="service-heading">Schema</h4>
                    <p class="text-muted">The scope includes the test's purpose, methodology, validity, 
					evidence of the test's usefulness, and laboratory contacts and credentials.</p>
					<p>A schema for submission is available from GTR by clicking the icon above.</p>
                </div>
                <div class="col-md-3">
                <a href="https://github.com/nmdp-bioinformatics/hgtr" target="blank">
                    <span class="fa-stack fa-3x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                    <h4 class="service-heading">GitHub</h4>
                    <p class="text-muted">This is an open source project. This site is integrated with GitHub.</p>
                    <p>Click the link above to find this project on GitHub.</p>
                </div>
            </div>
        </div>
    </section>
	
	

    <!-- Submission Section -->
    <section id="submission" class="bg-light-gray">
        <div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
                    <h2 class="section-heading">Submission</h2>
                    <h3 class="section-subheading text-muted">GTR accepts XML submissions. We have created forms to generate an XML file for you.</h3>
                </div>
            <center>
					<a href="<?php echo base_url('index.php/form_select');?>" class="btn btn-xl">Create a GTR XML file</a>
					</center>
        </div>
    </section>
	

   

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?php echo base_url('assets/js/classie.js');?>"></script>
    <script src="<?php echo base_url('assets/js/cbpAnimatedHeader.js');?>"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url('assets/js/jqBootstrapValidation.js');?>"></script>
    <script src="<?php echo base_url('assets/js/contact_me.js');?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/js/agency.js');?>"></script>
	
	<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      margin: auto;
}
.navbar-header a{
    padding-top: 0;
    padding-bottom: 60;
}
</style>
  </style>

</body>

</html>

