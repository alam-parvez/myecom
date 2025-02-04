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
                    <a href="{{route('admin-maincategory')}}" class="float-end text-light"><i class="fa fa-plus float-end text-light"></i></a></h5>
                    <form action="">

                        
                            <div class="mb-3">
                                <label>Name*</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control border-3 border-secondary" placeholder="Full Name">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Pic*</label>
                                <input type="file" name="pic" value="{{old('name')}}" class="form-control border-3 border-secondary">
                                @error('pic')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    

                       
                    </form>
                </div>
        </div>
    </div>
@endsection


{{-- kjghfdsdfghjkl; --}}

<h1>test</h1>