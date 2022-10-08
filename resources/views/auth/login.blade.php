@extends("layouts.app")
@section("title")Sign In @endsection
@section("content")
    <div class="container">
        <div class="row">

            <div class="col-md-4"></div>
            <div class="col-md-4">
                <x-messages />
                <form action="{{route("login-store")}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control {{($errors->has("email")) ? 'is-invalid' : ''}}"
                            placeholder="example@mail.ru"
                        >
                        @if($errors->has("email"))
                            <span class="text-danger">
                                {{ $errors->first("email") }}
                            </span>
                        @endif
                    </div>


                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control {{($errors->has("password")) ? 'is-invalid' : ''}}"
                            placeholder="****"
                        >
                        @if($errors->has("password"))
                            <span class="text-danger">
                                {{ $errors->first("password") }}
                            </span>
                        @endif
                    </div>
                    <button class="btn btn-primary">Sign In</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
