@extends('layout.admin')
@section('content')
<div class="card shadow border-light">
    <div class="card-header hstack gap-2">
        <h2>Editar Usuário</h2>
        <span class="ms-auto">
            <a href="{{ route('users.index') }}" class="btn btn-info btn-sm">Listar Usuários</a>
            <a href="{{ route('users.show', $user) }}" class="btn btn-primary btn-sm">Visualizar Usuário</a>
        </span>
    </div>
    <div class="card-body">

        <x-alert />
        
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required placeholder="Nome completo" value="{{ old('name', $user->name) }}">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Melhor e-mail do cliente" value="{{ old('email', $user->email) }}">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha com no mínimo 8 caracteres">
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-warning btn-sm" value="Editar">
            </div>
        </form>
    </div>
</div>
@endsection