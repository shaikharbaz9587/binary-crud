@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Product</h2>

    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add Product</a>

<div class="d-flex justify-content-end mb-3">
    <form action="{{route('logout')}}" method ="POST">
        @csrf
        <button type="submit" class ="btn btn-danger">Logout</button>
</form>
</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">SKU</label>
            <input type="text" name="sku" class="form-control" required value="{{ old('sku') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" >
        </div>




        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" required value="{{ old('quantity') }}">
        </div>

            <div class="mb-3">
                <label>Upload File/Image</label>
                <input type="file" name="img" class="form-control" />
            </div>


            <div class="mb-3">
                <label>Status</label>
                <input type="checkbox" name="status" {{ old('status') == true ? checked:'' }} required/>
                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

        

       


        <button type="submit" class="btn btn-success">Create Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
