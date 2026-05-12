@extends('layout.admin')
@section('content')
    <div class="card shadow border-light">
        <div class="card-header hstack gap-2">
            <h2>Cadastro de Usuário</h2>
            <span class="ms-auto">
                <a href="{{ route('users.index') }}" class="btn btn-info btn-sm">Listar Usuários</a>
            </span>
        </div>
        <div class="card-body">

            <x-alert />
            
            <form action="{{ route('users.store') }}" method="POST" class="row g-3">
                @csrf
                @method('POST')
                <div class="col-md-6">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" required id="name" name="name" placeholder="Nome completo" value="{{ old('name') }}">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-control" required placeholder="Melhor e-mail do cliente" value="{{ old('email') }}">
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Senha com no mínimo 8 caracteres">
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success bt-sm" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
@endsection