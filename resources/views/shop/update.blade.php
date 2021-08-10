
@extends('layout.master')
@section('content')
<?php
$categories =\App\Models\Categories::all();

?>
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Customer</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <form action="{{route('product.update',$product->id)}}" enctype="multipart/form-data" method="post"  >
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" id="inputName" value="{{$product->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputPrice">price</label>
                    <input type="number" name="price" id="inputPrice" value="{{$product->price}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputDescription">Image</label>
                    <input type="file" hidden value="" name="image" id="image"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputCategory_id">category</label>
                    <select name="categories"  id="">
                        @foreach($categories as $category )
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input hidden type="number" id="inputUser_id" name="user_id" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                </div>
                <button type="submit" class="btn btn-success">Accept</button>
                <a href="{{route('product.list')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
@endsection
