@extends('backend.master')
@section('title')
   Edit Product
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                    <h3>Edit Product
                                        <a href="{{route('view.product')}}" class="btn btn-info btn-sm float-right"><i class="fa fa-list"></i>Product List</a>
                                    </h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('update.product', $editProduct->id)}}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Product Name</label>
                                            <input type="text" name="name" value="{{$editProduct->name}}" id="name" class="form-control">
                                            @error('name')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="price">Product Price</label>
                                            <input type="number" name="price" value="{{$editProduct->price}}" id="price" class="form-control">
                                            @error('price')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="expired_date">Expired Date</label>
                                            <input type="text" name="" value="{{$editProduct->expired_date}}" id="expired_date" class="form-control">
                                            <input type="date" name="expired_date" value="{{$editProduct->expired_date}}" id="expired_date" class="form-control">
                                            @error('expired_date')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3" style="margin-top: 30px">
                                            <button type="submit" class="btn btn-m btn-primary">Update Product</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection

