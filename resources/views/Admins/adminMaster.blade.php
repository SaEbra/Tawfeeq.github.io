
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="manifest" href="manifest.json">
        <title>Tawfeeq-Admin</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
         <!-- <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/css/intlTelInput.css">
        
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/adminstyle.css" rel='stylesheet' type='text/css' />
        <!-- font CSS -->
        <link rel="icon" href="favicon.ico" type="image/x-icon" >
        <!-- font-awesome icons -->
        <link href="css/font-awesome.css" rel="stylesheet">
 
        <!-- //font-awesome icons -->
        <!-- js-->
        <script src="js/jquery-1.11.1.min.js"></script>
 
        <!--webfonts-->
        <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <!--//webfonts--> 
        <!-- Metis Menu -->
        <script src="js/metisMenu.min.js"></script>
        <script src="js/custom.js"></script>
        <link href="css/custom.css" rel="stylesheet">
        
        <!-- for Alert And Confirm msg -->

        <link href="css/jquery-confirm.css" rel="stylesheet"> 
        <script src="js/jquery-confirm.js"></script>

        <!-- Magnific Popup core CSS file for show testimonials page -->
        <link rel="stylesheet" href="css/Magnific-Popup/magnific-popup.css">

        <!-- Magnific Popup core JS file for show testimonials page -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 

        <script src="css/Magnific-Popup/jquery.magnific-popup.min.js"></script>
        <script src="css/Magnific-Popup/jquery.magnific-popup.js"></script>

        <script src="js/MyNotification.js"></script>


            <!--//Metis Menu -->
    </head>

	<script src="https://www.gstatic.com/firebasejs/5.5.3/firebase.js"></script>
	
	<script src="/__/firebase/5.5.8/firebase-app.js"></script>
<script src="/__/firebase/5.5.8/firebase-auth.js"></script>
<script src="/__/firebase/5.5.8/firebase-database.js"></script>
<script src="/__/firebase/5.5.8/firebase-storage.js"></script>
<script src="/__/firebase/5.5.8/firebase-messaging.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyA784TeHg165cMfYeIjQKKUbGGqVZ059fI",
            authDomain: "tawfeeq-zawaj.firebaseapp.com",
            databaseURL: "https://tawfeeq-zawaj.firebaseio.com",
            projectId: "tawfeeq-zawaj",
            storageBucket: "tawfeeq-zawaj.appspot.com",
            messagingSenderId: "782308136691"
        };
        firebase.initializeApp(config);
    </script>
    <script type="text/javascript" src="http://localhost:8000/js/MainFormsSubmit.js"></script>  

<body data-spy="scroll">


  <div class="main-content">
		<!--left-fixed -navigation-->
		<div class="sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right dev-page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" id="cbp-spmenu-s1">
					<div class="scrollbar scrollbar1">
						<ul class="nav" id="side-menu">
							<li>
								<a href="ourGoals" class="active"><i class="fa fa-home nav_icon"></i>هدفنا</a>
							</li>
							<li>
								<a href="whoAreWe"><i class="fa fa-cogs nav_icon"></i>من نحن</a>
								
								<!-- /nav-second-level -->
							</li>
							<li>
								<a href="warnings"><i class="fa fa-book nav_icon"></i>تحذير وشروط</a>
								
								 
							</li>
							
							
							<li>
								<a href="howItWorks">    <i class="fa fa-file-text-o nav_icon"> </i>طريقة عمل الموقع</a>
                            </li>
                            
                            <li>
								<a href="payData">    <i class="fa fa-file-text-o nav_icon"> </i>   بيانات الدفع  </a>
							</li>
							
							<li>
								<a href="ContactUs"><i class="fa fa-envelope nav_icon"></i>Report abusive behavior</a>
								
							</li>
							
							<li>
								<!-- <a href="SignUp"><i class="fa fa-user nav_icon" aria-hidden="true"></i>Add new Admin</a> -->
								<a href="UpdateAccount"><i class="fa fa-user nav_icon" aria-hidden="true"></i>Users</a>
							</li>
							
						</ul>
					</div>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--logo -->
				<div class="logo">
					<a href="admin.html">
						<ul>	
							<!-- <li><img src="#" alt="" /></li>-->
							<li><h1>Tawfeeq</h1></li>
							<div class="clearfix"> </div>
						</ul>
					</a>
                </div>
				<!--notifications 	
				<div class="header-right header-right-grid">
					<div class="profile_details_left">
						<!--notifications of menu start -
						<ul class="nofitications-dropdown">
							<li class="dropdown head-dpdn">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="ANotification"><i class="fa fa-envelope"></i><span class="badge">12</span></a>
			
						
								

								<ul class="dropdown-menu anti-dropdown-menu">
									<li>
										<div class="notification_header">
											<h3>You have new messages</h3>
										</div>
									</li>
			
									<li>
									<!--<a href="#"> 
									   <div class="user_img"><img src="images/3.png" alt=""></div>
									   <div class="notification_desc">
										<p>hello world </p>
										
										</div>
									   <div class="clearfix"></div>	
									<!--</a>
									</li>
									 
								

									<li>
										<div class="notification_bottom">
											<a href="ContactUs">See all messages</a>
										</div> 
									</li>
								</ul>
							</li> 
						</ul>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!-- //notifications -->	
				

				<div class="clearfix"> </div>
			</div>
		
			<div class="header-right">
				
				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><h5>Admin Panel</h5></span> 
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								
								<li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<div class="container">
		<div id="page-wrapper">
			<div class="main-page">
            @yield('main_content')

                <!--
                <div class="row four-grids"  >

					<div class="col-md-6 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-cogs"></i>
								</div>
							</div>
							<div class="grid-right">
								<a href="Service.html"><i class="nav_icon"></i><h1>Services</h1></a>
								<p></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					<div class="col-md-6 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-book"></i>
								</div>
							</div>
							<div class="grid-right">
								<a href="Testimonials.html"> <h2>Reports</h2></a>
								<span></span>
								<p></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
                </div>
                
                <div class="row four-grids"   >
					
					<div class="col-md-6 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-file-text-o"></i>
								</div>
							</div>
							<div class="grid-right">
								<a href="ShowTestimonials"> <h2>Updates</h2></a>
								<p></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					
					<div class="col-md-6 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-file-text-o"></i>
								</div>
							</div>
							<div class="grid-right">
								<a href="AboutUs">    <i class="nav_icon"> </i><h2>About Us</h2></a>
								<p></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"> </div>
                </div>
                
				 <div class="row four-grids"   >
				 
					<div class="col-md-6 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-envelope"></i>
								</div>
							</div>
							<div class="grid-right">
								<a href="ContactUs"><i class="nav_icon"></i><h2>Report abusive behavior</h2></a>
								<p></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="col-md-6 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-user"></i>
								</div>
							</div>
							<div class="grid-right">
								<a href="UpdateAccount"><i class="nav_icon" aria-hidden="true"></i><h2>Users</h2></a>
								<p></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					<div class="clearfix"> </div>
				</div>	
            -->
			</div> 
            </div>
            
        </div>
        

  
      <div class="container"  > <br>
          
       
      </div>
   
    
        
			
		
		<!-- Bootstrap Core JavaScript --> 
		
        <script type="text/javascript" src="js/bootstrap.min.js"></script>         
		
		<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- Bootstrap Core JavaScript --> 

<!-- jQuery -->
 <script type="text/javascript" src="http://localhost:8000/js/formJs.js"></script>  
  

  

  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


 
 

<script type="text/javascript"> 
   
    firebase.auth().languageCode = "{{ trans('app.lang') }}";
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container'); 
      
    $('#signUp').click(function(){
        var phoneNumber=document.getElementById("phoneNoId").value;
        var Title = document.getElementsByClassName("selected-flag");
        var dialCode=Title[0].title;
        var countryCode = dialCode.split(":").pop(-1);
        document.getElementById("countryCode").value = countryCode;
        
        //alert(document.getElementById("countryCode").value);
        
        if(phoneNumber!='')
        {
            firebase.auth().signInWithPhoneNumber(countryCode+phoneNumber, window.recaptchaVerifier) 
            .then(function(confirmationResult) { 
            window.confirmationResult = confirmationResult; 
            var div1 = document.getElementById("firstStage");  
            div1.style.display = "none";
            var div2 = document.getElementById("secondStage");  
            div2.style.display = "block";
            a(confirmationResult); 
            });

        }
    });
 
     
    $("#signUpWithCode").click(function(){   
        window.confirmationResult.confirm(document.getElementById("verificationcode").value) 
        .then(function(result) {  
        var x = document.getElementsByClassName("registerFormClass");
        x[0].submit(); // Form submission
        
 
        
        }, function(error) { 
        //alert(error); 
        alert('not match');
        });  
        return false;
    });  
  </script>

    <!-- Date picker -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type = "text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type = "text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel = "Stylesheet" type="text/css" /> 
    <script type = "text/javascript">
        
        $(function () {
            $("#txtDate").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:-18"
            });
        });
        
    </script>


   
   <script src="/js/intlTelInput.js"></script>
  <script>
    var input = document.querySelector("#phoneNoId");
     
    window.intlTelInput(input, { 
      
      utilsScript: "build/js/utils.js",
    });
  </script>
</body>
  
</html>