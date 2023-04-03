@extends('layout.mainlayout_admin')
@section('content')	
@if(!Session::has('admin'))
 <script>window.location.href = "{{ route('loginA')}}";</script> @endif
 
<style type="text/css">
	.btnUp {
  border: 2px solid gray;
  color: white;
  background-color: red;
  padding: 5px 15px;
  border-radius: 8px;
  font-size: 18px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">books</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">books</li>
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
													<th>ID</th>
													<th>Book Name</th>
													<th>Book Cover</th>
													<th>Category</th>
													<th>Price</th>
													<th>Description</th>
													
													<th class="text-right">Action</th>
												</tr>
										
											</thead>
										
											<tbody>				
												@foreach($location as $l)
												<tr>
													<td>BO#{{$l->id}}</td>
													<td>{{$l->book_name}}</td>
													<td>
											<img width="120px" height="70px" src="{{asset('images/'.$l->image)}}">
													</td>
													<td>{{$l->category}}</td>
													<td>{{$l->price}}</td>
													<td>{{$l->des}}</td>
												
													
													
													
													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details{{$l->id}}">
																<i class="fe fe-pencil"></i> Edit
															</a>
							<a onclick="return confirm('Are you sure...?') "  href="{{route('del_books',$l->id)}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
											
											


									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			
			
			<!-- Edit Details Modal -->
			<div class="modal fade" id="edit_specialities_details{{$l->id}}" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Books</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<form action="{{route('up_books')}}"  method="post" enctype="multipart/form-data"> @csrf

								<input  name="id" type="number" hidden value="{{$l->id}}" class="form-control">

								<div class="row ">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Book Name</label>
											<input required="" name="book_name" type="text" value="{{$l->book_name}}" class="form-control">
										</div>
									</div>


									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Category</label>
											<input required=""  type="text" name="category" value="{{$l->category}}" class="form-control" >
										</div>
									</div>



									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Price</label>
											<input required=""  type="number" name="price"  value="{{$l->price}}"class="form-control" >
										</div>
									</div>

									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Description</label>
											<input required=""  type="text" name="des" value="{{$l->des}}" class="form-control" >
										</div>
									</div>
									<input type="hidden" value="{{$l->image}}" name="old_cover">

									<div class="col-12 col-sm-6 my-4">
										<div class="upload-btn-wrapper">
											  <button class="py-0 btnUp">Change <i class="ml-2 fa fa-arrow-up"></i></button>
					                      <input type="file" name="image" />

					                      <p class="my-2">Book Cover <img width="70px" height="40px" src="../images/{{$l->image}}"></p>

					                    
					                    </div>

									</div>

									<div class="col-12 col-sm-6 my-4">
										<div class="upload-btn-wrapper">
											<button class="py-0 btnUp"> <i class="ml-2 fa fa-arrow-up"></i>Change</button>
					                      <input type="file" name="content" />

					                      <p class="my-2">{{$l->content}}.pdf (pdf) </p>

					                      
					                    </div>

									</div>
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->

				@endforeach

											</tbody>
										</table>

										<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add books</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('add_books')}}"  method="post" enctype="multipart/form-data">
								@csrf
										<input  name="id" type="number" hidden value="{{$l->id}}" class="form-control">

								<div class="row ">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Book Name</label>
											<input required="" name="book_name" type="text"  class="form-control">
										</div>
									</div>


									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Category</label>
											<input required=""  type="text" name="category"  class="form-control" >
										</div>
									</div>



									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Price</label>
											<input required=""  type="number" name="price" class="form-control" >
										</div>
									</div>

									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Description</label>
											<input required=""  type="text" name="des"class="form-control" >
										</div>
									</div>

									<div class="col-12">
										<h3 class="my-2 ">Upload</h3>

									</div>

									<div class="col-12 col-sm-6">
										<div class="upload-btn-wrapper">
					                      <button class="btnUp">Book Cover <i class="ml-2 fa fa-arrow-up"></i></button>
					                      <input required="" type="file" name="image" />
					                    </div>

									</div>

									

									<div class="col-12 col-sm-6">
										<div class="upload-btn-wrapper">
					                      <button class="btnUp">Book File(pdf) <i class="ml-2 fa fa-arrow-up"></i></button>
					                      <input height="50px" required=""  type="file" name="content" />
					                    </div>

									</div>
									
								</div>
								<input type="submit" class="my-4 btn btn-primary btn-block" value="Save" />
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			

			
			
        </div>
		<!-- /Main Wrapper -->
@endsection