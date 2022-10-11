@extends("layouts.app")
@section("title")Update Category @endsection
@section("content")
    <div class="container">
        <form action="{{ route("categories.update", $category->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-2">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" value="{{ $category->name }}" id="name" name="name" placeholder="Category" class="form-control">
            </div>

            <div class="mb-2">
                <label for="notes" class="form-label">Category Notes</label>
                <textarea  id="notes" name="notes" placeholder="Notes..." class="form-control">{{ $category->notes }}</textarea>
            </div>

            <button class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
