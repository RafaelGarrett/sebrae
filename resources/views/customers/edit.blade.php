@extends('layout.admin')
@section('content')
<div class="card shadow border-light">
    <div class="card-header hstack gap-2">
        <h2>Editar Cliente</h2>
        <span class="ms-auto">
            <a href="{{ route('customers.index') }}" class="btn btn-info btn-sm">Listar Clientes</a>
            <a href="{{ route('customers.show', $customer) }}" class="btn btn-primary btn-sm">Visualizar Cliente</a>
        </span>
    </div>
    <div class="card-body">

        <x-alert />
        
        <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required placeholder="Nome completo" value="{{ old('name', $customer->name) }}">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Melhor e-mail do cliente" value="{{ old('email', $customer->email) }}">
            </div>
            <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" class="form-control" id="telefone" required name="telefone" placeholder="Telefone do cliente" value="{{ old('telefone', $customer->telefone) }}">
            </div>
            <div class="col-md-6">
                <label for="cep" class="form-label">CEP:</label>
                <div class="input-group mb-3">                        
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP do cliente" value="{{ old('cep', $customer->cep) }}" aria-label="CEP do cliente" value="{{ old('cep', $customer->cep) }}" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
                </div>
            </div>
            <div class="col-md-6">
                <label for="rua" class="form-label">Rua:</label>
                <input type="text" class="form-control" id="rua" name="street" placeholder="Rua do cliente" value="{{ old('street', $customer->street) }}">
            </div>
            <div class="col-md-6">
                <label for="number" class="form-label">Número:</label>
                <input type="text" class="form-control" id="number" name="number" placeholder="Número do cliente" value="{{ old('number', $customer->number) }}">
            </div>
            <div class="col-md-6">
                <label for="bairro" class="form-label">Bairro:</label>
                <input type="text" class="form-control" id="bairro" name="neighborhood" placeholder="Bairro do cliente" value="{{ old('neighborhood', $customer->neighborhood) }}">
            </div>
            <div class="col-md-6">
                <div class="col-md-6" style="float: left;">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" name="city" placeholder="Cidade do cliente" value="{{ old('city', $customer->city) }}">
                </div>
                <div class="col-md-5" style="float: left; margin-left: 50px;">
                    <label for="uf" class="form-label">Estado:</label>
                    <input type="text" class="form-control" id="uf" name="state" placeholder="Estado do cliente" value="{{ old('state', $customer->state) }}">
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-warning btn-sm" value="Editar">
            </div>
        </form>
    </div>
</div>
@endsection