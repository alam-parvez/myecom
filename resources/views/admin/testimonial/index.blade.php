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
                        <a href="{{route('admin-create-testimonials')}}" class="float-end text-light"><i class="fa fa-plus text-light"></i></a>
                    </h5>
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Pic</th>
                                <th>Message</th>
                                <th>Active</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>   
                        </thead>
                        <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <a href="{{$item->pic()}}">
                                    <img src="{{$item->pic()}}" height="50px" width="80px" alt=""></a>
                                </td>
                                <td>
                                    <div class="testimonials-message">
                                        {{ $item->message }}
                                    </div>
                                </td>
                                <td class="{{$item->active?"text-success":"text-danger"}}">{{$item->active ? "Yes":"No" }}</td>
                                <td><a href="{{route('admin-edit-testimonials',$item->id)}}" class="btn btn-secondary"><i class="fa fa-edit"></i></a></td>
                                <td><a href="{{route('admin-destroy-testimonials',$item->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection