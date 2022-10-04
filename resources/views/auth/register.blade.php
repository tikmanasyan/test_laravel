@extends("layouts.app")
@section("title")Sign Up @endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="{{ route("register-store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input
                            type="text"
                            name="full_name"
                            id="full_name"
                            placeholder="John Smith"
                            class="form-control {{($errors->has("full_name")) ? 'is-invalid' : ''}}"
                        >
                        @if($errors->has("full_name"))
                            <span class="text-danger">
                                {{ $errors->first("full_name") }}
                            </span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input
                            type="date"
                            name="birth_date"
                            id="birth_date"
                            class="form-control {{($errors->has("birth_date")) ? 'is-invalid' : ''}}"
                        >
                        @if($errors->has("birth_date"))
                            <span class="text-danger">
                                {{ $errors->first("birth_date") }}
                            </span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="full_name" class="form-label">Gender</label>
                        <select
                            name="gender"
                            id="gender"
                            class="form-control {{($errors->has("gender")) ? 'is-invalid' : ''}}">
                            <option value="" selected disabled>--Select Gender--</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @if($errors->has("gender"))
                            <span class="text-danger">
                                {{ $errors->first("gender") }}
                            </span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input
                            type="file"
                            name="avatar"
                            id="avatar"
                            class="form-control {{($errors->has("avatar")) ? 'is-invalid' : ''}}"
                        >
                        @if($errors->has("avatar"))
                            <span class="text-danger">
                                {{ $errors->first("avatar") }}
                            </span>
                        @endif
                    </div>

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
                    <button class="btn btn-success">Create</button>
                </form>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
