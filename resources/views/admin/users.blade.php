@extends('layout.mainlayout_admin')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Users</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Users</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										

										<table class="datatable table table-hover table-center mb-0">
											<thead>

												<tr>
													<th>Name</th>
													<th>Email</th>
													<th>Action</th>
													
												</tr>
										
											</thead>
										
											<tbody>				
												@foreach($admin as $l)
												<tr>
													<td>{{$l->name}}</td>
													<td>{{$l->email}}</td>

								<td>					
							<a onclick="return confirm('Are you sure...?') "  href="{{route('del_users',$l->id)}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a> </td>
														
													
												</tr>
												@endforeach
											
											


									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			
			

			

											</tbody>
										</table>

										<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Users</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('add_users')}}"  method="post" enctype="multipart/form-data">
								@csrf
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Name</label>
											<input required="" name="name" type="text" class="form-control">
										</div>
									</div>

									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Email</label>
											<input required="" name="email" type="text" class="form-control">
										</div>
									</div>

									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Password</label>
											<input required="" name="password" type="text" class="form-control">
										</div>
									</div>

									</div>


									
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			

			
			
        </div>
		<!-- /Main Wrapper -->
@endsection