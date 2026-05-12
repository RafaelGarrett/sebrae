@extends('layout.admin')
@section('content')
    <div class="card shadow border-light">
        <div class="card-header hstack gap-2">
            <h2>Lista de Usuários</h2>
            @can('access')
                <span class="ms-auto">
                    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">Cadastrar Usuário</a>
                </span>
            @endcan
        </div>
        <div class="card-body">

            <x-alert />

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Nível de Acesso</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->access_level }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                @can('access')
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection