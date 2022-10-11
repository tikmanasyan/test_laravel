@extends("layouts.app")
@section("title")Product List @endsection
@section("content")
    <div class="container">
        <div class="mt-2">
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
