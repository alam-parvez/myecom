@extends('layouts.app')

@section('title')
   <title>{{config('app.name')}} -  {{$title}}</title>
@endsection

@section('main')
@include('partials.hero')
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-3">
                        @include('partials.admin-sidebar')
                </div>
            </div>
                <div class="col-md-9">
                    <h5 class="bg-secondary text-center p-2 text-light">{{ $title }}
                    <a href="{{route('admin-product')}}" class="float-end text-light"><i class="fa fa-backward float-end text-light"> Back</i></a></h5>
                    <form action="{{route('admin-update-product',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Name*</label>
                            <input type="text" name="name" value="{{ old('name')?old('name'):$data->name }}" class="form-control border-3 border-secondary" placeholder="Full Name">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Pic</label>
                                <input type="file" name="pic" value="{{old('name')}}" class="form-control border-3 border-secondary">
                                @error('pic')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Active</label>
                               <select name="active" class="form-select border-3 border-secondary"> 
                                    <option value="1"
                                     {{old('active')?old('active')=="1":$data->active=="1"?'selected':''}}>Yes</option>
                                    <option value="0" 
                                     {{old('active')?old('active')=="0":$data->active=="0"?'selected':''}}>No</option>
                               </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-secondary w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
        </div>
    </div>
@endsection