@extends("layouts.app")
@section("title")Create New Post @endsection
@section("content")
    <div class="container">
        <form action="{{ route("store-post") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" placeholder="Title" class="form-control">
            </div>

            <div class="mb-2">
                <label for="content" class="form-label">Content</label>
                <textarea  id="content" name="content" placeholder="Text..." class="form-control"></textarea>
            </div>


            <div class="mb-2">
                <label for="title" class="form-label">Images</label>
                <input type="file" multiple id="images" name="images[]" class="form-control">
            </div>
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
