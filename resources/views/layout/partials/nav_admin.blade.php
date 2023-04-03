<!-- Sidebar -->
@if(Session::has('admin'))
<div class="sidebar mt-2" id="sidebar" style="background-color:#9b9b9b;">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul class="text-dark" style="color:white;">
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="{{ Request::is('admin/index_admin') ? 'active' : '' }}"> 
								<a class="text-dark" href="index_admin"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>


							
							

							<li  class="{{ Request::is('admin/books') ? 'active' : '' }}"> 
								<a class="text-dark" href="./books"><i class=" fe fe-layout"></i> <span>Books</span></a>
							</li>

							


                         <!-- <li  class="{{ Request::is('admin/reports') ? 'active' : '' }}"> 
								<a class="text-dark" href="locations"><i class=" fe fe-layout"></i> <span>Lab Reports</span></a>
							</li> -->


							<!-- <li  class="{{ Request::is('admin/patient-list') ? 'active' : '' }}"> 
								<a class="text-dark" href="patient-list"><i class="fe fe-user"></i> <span>Patients</span></a> 
							</li> -->

							
							

							
							
						<!--	<li  class="{{ Request::is('admin/reviews') ? 'active' : '' }}"> 
								<a href="reviews"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li> -->

							
						</ul>
					</div>
                </div>
            </div>
            @endif
			<!-- /Sidebar -->