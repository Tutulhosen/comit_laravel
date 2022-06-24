@extends('admin.layouts.app')

@section('main-content')
					<!-- Page Header -->
					@include('admin.layouts.page-header')
					<!-- /Page Header -->
                    <div class="row">
						


						<div class="col-md-9 ">


                            {{-- admin user part  --}}
                            
                            
                            <div class="card">
								<div class="card-header">
									<h4 class="card-title">Add New Post</h4>
								</div>
                                @if (Session::has('success')|| $errors->any())
                                  @include('validate.validate')
                                @endif

								<div class="card-body">


									<form action="{{route('admin.user.create')}}" method="POST">
                                        @csrf
										<div class="form-group">
											<label>Title</label>
											<input value="{{ old('name') }}" name="name" type="text" class="form-control">
										</div>

                                       

                                        

                                        <div class="form-group">
											<label > Content</label>
											<textarea id="content"></textarea>
										</div>

                                        



										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>


								</div>
							</div>
                     


                            



						</div>

                        <div class="col-md-3">

                            <div class="card">
                                <div class="card-header">
                                    <h3>Category</h3>
                                </div>
                                <div class="card-body">
                                    <ul style="list-style: none">
                                        @forelse ($category as $item)
                                        <li>
                                            <label for="">
                                                <input value="{{$item->id}}" type="checkbox"> {{$item->name}}
                                            </label>
                                        </li>
                                        @empty
                                            <ul>
                                                <li>No data found</li>
                                            </ul>
                                        @endforelse
                                        
                                    </ul>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3>Tag</h3>
                                </div>
                                <div class="card-body">
                                    <select name="" class="form-control" id="tags" multiple>
                                        @forelse ($tag as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @empty
                                        <option value="">No data found</option>
                                        @endforelse
                                        
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
					</div>
@endsection
