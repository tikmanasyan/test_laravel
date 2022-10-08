@extends("layouts.app")
@section("title")Sign Up @endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-4">
                <x-messages />
                <form action="{{route("verify")}}" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="verify_code" class="form-label">Enter Verify Code</label>
                        <input type="text" name="verify_code" id="verify_code" class="form-control">
                    </div>
                    <button class="btn btn-success">Verify</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
