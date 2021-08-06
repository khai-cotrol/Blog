@extends('layout.master')
@section('content')

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Customer</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <form action="{{route('product.store')}}" method="post"  >
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" id="inputName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputPrice">price</label>
                    <input type="number" name="price" id="inputPrice" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputImg">img</label>
                    <input type="text" id="inputImg" name="img" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputCategory_id">category_id</label>
                    <input type="number" id="inputCategory_id" name="category_id" class="form-control">
                </div>
                <div class="form-group">
                <label for="inputUser_id">User_id</label>
                <input type="number" id="inputUser_id" name="user_id" class="form-control">
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
