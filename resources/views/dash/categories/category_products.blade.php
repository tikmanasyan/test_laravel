@extends("layouts.app")
@section("title") {{ $products[0]->category }} Product List @endsection
@section("content")
    <div class="container">
        <div class="mt-2">
            <div class="mt-2 mb-2">
                <a href="{{ route("categories.index") }}" class="btn btn-secondary">Back</a>
            </div>
            <h4>PRODUCT LIST({{ count($products) }})</h4>
            <table class="mt-2 table table-hover table-striped">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->product }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
