@extends('layout.admin')
@section('content')
<div class="card shadow border-light">
    <div class="card-header hstack gap-2">
        <h2>Cliente</h2>
        <span class="ms-auto">
            <a href="{{ route('customers.index') }}" class="btn btn-info btn-sm">Listar Clientes</a>
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning btn-sm">Editar Cliente</a>
            @can('access')
                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                </form>
            @endcan
        </span>
    </div>
    <div class="card-body">

        <x-alert />
        <dl class="row">
            <dt class="col-sm-3">Id:</dt>
            <dd class="col-sm-9">{{ $customer->id }}</dd>
            <dt class="col-sm-3">Nome:</dt>
            <dd class="col-sm-9">{{ $customer->name }}</dd>
            <dt class="col-sm-3">E-mail:</dt>
            <dd class="col-sm-9">{{ $customer->email }}</dd>
            <dt class="col-sm-3">Telefone:</dt>
            <dd class="col-sm-9">{{ $customer->telefone }}</dd>
            <dt class="col-sm-3">CEP:</dt>
            <dd class="col-sm-9">{{ $customer->cep }}</dd>
            <dt class="col-sm-3">Endereço:</dt>
            <dd class="col-sm-9">{{ $customer->street }}, {{ $customer->number }} - {{ $customer->neighborhood }} - {{ $customer->city }}/{{ $customer->state }}</dd>
            <dt class="col-sm-3">Cadastrado em:</dt>
            <dd class="col-sm-9">{{ \Carbon\Carbon::parse($customer->created_at)->format('d/m/Y H:i:s') }}</dd>
        </dl>

    </div>
</div>
@endsection