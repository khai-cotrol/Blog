@extends('layout.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Products list</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a class="btn btn-success" href="{{route('product.create')}}">Them moi</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th></th>
                            <th>img</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>categories</th>
                            {{--                            <th>Image</th>--}}
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr id="product-{{$product->id}}">
                                <td>{{ $product->id }}</td>
                                <td><img src="{{asset('storage/'. $product->img)}}" style="width: 100px" alt="error"></td>
                                <td><h4>{{ $product->name }}</h4></td>
                                <td>${{ $product->price}}</td>
                                <td>{{ $product->category['name']}}</td>
                                <td>
                                    <button type="button" data-id="{{$product->id}}" onclick="return confirm('Are you sure?')" class="delete-product btn btn-danger ">Delete</button>
                                    <a href="{{route('product.edit', $product->id)}}"class="btn btn-danger">edit</a></td>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
