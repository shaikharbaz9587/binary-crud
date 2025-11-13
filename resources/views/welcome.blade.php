@extends('layouts.app')

@section('content')

<div class='container'>
<h2 class="mb-4">Product List</h2>

<a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add Product</a>

<div class="d-flex justify-content-end mb-3">
    <form action="{{route('logout')}}" method ="POST">
        @csrf
        <button type="submit" class ="btn btn-danger">Logout</button>
</form>
</div>

</div>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>sku</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Img</th>
                <th>Status</th>
              
            </tr>
        </thead>
        <tbody>
         
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                
                 <td><img src="{{ asset('/uploads/product/'.$product->img) }}" alr="image"  style="width: 70px; height:70px;"></td>

                <!-- <td>{{ $product->status }}</td> -->
                <td>
                                    @if ($product->status == '1')
                                        Active
                                    @else
                                        In-Active
                                    @endif
                                </td>


                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this Product?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
     


        </tbody>
    </table>
    {!! $products->links() !!}
</div>


@endsection
