@extends('admin.layouts.app')

@section('main-content')
					<!-- Page Header -->
					@include('admin.layouts.page-header')
					<!-- /Page Header -->
                    <div class="row">
						<div class="col-md-12">
							<div class="card">
                                
                                <br>
								<div class="card-header">
									<a class="btn btn-success btn-sm" href="{{route('post.create')}}">Add new post</a>
                                    
								</div>
                                <div class="card-header">
									<h4 class="card-title">All Post</h4>
                                    
								</div>
                                @if (Session::has('success-mid'))
                                @include('validate.validate')
                                @endif

								<div class="card-body">
									<table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Title</td>
                                                <td>Author</td>
                                                <td>Category</td>
                                                <td>Tag</td>
                                                
                                                <td>Created At</td>
                                             <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @php
                                                    $admin_user_data = [];
                                                @endphp
                                                @forelse ($admin_user_data as $admin_user)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$admin_user->name}}</td>
                                                <td>{{$admin_user->email}}</td>
                                                <td>{{$admin_user->cell}}</td>
                                                <td>{{$admin_user->role->name}}</td>
                                                <td>{{$admin_user->created_at->diffForHumans() }}</td>
                        
                                                @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">
                                                        <p >No post data found</p>
                                                    </td>
                                                </tr>
                                            </tr>
                                                @endforelse


                                        </tbody>
                                    </table>
								</div>
							</div>
						</div>


						
					</div>
@endsection
