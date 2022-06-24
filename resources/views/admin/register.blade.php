@extends('admin.layouts.app')

@section('main-content')
					<!-- Page Header -->
					{{-- @include('admin.layouts.page-header') --}}
					<!-- /Page Header -->
                    <div class="login-left">
                        <img class="img-fluid" src="{{url('admin/assets/img/logo-white.png')}}" alt="Logo">
                    </div>
                    <div class="row">
						
                        

						<div class="col-md-8 offset-2">


                            {{-- admin user part  --}}
                            
                            <div class="card">
								<div class="card-header">
									<h4 class="card-title">Registration Form</h4>
								</div>
                                @if (Session::has('success')|| $errors->any())
                                  @include('validate.validate')
                                @endif

								<div class="card-body">


									<form action="{{route('admin.reg.store')}}" method="POST">
                                        @csrf
										<div class="form-group">
											<label>Name</label>
											<input value="{{ old('name') }}" name="name" type="text" class="form-control">
										</div>

                                        <div class="form-group">
											<label>Email</label>
											<input value="{{ old('email') }}" name="email" type="text" class="form-control">
										</div>

                                        <div class="form-group">
											<label>User Name</label>
											<input value="{{ old('username') }}" name="username" type="text" class="form-control">
										</div>

                                        <div class="form-group">
											<label>Cell</label>
											<input value="{{ old('cell') }}" name="cell" type="text" class="form-control">
										</div>

                                        <div class="form-group">
											<label>Role</label>
											<select class="form-control" name="role" id="">
                                                <option value="">--select--</option>
                                                @forelse ($role_data as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @empty
                                                <option>No Role data found</option>
                                                @endforelse
                                            </select>
										</div>



										<div class="text-left">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
                                    <br>
                                    Or
                                    <div class="text-left">
                                        <a href="{{route('admin.login')}}" type="submit" class="btn btn-success">Login</a>
                                    </div>


								</div>
							</div>
                           


                          



						</div>
					</div>
@endsection
