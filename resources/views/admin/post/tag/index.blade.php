@extends('admin.layouts.app')

@section('main-content')
					<!-- Page Header -->

					@include('admin.layouts.page-header')
					<!-- /Page Header -->
                    <div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Tag</h4>
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
                                            
                                            @forelse ($tag_data as $tag)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$tag->name}}</td>
                                                <td>{{$tag->slug}}</td>

                                                
                                                <td>{{$tag->created_at->diffForhumans()}}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-warning" href="{{route('post.tag.edit', $tag->id)}}"><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-sm btn-danger" href="{{route('post.tag.delete', $tag->id)}}"><i class="fa fa-trash"></i></a>
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
                               
                               
                                @if ($type==='add')

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Add New Tag</h4>
                                    </div>
                                    @if (Session::has('success')|| $errors->any())
                                    @include('validate.validate')
                                    @endif

                                    <div class="card-body">


                                        <form action="{{ route('post.create') }}" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <label>Post name</label>
                                                <input name="name" type="text" class="form-control">
                                            </div>


                                            

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                                @endif


                                {{-- role edit part  --}}

                            @if ($type==='edit')
                            <div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit Tag</h4>
								</div>

                                <div class="card-header">
									<a class="btn btn-primary btn-sm" href="{{ route('post.tag') }}">Add new Tag</a>
								</div>

								<div class="card-body">

                                    @include('validate.validate')
									<form action="{{route('post.tag.update', $tag_id->id)}}" method="POST">
                                        @csrf

										<div class="form-group">
											<label>Role name</label>
											<input name="name" type="text" class="form-control" value="{{$tag_id->name}}">
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


