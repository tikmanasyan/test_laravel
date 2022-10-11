@extends("layouts.app")
@section("title")Create New Category @endsection
@section("content")
    <div class="container">
        <form action="{{ route("categories.store") }}" method="post">
            @csrf
            <div class="mb-2">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" id="name" name="name" placeholder="Category" class="form-control">
            </div>

            <div class="mb-2">
                <label for="notes" class="form-label">Category Notes</label>
                <textarea  id="notes" name="notes" placeholder="Notes..." class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
