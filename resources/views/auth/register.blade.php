@extends('layout.template')
@section('content')
    <form action="{{url('register-action')}}"
          method="post"
          class="d-flex w-full align-items-center justify-content-center">
        @csrf
        <div class="w-50 mt-5">
            <h2 class="text-center">Register</h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                <input name="name" type="text" class="form-control" id="fullName" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <p>Has an account ? <a href="login">Login</a></p>
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

    </form>
@endsection
