@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Product</h2>




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

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">SKU</label>
            <input type="text" name="sku" class="form-control" value="{{ old('sku', $product->sku) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description', $product->description) }}" required>
        </div>



        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Qauntity</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}" required>
        </div>

    
        <div class="mb-3">
            <label class="form-label">Upload File/Image</label>
            <input type="file" name="img" class="form-control" value="{{ old('img', $product->img) }}" required>
        </div>
        


        <div class="mb-3">
            <label class="form-label"> Status</label>
            <input type="text" name="status" class="form-control" value="{{ old('status', $product->status) }}" required>
        </div>


        <!-- <div class="mb-3">
            <label>is Active</label>
            <input type="checkbox" name="status" {{ old('$product->status') == true ? checked:'' }} />
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        </div> -->


        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
