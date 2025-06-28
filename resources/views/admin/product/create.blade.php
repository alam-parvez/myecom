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
                                <option value="{{$item->id}}"  
                                    {{old('maincategory_id') == $item->id ?'selected':''}}>{{$item->name}}</option>
                            
                                @endforeach
                            </select>
                            </div>



                             <div class="col-md-3 col-sm-4">
                                <label>SubCategory*</label>
                                <select name="subcategory_id" class="form-select border-3 border-secondary">
                                @foreach ($subcategories as $item)
                                <option value="{{$item->id}}"  
                                    {{old('subcategory_id') == $item->id ?'selected':''}}>{{$item->name}}</option>
                            
                                @endforeach
                            </select>
                            </div>



                             <div class="col-md-3 col-sm-4">
                                <label>Brand*</label>
                                <select name="brand_id" class="form-select border-3 border-secondary">
                                @foreach ($brands as $item)
                                <option value="{{$item->id}}"  
                                    {{old('brand_id') == $item->id ?'selected':''}}>{{$item->name}}
                                </option>
                            
                                @endforeach
                            </select>
                            </div>

                            
                             <div class="col-md-3 col-sm-4">
                                <label>Stock*</label>
                                <select name="stock" class="form-select border-3 border-secondary">
                                   
                                    <option value="1" {{old('stock')=="1"?'selected':''}}>Yes</option>
                                    <option value="0" {{old('stock')=="0"?'selected':''}}>No</option>
                                     
                                 </select>
                         
                                </div>
                        
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Color:</label>
                                    <input type="text" name="color" class="form-control border-3 border-secondary"
                                     placeholder="Product Color" value="{{old('color')}}">
                                    @error('color')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Size:</label>
                                    <input type="text" name="size" class="form-control border-3 border-secondary" 
                                    placeholder="Product Size" value="{{old('size')}}">
                                    @error('color')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Base Price:</label>
                                    <input type="number" name="basePrice" class="form-control border-3 border-secondary"
                                     placeholder="Product Base Price" value="{{old('basePrice')}}">
                                    @error('basePrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Discount:</label>
                                    <input type="text" name="discount" class="form-control border-3 border-secondary"
                                     placeholder="Discount on Product in %" value="{{old('discount')}}"> 
                                    @error('discount')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" id="richTextEditor" rows="5" style="border:3px solid gray">
                                    {{old('description')}}</textarea>
                            </div>

                            

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Stock Quantity*</label>
                                <input type="number" name="stockquantity" placeholder="Stock Quantity" value="{{old('stockQuantity')}}" class="form-control border-3 border-secondary">
                                @error('stockquantity')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Pic*</label>
                                <input type="file" name="pic[]" multiple value="{{old('name')}}" class="form-control border-3 border-secondary">
                                @error('pic')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                 @error('pic.*')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Active*</label>
                               <select name="active" class="form-select border-3 border-secondary"> 
                                    <option value="1" {{old('active')=="1"?'selected':''}}>Yes</option>
                                    <option value="0" {{old('active')=="0"?'selected':''}}>No</option>
                               </select>
                            </div>
                        </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-secondary w-100">Submit</button>
                            </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
        </div>
    </div>
@endsection