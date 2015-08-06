<html lang="en">
<head>
<link rel="icon" href="<?=base_url()?>favicon.ico" type="image/gif">
<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/bootstrap-theme.min.css');?>" rel="stylesheet">
<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
<title>HGTR - Histoimmunogenetics Genotyping Test Registration</title>
</head>


<div id='header'>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
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
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					<li>
                        <a class="page-scroll" href="<?php echo base_url();?>">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url('index.php/form_select');?>">Form Selection</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>
<style>
.navbar-header a{
	padding-top: 0;
	padding-bottom: 60;
}
</style>

<!-- end header -->