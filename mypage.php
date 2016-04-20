<?php 
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
    	<!-- meta character set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>myPage - Home</title>		
		<!-- Meta Description -->
		
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- CSS
		================================================== -->
		
		
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/fonts-google.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/jquery.fancybox.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/owl.carousel.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/slit-slider.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css">

		<!-- Modernizer Script for old Browsers -->
        <script src="js/modernizr-2.6.2.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter=new google.maps.LatLng(14.558356,121.009392);
var marker;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:18,
  panControl: false,
  zoomControl: false,
  mapTypeControl: false,
  scaleControl: false,
  streetViewControl: false,
  overviewMapControl: false,
  rotateControl: false,    
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:new google.maps.LatLng(14.557437,121.008947),
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
		
    </head>
	
    <body id="body">

		<!-- preloader -->
		<div id="preloader">
            <div class="loder-box">
            	<div class="battery"></div>
            </div>
		</div>
		<!-- end preloader -->

        <!--
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-inverse navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
                    </button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
					<h1 class="navbar-brand">
						<a href="#body">myPAGE<?php if(isset($_SESSION["ID"])){ echo "-".$_SESSION["Type"]." ".$_SESSION["Name"]; }?></a>
					</h1>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav">
                        <li><a href="#body">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#service">Services</a></li>
                        <li><a href="#programs">Programs</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                        <?php if(!isset($_SESSION["ID"])){ ?>
                        <li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
                        <?php  } else{?>
                        <li><a href="logout.php" id="logout">Logout</a></li>
                        <?php  }?>
                    </ul>
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->
		
		<main class="site-content" role="main">
		
        <!--
        Home Slider
        ==================================== -->
		
		<section id="home-slider">
            <div id="slider" class="sl-slider-wrapper">

				<div class="sl-slider">
				<?php if(!isset($_SESSION["ID"])){ ?>
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="bg-img bg-img-1"></div>
						<div class="slide-caption">
                            <div class="caption-content">
                                <h2 class="animated fadeInDown">Sign In</h2>
                                <span class="animated fadeInDown">Login to Enroll Online / View Tuition / Inquire</span>
                                <a href="#" class="btn btn-blue btn-effect"data-toggle="modal" data-target="#loginModal">Login</a>
                            </div>
                        </div>
					</div>
					<?php } ?>
					<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
					
						<div class="bg-img bg-img-2"></div>
						<div class="slide-caption">
                            <div class="caption-content">
                                <h2 class="animated fadeInDown">SERVICES</h2>
                                <span class="animated fadeInDown">Shows the Services offered by the Application</span>
                                <input type="hidden" id="type" name="type" value="<?php if(isset($_SESSION["Type"])){ echo $_SESSION["Type"]; } else{ echo "none"; }?>">
                                <a href="#" class="btn btn-blue btn-effect" id="servicesBtn">View Services</a>
                            </div>
                        </div>
						
					</div>
					
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="bg-img bg-img-3"></div>
						<div class="slide-caption">
                            <div class="caption-content">
                                <h2 class="animated fadeInDown">Create Account</h2>
                                <span class="animated fadeInDown">Signup to recieve our latest news / updates. </span>
                                <a href="#" class="btn btn-blue btn-effect"data-toggle="modal" data-target="#createAccountModal">Signup</a>
                            </div>
                        </div>
					</div>
				</div><!-- /sl-slider -->

                <!-- 
                <nav id="nav-arrows" class="nav-arrows">
                    <span class="nav-arrow-prev">Previous</span>
                    <span class="nav-arrow-next">Next</span>
                </nav>
                -->
                
                <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
                    <a href="javascript:;" class="sl-prev">
                        <i class="fa fa-angle-left fa-3x"></i>
                    </a>
                    <a href="javascript:;" class="sl-next">
                        <i class="fa fa-angle-right fa-3x"></i>
                    </a>
                </nav>
                

				<nav id="nav-dots" class="nav-dots visible-xs visible-sm hidden-md hidden-lg">
					<span class="nav-dot-current"></span>
					<span></span>
					<span></span>
				</nav>

			</div><!-- /slider-wrapper -->
		</section>
		
        <!--
        End Home SliderEnd
        ==================================== -->
			
			<!-- about section -->
			<section id="about" >
				<div class="container">
					<div class="row">
						<div class="col-md-4 wow animated fadeInLeft">
							<div class="recent-works">
								<h3>Vision/Mission</h3>
								<div id="works">
									<div class="work-item">
										<b>Vision</b>
										<br>
										<br>
										<p>iACADEMY envisions global recognition for developing innovative programs that hone future leaders and visionaries in ﬁelds that contribute signiﬁcantly to progress and growth in society</p>
									</div>
									<div class="work-item">
										<b>Mission</b>
										<br>
										<br>
										<p>iACADEMY commits to produce future leaders and trailblazers by providing a venue for the incubation and realization of ideas through lasting and meaningful partnerships with leading industry players.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-md-offset-1 wow animated fadeInRight">
							<div class="welcome-block">
								<h3>Welcome to iACADeMY</h3>								
						     	 <div class="message-body">
									<!--  <img src="img/member-1.jpg" class="pull-left" alt="member"> --> <!-- MEMBER PIC -->
						       		<p>
						       			Our college is located in the heart of Makati City’s Central Business District. We offer specialized courses in Computing, Business, and Design, which are geared towards preparing students for a highly competitive professional world.

										We are committed to producing future trailblazers and game changers in the industry through programs that provide a balance of theory-based and experience-based learning opportunities. With guidance from a faculty of practicing professionals and a 960-hour internship program with our prestigious partner companies, students are able to gain industry-relevant knowledge and training that will make them assets to future employers. 
										
										Be a Game Changer. Dare to be different here.
									</p>
						     	 </div>
						    </div>
						</div>
					</div>
				</div>
			</section>
			<!-- end about section -->
			
			
			<!-- Service section -->
			<section id="service">
				<div class="container">
					<div class="row">
					
						<div class="sec-title text-center">
							<h2 class="wow animated bounceInLeft">Services</h2>
							<p class="wow animated bounceInRight">The Key Features of our Job</p>
						</div>
						
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn">
							<div class="service-item">
								<a>
								<div class="service-icon">
									<i class="fa fa-user fa-3x"></i>
								</div>
								<h3>Student Profile</h3>
								<p>View the Student's profile that are enrolled.</p>
								</a>
							</div>
						</div>
					
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.3s">
							<div class="service-item">
								<a>
								<div class="service-icon">
									<i class="fa fa-tasks fa-3x"></i>
								</div>
								<h3>Inquiries</h3>
								<p>Inquire to the school's offered courses.</p>
								</a>
							</div>
						</div>
					
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.6s">
							<div class="service-item">
								<div class="service-icon">
								<a>
									<i class="fa fa-university fa-3x"></i>
								</div>
								<h3>Online Enrollment</h3>
								<p>Enroll online for new students and transferees.</p>
								</a>
							</div>
						</div>
					
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.9s">
							<div class="service-item">
								<a>
								<div class="service-icon">
									<i class="fa fa-heart fa-3x"></i>
								</div>
								<h3>Support</h3>
								<p>Online help from the staff.</p>
								</a>							
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<section id="programs" class="parallax">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="sec-title text-center white wow animated fadeInDown">
								<h2>Programs</h2>
							</div>
							<div id="testimonial" class=" wow animated fadeInUp">
								<div class="testimonial-item text-center">
									<i class="fa fa-desktop fa-3x"></i>
									<div class="clearfix">
										<span><p style="font-size:28px">COMPUTING</p></span>
										<p>
											The management of Computing systems and communication infrastructure is key to all organisations, 
											businesses, and workplaces. If you are passionate about computers and IT systems or would like to 
											pursue higher education studies before starting a career, this Institute is perfect for you.
										</p>
										<br>
										<p>
											Computer Science courses can lead to a variety of careers for students who also get the opportunity 
											to specialise in the area of their choice, including Software Engineering, Website Development or Game Development.
										</p>
										</div>
								</div>
							
								<div class="testimonial-item text-center">
									<i class="fa fa-money fa-3x"></i>
									<div class="clearfix">
										<span><p style="font-size:28px">Business</p></span>
										<p>
											Business courses are popular and lead to many career opportunities as they are comprehensive and 
											equip students with many transferable skills. It provides you with a thorough grounding in English 
											and with the necessary vocational subjects.
										</p>
										<br>
										<p>
											Business courses can lead to a variety of careers for students who also get the opportunity 
											to specialise in the area of their choice, including Business Management and Financial Management.
										</p>	
									</div>
								</div>
								
								<div class="testimonial-item text-center">
									<i class="fa fa-paint-brush fa-3x"></i>
									<div class="clearfix">
										<span><p style="font-size:28px">Design</p></span>
										<p>
											The Institute of Architecture and Fine Arts aims to be the center of excellence in architecture and fine arts. 
											Nurturing the spirit of innovativeness and creativity, the Institute has produced students and graduates, 
											who have won in numerous competitions and who have displayed a highly motivated sense of professionalism in the workplace.
										</p>
										<br>
										<p>
											The Master programme trains professional figures with qualified management career prospects in the foremost 
											sectors of tourism, such as: Animation, Multimedia Arts, and Fashion Design & Technology.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end Testimonial section -->
			
			<!-- Price section -->
			<section id="price">
				<div class="container">
					<div class="row">
						<div class="sec-title text-center wow animated fadeInDown">
							<h2>Tuition Fees</h2>
							<p>Prices are based on Regular Students only</p>
						</div>
					<?php if(isset($_SESSION["ID"])){ ?>
						
						
						<div class="col-md-4 wow animated fadeInUp">
							<div class="price-table text-center">
								<span>Website Development</span>
								<a role="button" data-toggle="collapse" data-parent="#accordion" href=".computer-science-collapse" aria-expanded="false" aria-controls="website-development-collapse">
								<div class="value" id="website-development-head">
									<span>₱</span>
									<span>65,900</span><br>
									<span>Semester</span>
								</div>
								</a>
								<div id="website-development-collapse" class="panel-collapse collapse computer-science-collapse" role="tabpanel" aria-expanded="false" aria-labelledby="website-development-head">
									<ul>
										<li>Tuition Fee:<br>₱42,900</li>
										<li>Laboratory Fee:<br>₱8,000</li>
										<li>Miscellaneous Fee:<br>₱15,000</li>
										<li><a href="#">Apply for Website Development</a></li>
									</ul>
								</div>
								<a id="csi-tgle" class="fa fa-arrow-down fa-1x" role="button" data-toggle="collapse" data-parent="#accordion" href=".computer-science-collapse" aria-expanded="false" aria-controls="software-engineering-collapse">
									
								</a>
							</div>
						</div>
						
						<div class="col-md-4 wow animated fadeInUp" data-wow-delay="0.4s">
							<div class="price-table featured text-center">
								<span>Software Engineering</span>
								<a role="button" data-toggle="collapse" data-parent="#accordion" href=".computer-science-collapse" aria-expanded="false" aria-controls="software-engineering-collapse">
								<div class="value" id="software-engineering-head">
									<span>₱</span>
									<span>63,950</span><br>
									<span>Semester</span>
								</div>
								</a>
								<div id="software-engineering-collapse" class="panel-collapse collapse computer-science-collapse" role="tabpanel" aria-expanded="false" aria-labelledby="software-engineering-head">
									<ul>
										<li>Tuition Fee:<br>₱40,950</li>
										<li>Laboratory Fee:<br>₱8,000</li>
										<li>Miscellaneous Fee:<br>₱15,000</li>
										<li><a href="#">Apply for Software Engineering</a></li>
									</ul>
								</div>
								<a id="csi-tgle" class="fa fa-arrow-down fa-1x" role="button" data-toggle="collapse" data-parent="#accordion" href=".computer-science-collapse" aria-expanded="false" aria-controls="software-engineering-collapse">
									
								</a>
							</div>
						</div>
						
						<div class="col-md-4 wow animated fadeInUp" data-wow-delay="0.8s">
							<div class="price-table text-center">
								<span>Game Development</span>
								<a role="button" data-toggle="collapse" data-parent="#accordion" href=".computer-science-collapse" aria-expanded="false" aria-controls="game-development-collapse">
								<div class="value" id="game-development-head">
									<span>₱</span>
									<span>67,850</span><br>
									<span>Semester</span>
								</div>
								</a>
								<div id="game-development-collapse" class="panel-collapse collapse computer-science-collapse" role="tabpanel" aria-expanded="false" aria-labelledby="game-development-head">
									<ul>
										<li>Tuition Fee:<br>₱44,850</li>
										<li>Laboratory Fee:<br>₱8,000</li>
										<li>Miscellaneous Fee:<br>₱15,000</li>
										<li><a href="#">Apply for Game Development</a></li>
									</ul>
								</div>
								<a id="csi-tgle" class="fa fa-arrow-down fa-1x" role="button" data-toggle="collapse" data-parent="#accordion" href=".computer-science-collapse" aria-expanded="false" aria-controls="computer-science-collapse">
									
								</a>
							</div>
						</div>
						
						
					<?php } else {?>
						<div class="col-md-8 col-md-offset-2 wow animated fadeInUp">
							<div class="text-center">
								<a href="#" class="btn btn-blue btn-effect"data-toggle="modal" data-target="#loginModal">
									<span>Login to View Tuition Fees</span>
								</a>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
			</section>
			<!-- end Price section -->
			
			<!-- Social section -->
			<section id="social" class="parallax">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="sec-title text-center white wow animated fadeInDown">
								<h2>FOLLOW US</h2>
								<p>Beautifully simple follow buttons to help you get followers on</p>
							</div>
							<ul class="social-button">
								<li class="wow animated zoomIn"><a href="#"><i class="fa fa-thumbs-up fa-2x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i class="fa fa-dribbble fa-2x"></i></a></li>							
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- end Social section -->
			
			<!-- Contact section -->
			<section id="contact" >
				<div class="container">
					<div class="row">
						
						<div class="sec-title text-center wow animated fadeInDown">
							<h2>Comments & Suggestions</h2>
							<p>Leave a Message</p>
						</div>
						
						
						<div class="col-md-7 contact-form wow animated fadeInLeft">
							<form action="#" method="post">
								<div class="input-field">
									<input type="text" name="name" class="form-control" placeholder="Your Name...">
								</div>
								<div class="input-field">
									<input type="email" name="email" class="form-control" placeholder="Your Email...">
								</div>
								<div class="input-field">
									<input type="text" name="subject" class="form-control" placeholder="Subject...">
								</div>
								<div class="input-field">
									<textarea name="message" class="form-control" placeholder="Messages..."></textarea>
								</div>
						       	<button type="submit" id="submit" class="btn btn-blue btn-effect">Send</button>
							</form>
						</div>
						
						<div class="col-md-5 wow animated fadeInRight">
							<address class="contact-details">
								<h3>Contact Us</h3>						
								<p><i class="fa fa-pencil"></i>Unit #3020<span>Makati Executive Tower 1</span> <span>Dela Rosa St. </span><span>Makati</span></p><br>
								<p><i class="fa fa-phone"></i>Phone: (052) 483-1210 </p>
								<p><i class="fa fa-envelope"></i>brays_420@yahoo.com</p>
								<h3>&nbsp;</h3>			
							</address>
						</div>
			
					</div>
				</div>
			</section>
			<!-- end Contact section -->
			<div id="googleMap" style="width:100%;height:380px;"></div>
			<!-- 
			<section id="google-map">
				<div id="map-canvas" class="wow animated fadeInUp"></div>
			</section>
			-->
			
			<!-- Modal Start -->
			<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							<h2 class="modal-title" id="myModalLabel"><b>Login</b></h2>
						</div>
					<form id="loginForm" class="form-horizontal" data-toggle="validator" name="form" role="form">
						<div class="modal-body">
							<div id="errorControl" class='form-group' style="display: none;">
								<div class="col-sm-10">
									<label class='control-label' id="NotFound" style="text-align: left; color: red; display: none;">
										<b>User Not Found</b>
									</label>
									<label class='control-label' id="Incorrect" style="text-align: left; color: red; display: none;">
										<b>Incorrect Password</b>
									</label>
								</div>
							</div>
							<div class='form-group has-feedback'>
								<div class="col-sm-12">
										<input type="text" data-toggle="validator" class="form-control" id="user" placeholder="Username/ID Number" required>
       								 <span class="fa fa-user fa-2x form-control-feedback"></span>
								</div>
							</div>
							<div class='form-group has-feedback'>
								<div class="col-sm-12">
									<input type="password" data-toggle="validator" class="form-control" id="pass" placeholder="Password" required>
       								 <span class="fa fa-lock fa-2x form-control-feedback"></span>
								</div>
							</div>
							<input id="submitLogin" type="button" class="btn btn-primary btn-block" value="Login"/>
						</div>
						<div class="modal-footer" style="text-align: left; padding: 0px 15px 0px 15px;">
							<div class='form-group' style="font-size: 13px;">
								<div class="col-sm-6">
									<input type="checkbox" id="remember">
									<label class='control-label'>Remember Me</label>
								</div>
								<div class="col-sm-6" style="text-align: right;">
									<label class='control-label'>
										<a href="#" id="forgotbtn">Forgot Password?</a>
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<div class='row'>
							<div class="col-sm-12" id="successForgot" style="display: none;">
								<h3 style="color: green;">Password Was Sent To Your Email</h3>
							</div>
							<div class="col-sm-12" id="inputForgot">
								<div class="input-group">
							    	<input type="text" id="forgotID" class="form-control" placeholder="ID/Username">
							     	<span class="input-group-btn">
							        	<button style="height: 50px; border: 1px solid #ececec;" id="btnReset" class="btn btn-primary" type="button">Send</button>
							      	</span>
   								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Signup/Create Account -->
		<div class="modal fade" id="createAccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							<h2 class="modal-title" style="text-align: center;" id="accountModalLabel"><b>Create Account</b></h2>
						</div>
					<form id="loginForm" data-toggle="validator" role="form">
						<div id="verifyEmail" style="display:none;">
							<div class="form-group" style="text-align: center;">
								<label class="control-label" id="verificationLabel">Email Verification was sent to :</label>
          						<div class="row">
          							<div class="form-group col-md-6 col-md-offset-3">
          								<label class='control-label' id="alreadyExistsVerification" style="color: red; display: none;">
											<b>User Alrerady Exists</b>
										</label>
										<label class='control-label' id="ResendLabel" style="color: green; display: none;">
											<b>Email Verivifaction Resent</b>
										</label>
              							<div class="input-group">
      										<input type="email" id="newEmail" class="form-control" placeholder="">
      										<input type="email" id="oldEmail" class="form-control" placeholder="" style="display: none">
      										<span class="input-group-btn">
     			   								<button class="btn btn-default span-btn" id="changeEmail" type="button">Change</button>
      										</span>
    									</div>
            						</div>
            					</div>
            					<div class="row">
            						<div class="form-group col-md-6 col-md-offset-3">
            							<input id="resendVerification" type="button" class="btn btn-primary btn-block" value="Resend Verification"/>
            						</div>
            					</div>
            				</div>
						</div>
						<div id="accountForm" class="modal-body">
							<div class="form-group">
								<label for="inputFName" class="control-label">Full Name</label>
          						<div class="row">
            						<div class="form-group col-sm-4">
              							<input type="text" data-toggle="validator" class="form-control" id="inputFName" placeholder="First Name" required>
            						</div>
            						<div class="form-group col-sm-4">
              							<input type="text" data-toggle="validator" class="form-control" id="inputMName" placeholder="Middle Name" required>
            						</div>
            						<div class="form-group col-sm-4">
              							<input type="text" data-toggle="validator" class="form-control" id="inputLName" placeholder="Last Name" required>
            						</div>
          						</div>
        					</div>
							<div class="form-group">
								<label for="inputEmail" class="control-label" id="emailError">E-mail Address</label>
								<label for="inputEmail" class="control-label" id="emailErrorMessage" style="display:none; color: red;">&nbsp;&nbsp;User Already Exists</label>
          						<div class="row">
            						<div class="form-group col-sm-6">
              							<input type="email" data-toggle="validator" class="form-control" id="inputEmail" placeholder="E-mail Address" required>
              							<span class="help-block with-errors"></span>
            						</div>
            						<div class="form-group col-sm-6">
              							<input type="email" class="form-control" id="inputEmailConfirm" data-match="#inputEmail" data-match-error="Email Addresses Does Not Match" placeholder="Confirm E-mail" required>
              							<div class="help-block with-errors"></div>
            						</div>
          						</div>
        					</div>
        					<div class="form-group">
								<label for="inputPassword" class="control-label">Password</label>
          						<div class="row">
            						<div class="form-group col-sm-6">
              							<input type="password" data-toggle="validator" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
              							<span class="help-block">Minimum of 6 characters</span>
            						</div>
            						<div class="form-group col-sm-6">
              							<input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Password Does Not Match" placeholder="Confirm Password" required>
              							<div class="help-block with-errors"></div>
            						</div>
          						</div>
        					</div>
						</div>
						<div class="modal-footer" id="firstFooter">
							<div class='form-group'>
								<button type="reset" class="btn btn-primary">Reset</button>
								<input type="button" id="submitAccount" class="btn btn-primary" value="Create Account"/>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		</main>
		<!-- Essential jQuery Plugins
		================================================== -->
		
		<!-- Main jQuery -->
        <script src="js/jquery-1.11.1.min.js"></script>
		<!-- Twitter Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/submit.js"></script>
		<script src="js/validator.js"></script>
		<!-- Single Page Nav -->
        <script src="js/jquery.singlePageNav.min.js"></script>
		<!-- jquery.fancybox.pack -->
        <script src="js/jquery.fancybox.pack.js"></script>
		<!-- Google Map API -->
		<!-- <script src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
		<!-- Owl Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- jquery easing -->
        <script src="js/jquery.easing.min.js"></script>
        <!-- Fullscreen slider -->
        <script src="js/jquery.slitslider.js"></script>
        <script src="js/jquery.ba-cond.min.js"></script>
		<!-- onscroll animation -->
        <script src="js/wow.min.js"></script>
		<!-- Custom Functions -->
        <script src="js/main.js"></script>
    </body>
</html>
