<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title> Laporan Perkembangan Peserta Didik</title>
		<meta name="description" content="Web report transaksi arthapulsa" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel ="stylesheet" type="text/css" href="<?php echo base_url();?>assets/default/css/bootstrap.min.css" >
		<link rel ="stylesheet" type="text/css" href="<?php echo base_url();?>assets/default/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/default/css/chosen.min.css" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/default/css/bootstrap-datepicker3.min.css" />		

		<!-- page specific plugin styles -->
		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
		<!-- ace styles -->
		<link rel ="stylesheet" type="text/css" href="<?php echo base_url();?>assets/default/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel ="stylesheet" type="text/css" href="<?php echo base_url();?>assets/default/css/ace-skins.min.css" />
		<link rel ="stylesheet" type="text/css" href="<?php echo base_url();?>assets/default/css/ace-rtl.min.css" />
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<!-- inline styles related to this page -->
		<!-- ace settings handler -->
		<link rel ="stylesheet" type="text/css" href="<?php echo base_url();?>assets/default/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
			.form-group {
			margin-bottom: 2px;
			}
			.form-actions {			
			border-top: 1px solid #e5e5e5;
			display: block;
			margin-bottom: 1px;
			margin-top: 1px;
			padding: 10px;
			}
			.form-control
			{
				height: 30px;
			}
		</style>
	</head>
<? //$ses = $this->session->userdata('logged_in');
	//$nama = $ses['nama']; ?>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small><i class="fa fa-leaf"></i> Perkembangan Peserta Didik</small>
					</a>
				</div>
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url();?>assets/default/images/avatars/users.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small><?=$ses['nama'];;?>
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a id="profil" href="<?=site_url('siswa/profil');?>">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo base_URL()?>siswa/logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<!--script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script!-->
				<ul class="nav nav-list">
					<li class="">
						<a href="<?=site_url('report/');?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Home </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?=site_url('siswa/profil');?>">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Biodata Diri </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?=site_url('siswa/nilai');?>">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Data Nilai </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?=site_url('siswa/penghubung');?>">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Penghubung </span>
						</a>
						<b class="arrow"></b>
					</li>
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?=site_url('report/');?>">Home</a>
							</li>
							<li class="active"><?= $this->uri->segment(2)?></li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">						
						<div class="row">
							<div class="col-xs-12" id="conten_data">
								<!-- PAGE CONTENT BEGINS -->
								<?php $this->load->view($page);?>
								
								
								<div class="hr hr-18 dotted hr-double"></div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">ibeae</span> &copy; 2016
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/default/js/jquery-2.1.4.min.js" ></script>	

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->

	<script type="text/javascript">		
		var myApp;
		myApp = myApp || (function () {
			var pleaseWaitDiv = $('<div class="modal fade" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><h4>Tunggu Sebentar... </h4></div><div class="modal-body"><div class="progress">  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"  aria-valuemin="0" aria-valuemax="100" style="width:95%">95% Complete</div></div></div></div></div></div>');
			return {
				showPleaseWait: function() {
					pleaseWaitDiv.modal();
				},
				hidePleaseWait: function () {
					pleaseWaitDiv.modal('hide');
				},
			};
		})();
    $(document).ready(function(){	
		/*$.ajaxSetup({url: "<?php echo site_url('report/inbox');?>",	beforeSend:function(){
			myApp.showPleaseWait();
			}, success: function(result){
			myApp.hidePleaseWait();
			$("#conten_data").html(result);}});
			
		$.ajax();		
		 $("#conten_data").on("click", "div.btn-group a", function() {	
			$("#simple-table").css("opacity","0.4");
			$.ajax({
				type: "GET",
				url: $(this).attr('href'),
				data: {},
				beforeSend:function(){
				 myApp.showPleaseWait();
				},
				success: function(response)
				{
					myApp.hidePleaseWait();
					$("#simple-table").css("opacity","1");
					$("#conten_data").html(response);
				}
			}); 
				return false;			
		});*/
		/*$("ul.nav-list li>a, li a#profil").click(function() {
			if($(this).attr('href')!="#"){
			var target = $(this).attr('href');			
			$("ul.breadcrumb li.active").html($(this).text());
			$.ajax({
				type: "GET",
				url: target,
				data: {},
				beforeSend:function(){
				 myApp.showPleaseWait();
				},
				success: function(response)
				{
					myApp.hidePleaseWait();					
					$("#conten_data").html(response);
				}
			}); 
				return false;
			}
		});*/
    });
	</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");		
				
		</script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/default/js/bootstrap.min.js"></script>
		<!-- page specific plugin scripts -->
		<!-- ace scripts -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/default/js/ace-elements.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/default/js/ace.min.js"></script>
		<script src="<?php echo base_url();?>assets/default/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/default/js/chosen.jquery.min.js"></script>
		<!-- inline scripts related to this page -->
		<script>
			$('.date-picker').datepicker({
				autoclose: true,
				todayHighlight: true
			})	
			$('.chosen-select').chosen({allow_single_deselect:true}); 
			//resize the chosen on window resize
			$(window)
			.off('resize.chosen')
			.on('resize.chosen', function() {
				$('.chosen-select').each(function() {
					var $this = $(this);
					$this.next().css({'width': $this.parent().width()});
				})
			}).trigger('resize.chosen');
			//resize chosen on sidebar collapse/expand
			$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
				if(event_name != 'sidebar_collapsed') return;
				$('.chosen-select').each(function() {
					var $this = $(this);
					$this.next().css({'width': $this.parent().width()});
				})
			});
		</script>
		
	</body>
</html>