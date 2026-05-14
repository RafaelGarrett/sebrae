@extends('layout.admin')
@section('content')
    <div class="card shadow border-light">
        <div class="card-header hstack gap-2">
            <h2>Lista de Clientes</h2>
            <span class="ms-auto">
                <a href="{{ route('customers.create') }}" class="btn btn-success btn-sm">Cadastrar Cliente</a>
            </span>
        </div>
        <div class="card-body">

            <x-alert />

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <th>{{ $customer->id }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->telefone }}</td>
                            <td>{{ $customer->cep }}</td>
                            <td>{{ $customer->neighborhood }}</td>
                            <td>
                                <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                @can('access')
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este cliente?')" class="btn btn-danger btn-sm">Excluir</button>
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