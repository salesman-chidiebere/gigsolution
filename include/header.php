<?php
	require('dbmaster/config.php');

// If user is logged in, header them away
if(!isset($_SESSION['loginuser'])){
	//header("location: index.php");
    //exit();
	
	echo '<div id="id02" class="modal" style="display:block;">';
                echo '<form class="modal-content animate" action="'. $_SERVER['PHP_SELF'] .'" method="POST" style="width:30%">
                        <div class="container" >
                    	
                    	<h5 style="text-align:center;color:blue; margin-top:20px;">To keep track of your Gigs</h5>
                    	<div>
							<input type="text" name="loginuser" placeholder="Enter your Username"/>
						</div>
                    	
                            	    <button type="submit" style="width:95%" name="btn-cuser" value="btn-cuser">Continue</button>';
                    	    echo '<p></p><p></p>
                    </div>
                </form>
            </div>';
}

	if(isset($_POST["loginuser"])){
		
		$data0= $_POST["loginuser"];
		
		if ($data0 != ""){
			$_SESSION['loginuser']= $data0;
			header("location: index.php");
			exit();
			
		}
		else{
			echo "<script type='text/javascript'>";
			echo "alert('Please enter your username')";
			echo "</script>";
		}
	}
?>

<!DOCTYPE html>
	<html>
		<head>
			<title>Gig Test</title>
			<meta name="viewport" content="width=device-width, initial-scale=1" /> 
			<link rel="icon" type="image/png" href="img/logo1.png"/>
			<link href="css/tagger.css" type="text/css" rel="stylesheet">
			<link href="css/style.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="css/index.css">
			<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
			
			<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>
		</head>
		
		<style>
            #dataTable{
				display: block;
				overflow-x: auto;
			}
			.avatar1 {
			  vertical-align: middle;
			  width: 30px;
			  height: 30px;
			  border-radius: 50%;
			}
        </style>
		
		<body class="app">
			<div>
				<div class="sidebar">
					<div class="sidebar-inner">
						<div class="sidebar-logo">
							<div class="peers ai-c fxw-nw">
								<div class="peer peer-greed">
									<a class="sidebar-link td-n" href="dashboard.php" class="td-n">
										<div class="peers ai-c fxw-nw">
											<div class="peer">
												<div class="logo">
													<img src="img\logo.png" alt="Q-EPRP LOGO" width="60px" style="margin-top:10px">
												</div>
											</div>
											<div class="peer peer-greed">
												<h4 class="lh-1 mB-0 logo-text" style="color:#2874a6;">Test</h4>
											</div>
										</div>
									</a>
								</div>
								
								<div class="peer">
									<div class="mobile-toggle sidebar-toggle">
										<a href="index.php" class="td-n">
											<i class="ti-arrow-circle-left"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						
						<ul class="sidebar-menu scrollable pos-r">
                            <li class="nav-item mT-30 active">
								
							</li>
							<li class="nav-item">
								<a class="sidebar-link" href="#">
									<span class="icon-holder"><i class="c-deep-orange-500 ti-home"></i> </span>
									<span class="title">dashboard</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="dropdown-toggle" href="index.php">
								        <span class="icon-holder">
								            <i class="c-orange-500 ti-desktop"></i> 
								        </span>
								    <span class="title">Gigs</span> 
								    </a>
							</li>
							<li class="nav-item">
								<a class="sidebar-link" href="#">
									<span class="icon-holder"><i class="c-deep-orange-500 fa fa-building-o "></i> </span>
									<span class="title">Company</span>
								</a>
							</li>
							<li class="nav-item ">
								<a class="dropdown-toggle" href="#">
								        <span class="icon-holder">
								            <i class="c-orange-500 ti-user"></i> 
								        </span>
								    <span class="title">Account</span> 
								    </a>
							</li>
							<li class="nav-item ">
								<a class="dropdown-toggle" href="logout.php">
								        <span class="icon-holder">
								            <i class="c-orange-500 ti-power-off"></i> 
								        </span>
								    <span class="title">Logout</span> 
								    </a>
							</li>
							
						</ul>
					</div>
				</div>
				
			    <div class="page-container">	
				    <div class="header navbar">
				        <div class="header-container">
				            <ul class="nav-left">
				                <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
				                <li class="search-box"><a class="search-toggle no-pdd-right" href="javascript:void(0);"><i class="search-icon ti-search pdd-right-10"></i> <i class="search-icon-close ti-close pdd-right-10"></i></a></li>
				                <li class="search-input"><input class="form-control" type="text" placeholder="Search..." style="height:30px;"></li>
				            </ul>
				            <ul class="nav-right">
							
								<ul class="nav-right">
									 <li class="notifications dropdown">
										<span class="counter bgc-red">3</span> 
										<a href="adminator.html" class="dropdown-toggle no-after" data-toggle="dropdown">
										<i class="ti-bell"></i>
										</a>
										<ul class="dropdown-menu">
										   <li class="pX-20 pY-15 bdB">
											  <i class="ti-bell pR-10"></i> 
											  <span class="fsz-sm fw-600 c-grey-900">Notifications</span>
										   </li>
										   <li>
											  <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
												 <li>
													<a href="adminator.html" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
													   <div class="peer mR-15">
														  <img class="w-3r bdrs-50p" src="../../randomuser.me/api/portraits/men/1.jpg" alt="">
													   </div>
													   <div class="peer peer-greed">
														  <span><span class="fw-500">John Doe</span> <span class="c-grey-600">added a new <span class="text-dark">Gig</span></span></span>
														  <p class="m-0"><small class="fsz-xs">5 mins ago</small></p>
													   </div>
													</a>
												 </li>
												 <li>
													<a href="adminator.html" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
													   <div class="peer mR-15"><img class="w-3r bdrs-50p" src="../../randomuser.me/api/portraits/men/2.jpg" alt=""></div>
													   <div class="peer peer-greed">
														  <span><span class="fw-500">Moo Doe</span> <span class="c-grey-600">updated his <span class="text-dark">Gig</span></span></span>
														  <p class="m-0"><small class="fsz-xs">7 mins ago</small></p>
													   </div>
													</a>
												 </li>
												 <li>
													<a href="adminator.html" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
													   <div class="peer mR-15"><img class="w-3r bdrs-50p" src="../../randomuser.me/api/portraits/men/3.jpg" alt=""></div>
													   <div class="peer peer-greed">
														  <span><span class="fw-500">Admin</span> <span class="c-grey-600">deleted your <span class="text-dark">Gig</span></span></span>
														  <p class="m-0"><small class="fsz-xs">10 mins ago</small></p>
													   </div>
													</a>
												 </li>
											  </ul>
										   </li>
										   <li class="pX-20 pY-15 ta-c bdT"><span><a href="#" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications <i class="ti-angle-right fsz-xs mL-10"></i></a></span></li>
										</ul>
									 </li>
									 <li class="notifications dropdown">
										<span class="counter bgc-blue">3</span> <a href="adminator.html" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-email"></i></a>
										<ul class="dropdown-menu">
										   <li class="pX-20 pY-15 bdB"><i class="ti-email pR-10"></i> <span class="fsz-sm fw-600 c-grey-900">Emails</span></li>
										   <li>
											  <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
												 <li>
													<a href="adminator.html" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
													   <div class="peer mR-15"><img class="w-3r bdrs-50p" src="../../randomuser.me/api/portraits/men/1.jpg" alt=""></div>
													   <div class="peer peer-greed">
														  <div>
															 <div class="peers jc-sb fxw-nw mB-5">
																<div class="peer">
																   <p class="fw-500 mB-0">John Doe</p>
																</div>
																<div class="peer"><small class="fsz-xs">5 mins ago</small></div>
															 </div>
															 <span class="c-grey-600 fsz-sm">Want to create your own customized data generator for your app...</span>
														  </div>
													   </div>
													</a>
												 </li>
												 <li>
													<a href="adminator.html" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
													   <div class="peer mR-15"><img class="w-3r bdrs-50p" src="../../randomuser.me/api/portraits/men/2.jpg" alt=""></div>
													   <div class="peer peer-greed">
														  <div>
															 <div class="peers jc-sb fxw-nw mB-5">
																<div class="peer">
																   <p class="fw-500 mB-0">Moo Doe</p>
																</div>
																<div class="peer"><small class="fsz-xs">15 mins ago</small></div>
															 </div>
															 <span class="c-grey-600 fsz-sm">Want to create your own customized data generator for your app...</span>
														  </div>
													   </div>
													</a>
												 </li>
												 <li>
													<a href="adminator.html" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
													   <div class="peer mR-15"><img class="w-3r bdrs-50p" src="../../randomuser.me/api/portraits/men/3.jpg" alt=""></div>
													   <div class="peer peer-greed">
														  <div>
															 <div class="peers jc-sb fxw-nw mB-5">
																<div class="peer">
																   <p class="fw-500 mB-0">Lee Doe</p>
																</div>
																<div class="peer"><small class="fsz-xs">25 mins ago</small></div>
															 </div>
															 <span class="c-grey-600 fsz-sm">Want to create your own customized data generator for your app...</span>
														  </div>
													   </div>
													</a>
												 </li>
											  </ul>
										   </li>
										   <li class="pX-20 pY-15 ta-c bdT"><span><a href="#" class="c-grey-600 cH-blue fsz-sm td-n">View All Email <i class="fs-xs ti-angle-right mL-10"></i></a></span></li>
										</ul>
									 </li>
									 
									 <li class="">
										<a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
    				                    <i class="ti-settings"></i>
    				                 
										</a>
									</li>
				                
    				            
    				            <li class="dropdown">
    				                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
										<div class="peer mR-10"><img src="img/img_avatar.png" alt="Avatar" class="avatar1"></div>
    				                    
    				                </a>
    				                <ul class="dropdown-menu fsz-sm">
    				                    <li>
    				                        <a href="profile.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
    				                            <i class="ti-user mR-10"></i> 
    				                            <span>Profile</span>
    				                        </a>
    				                    </li>
    				                    <li>
    				                        <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
    				                            <i class="ti-email mR-10"></i> <span>Messages</span>
    				                        </a>
    				                    </li>
    				                    <li>
    				                        <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
    				                            <i class="ti-bell mR-10"></i> 
    				                            <span>Notification</span>
    				                        </a>
    				                    </li>
    				                    <li role="separator" class="divider"></li>
    				                    <li>
    				                        <a href="logout.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
    				                            <i class="ti-power-off mR-10"></i> 
    				                            <span>Logout</span>
    				                        </a>
    				                    </li>
    				                </ul>
    				            </li>
    				        </ul>
    				    </div>
    				</div>
    				
    				
					
					
					