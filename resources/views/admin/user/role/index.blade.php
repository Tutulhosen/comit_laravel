@extends('admin.layouts.app')

@section('main-content')
					<!-- Page Header -->

					@include('admin.layouts.page-header')
					<!-- /Page Header -->
                    <div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Role</h4>
                                    @if (Session::has('success-mid'))
                                    @include('validate.validate')
                                    @endif

								</div>
								<div class="card-body">
									<table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Name</td>
                                                <td>Slug</td>
                                                <td>Permission</td>
                                                <td>Created_at</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($role_data as $role)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$role->name}}</td>
                                                <td>{{$role->slug}}</td>

                                                <td>

                                                    <ul>
                                                        @forelse (json_decode($role->permission) as $permission)
                                                        <li>{{ $permission }}</li>
                                                        @empty
                                                        <p>No permission found</p>
                                                        @endforelse
                                                    </ul>

                                                </td>
                                                <td>{{$role->created_at->diffForhumans()}}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('role.edit', $role->id) }}"><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-sm btn-danger" href="{{ route('role.destroy', $role->id) }}"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center" >
                                                        <p  >No role data found</p>
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
								</div>
							</div>
						</div>
						<div class="col-md-4">


                                {{-- role index part  --}}

                                @if ($fun==='role')

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Add New Role</h4>
                                    </div>
                                    @if (Session::has('success')|| $errors->any())
                                    @include('validate.validate')
                                    @endif

                                    <div class="card-body">


                                        <form action="" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <label>Role name</label>
                                                <input name="name" type="text" class="form-control">
                                            </div>


                                            <div class="form-group">
                                                <label>Permissions</label>

                                                @forelse ($permission_data as $item)
                                                <label class="d-block" for="">
                                                    <input  name="per[]" value="{{$item->name}}" type="checkbox" >
                                                    {{$item->name}}
                                                </label>
                                                @empty
                                                    <p style="color: red">no permission found</p>
                                                @endforelse


                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                                @endif


                                {{-- role edit part  --}}

                            @if ($fun==='edit')
                            <div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit Role</h4>
								</div>

                                <div class="card-header">
									<a class="btn btn-primary btn-sm" href="{{ route('admin.role') }}">Add new role</a>
								</div>

								<div class="card-body">

                                    @include('validate.validate')
									<form action="{{ route('role.update', $role_id->id) }}" method="POST">
                                        @csrf

										<div class="form-group">
											<label>Role name</label>
											<input name="name" type="text" class="form-control" value="{{$role_id->name}}">
										</div>


                                        <div class="form-group">
											<label>Permissions</label>

                                            @forelse ($permission_data as $item)
                                            <label class="d-block" for="">
                                                <input
                                                 name="per[]" @if (in_array($item->name , json_decode($role_id->permission)))
                                                @checked(true)
                                                 @endif value="{{$item->name}}" type="checkbox">{{$item->name}} </label>
                                            @empty
                                                no permission found
                                            @endforelse


										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>


								</div>
							</div>
                            @endif



						</div>
					</div>

@endsection


