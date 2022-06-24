@extends('admin.layouts.app')

@section('main-content')
					<!-- Page Header -->
					@include('admin.layouts.page-header')
					<!-- /Page Header -->
                    <div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Category</h4>
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
                                                <td>Created_at</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
											
                                            @forelse ($category_date as $data)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{$data->slug}}</td>
                                                <td>{{$data->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('post.category.edit', $data->id) }}"><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-sm btn-danger" href="{{route('post.category.delete', $data->id)}}"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    <p >No permission data found</p>
                                                </td>
                                            </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
								</div>
							</div>
						</div>
						<div class="col-md-4">
                            @if (Session::has('success')|| $errors->any())
                            @include('validate.validate')
                            @endif
							
                            @if ($type==='add')
                            <div class="card">
								<div class="card-header">
									<h4 class="card-title">Add New Category</h4>
								</div>
								<div class="card-body">

									<form action="{{route('post.category.store')}}" method="POST">
                                        @csrf
										<div class="form-group">
											<label>Category name</label>
											<input name="name" type="text" class="form-control">
										</div>


										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>


								</div>
							</div>
                            @endif

                            @if ($type==='edit')
                            <div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit Category</h4>
                                    <a class="btn btn-sm btn-primary" href="{{ route('post.category') }}">Add new category</a>
								</div>
								<div class="card-body">

									<form action="{{route('post.category.update', $category_id->id)}}" method="POST">
                                        @csrf
										<div class="form-group">
											<label>Category name</label>
											<input name="name" type="text" class="form-control" value="{{ $category_id->name }}">
										</div>


										<div class="text-right">
											<button type="submit" class="btn btn-primary">Update</button>
										</div>
									</form>


								</div>
							</div>
                            @endif



						</div>

					</div>
@endsection
