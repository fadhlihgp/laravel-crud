@extends('layout.template')
@section('content')
<form action="{{url('login-action')}}"
      method="post"
      class="d-flex w-full align-items-center justify-content-center">
    @csrf
    <div class="w-50 mt-5">
        <h2 class="text-center">Login</h2>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <p>Don't have an account ? <a href="/register">register</a></p>
        <button type="submit" class="btn btn-primary">Login</button>
    </div>

</form>
@endsection
