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
                    <form action="{{route('admin-store-product')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Name*</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control border-3 border-secondary" placeholder="Full Name">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <label>MainCategory*</label>
                                    <select name="maincategory_id" class="form-select border-3 border-secondary">
                                    @foreach ($maincategories as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                
                                    @endforeach
                                </select>
                               </div>
                            </div>







                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Pic*</label>
                                <input type="file" name="pic" value="{{old('name')}}" class="form-control border-3 border-secondary">
                                @error('pic')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Active*</label>
                               <select name="active" class="form-select border-3 border-secondary"> 
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
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