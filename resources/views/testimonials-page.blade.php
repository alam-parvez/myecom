@extends('layouts.app')
@section('title')
<title>{{config('app.name')}} - {{$title}}</title>
@endsection


@section('main')
    @include('partials.hero')
    @include('partials.testimonials') 
@endsection 