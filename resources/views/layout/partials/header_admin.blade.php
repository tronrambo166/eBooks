	<!-- Main Wrapper -->
	<div class="main-wrapper">
		
		<!-- Header -->
		<div class="header " style="background-color:black; padding-bottom: 70px;">
		
			<!-- Logo -->
			<div class="header-left">
				 <div><img src="{{asset('logo.png')}}" width="200px" height="80px"></div>
				
			</div>
			<!-- /Logo -->
			
			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fe fe-text-align-left"></i>
			</a>
			
			
			
			<!-- Mobile Menu Toggle -->
			<a class="mobile_btn" id="mobile_btn">
				<i class="fa fa-bars"></i>
			</a>
			<!-- /Mobile Menu Toggle -->
			
			<!-- Header Right Menu -->
			<ul class="nav user-menu">

				
				
				<!-- User Menu -->
				<li class="nav-item dropdown has-arrow  text-light">
					<a style="color:white;" href="#" class="" data-toggle="dropdown"> <i class="fa fa-angle-down"></i>
						
					</a>
					<div class="dropdown-menu">
						<div class="user-header text-light">
							
							<div class="user-text">
								
								<p class="text-muted mb-0">ADMIN</p>
							</div>
						</div>
						
						<a href="{{route('logoutA')}}" class="dropdown-item" href="login">Logout</a>
					</div>
				</li>
				<!-- /User Menu -->
				
			</ul>
			<!-- /Header Right Menu -->
			
		</div>
		<!-- /Header -->