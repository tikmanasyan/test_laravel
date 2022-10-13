@extends("layouts.app")
@section("title")Posts
@endsection
@section("content")
    <div class="container">
        @foreach($posts as $post)
            <div class="card mt-2">
                <div class="card-header">
                    <h3>{{ $post->Title }}</h3>
                </div>

                <div class="card-body">
                    @php
                        $img = json_decode($post->Images, true);
                    @endphp
                    <img src="{{ asset("assets/uploads") . "/" . $img }}" alt="">
                    <p>{{ $post->Content }}</p>
                    <p><strong>Author` </strong>{{ $post->Author }}</p>
                    @if($post->userId == Auth::user()->id)
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    @endif
                </div>


            </div>
        @endforeach
    </div>
@endsection
