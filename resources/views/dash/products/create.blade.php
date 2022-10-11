@extends("layouts.app")
@section("title")Create New Product @endsection
@section("content")
    <div class="container">
        <div class="mt-3">
            <form action="{{ route('store-product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Product">
                        </div>

                        <div class="mb-2">
                            <label for="description" class="form-label">Product Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Description..."></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="image" class="form-label">Product Image</label>
                            <input type="file" name="image" id="image" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="price" class="form-label">Product Price</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="1000000" >
                        </div>
                        <div class="mb-2">
                            <label for="qt" class="form-label">Product Qty</label>
                            <input type="number" min="1" value="1" name="qt" id="qt" class="form-control" >
                        </div>

                        <div class="mb-2">
                            <label for="category" class="form-label">Product Category</label>
                            <select class="form-select" name="category_id" id="category">
                                <option selected disabled>--Select Category--</option>
                                @foreach($categories as $category)

                                    <option value="{{$category->category_id }}">{{$category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
