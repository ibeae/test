<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aplikasi Perkembangan Peserta Didik</title>
    <!-- Bootstrap Core CSS -->    
	<link rel ="stylesheet" type="text/css" href="<?php echo base_url();?>assets/default/css/bootstrap.min.css" >
    <!-- Custom CSS -->
	<link rel ="stylesheet" type="text/css" href="<?php echo base_url();?>assets/default/css/scrolling-nav.css" >    
	<link rel ="stylesheet" type="text/css" href="<?php echo base_url();?>assets/default/css/plugin.css" >
	<link rel ="stylesheet" type="text/css" href="<?php echo base_url();?>assets/default/css/theme.css" >

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->   
    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<div class="rbt_bg_gray rbt_ico_left rbt_linear rbt_md rbt_nav_flat rbt_tab rbt_top_left">
					<nav class="navbar">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-target="#rbtNavbar" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
							<a class="navbar-brand page-scroll" href="#page-top">Aplikasi Perkembangan Peserta Didik</a>
						</div>
						<div class="collapse navbar-collapse bg-success" id="rbtNavbar">							
						</div>
					</nav>
					<div class="tab-content">						
						<div class="fade tab-pane active in" id="signin_left">
							 <div class="col-md-4">
								<div class="rbt_form rbt_form_left">
									<div class="rbt_form_header bg-info">
										<h3>Login Siswa / Wali Murid</h3>
									</div>
									<div class="rbt_form_body">
										<form action="<?php echo site_url('siswa/login') ?>" method="post">
											<div class="rbt_input_txt">
											<label for="login_email">Username:</label><input class="form-control" required="" id="login_email" placeholder="Masukkan NISN" type="text" name="username"></div>
											<div class="rbt_input_txt">
											<label for="login_pwd">password:</label><input class="form-control" required="" id="login_pwd" placeholder="password" type="password" name="password"></div>
											<!--div class="rbt_checkbox">												
												<label><a href="#">Forget your password?</a></label>
											</div!-->
											<div class="clearfix form-actions">
												<div class="rbt_form_submit col-md-offset-3 col-md-1">
													<button class="btn btn-info" type="submit">
														<i class="ace-icon fa fa-check bigger-110"></i>
														Masuk
													</button>
												</div>
											</div>
										</form>
									</div>								
								</div>
							</div>							
							 <div class="col-md-8">
							<div class="rbt_form_content_right">
								<h1>Seputar informasi Terbaru</h1>
								<p>
									Fusce auctor, metus eu ultricies vulputate, sapien nibh faucibus ligula, eget sollicitudin augue risus et dolor. Aenean pellentesque, tortor in cursus mattis, ante diam malesuada ligula, ac vestibulum neque turpis ut enim. Cras ornare. Proin ac nisi. Praesent laoreet ante tempor urna. In imperdiet. Nam ut metus et orci fermentum nonummy. Cras vel nunc. Donec feugiat neque eget purus. <a href="#" class="rbt_link_simple">Quisque rhoncus</a>.
								</p>
								<p>
									Fusce auctor, metus eu ultricies vulputate, sapien nibh faucibus ligula, eget sollicitudin augue risus et dolor. Aenean pellentesque, tortor in cursus mattis, ante diam malesuada ligula, ac vestibulum neque turpis ut enim. Cras ornare. Proin ac nisi. Praesent laoreet ante tempor urna. In imperdiet. Nam ut metus et orci fermentum nonummy. Cras vel nunc. Donec feugiat neque eget purus. <a href="#" class="rbt_link_simple">Quisque rhoncus</a>.
								</p>
								<a href="#" class="rbt_link_button_1">learn more</a><a href="#" class="rbt_link_button_2">read more</a>
							</div>
							</div>
						</div>					
				</div>
			</div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/default/js/jquery-2.1.4.min.js" ></script>	
	<script type="text/javascript" src="<?php echo base_url();?>assets/default/js/bootstrap.min.js"></script>    
    
    <!-- Scrolling Nav JavaScript -->
    <!--script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script!-->

</body>

</html>
