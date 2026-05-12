@extends('layout.admin')
@section('content')
<div class="card shadow border-light">
    <div class="card-header hstack gap-2">
        <h2>Usuário</h2>
        <span class="ms-auto">
            <a href="{{ route('users.index') }}" class="btn btn-info btn-sm">Listar Usuários</a>
            @can('access')
                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Editar Usuário</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                </form>
            @endcan
        </span>
    </div>
    <div class="card-body">

        <x-alert />
        <dl class="row">
            <dt class="col-sm-3">Id:</dt>
            <dd class="col-sm-9">{{ $user->id }}</dd>
            <dt class="col-sm-3">Nome:</dt>
            <dd class="col-sm-9">{{ $user->name }}</dd>
            <dt class="col-sm-3">E-mail:</dt>
            <dd class="col-sm-9">{{ $user->email }}</dd>
            <dt class="col-sm-3">Nível de Acesso:</dt>
            <dd class="col-sm-9">{{ $user->access_level }}</dd>
            <dt class="col-sm-3">Cadastrado em:</dt>
            <dd class="col-sm-9">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</dd>
        </dl>

    </div>
</div>
@endsection