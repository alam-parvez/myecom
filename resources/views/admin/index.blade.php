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
            @include('partials.profile')
        </div>
@endsection


