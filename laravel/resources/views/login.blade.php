@extends('layout.admin')
@section('content')
    <div class="card shadow border-light">
        <div class="card-header hstack gap-2">
            <h2>Login</h2>
            <span class="ms-auto">
            <a href="{{ route('home') }}" class="btn btn-info btn-sm">Home</a>
        </span>
        </div>
        <div class="card-body">

            <x-alert />
            
            <form action="{{ route('login.store') }}" method="POST" class="row g-3">
                @csrf
                @method('POST')
                <div class="col-md-12">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-control" required placeholder="E-mail" value="{{ old('email') }}">
                </div>
                <div class="col-md-12">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Senha com no mínimo 8 caracteres">
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success bt-sm" value="Login">
                </div>
            </form>
        </div>
    </div>
@endsection