@extends('layout.admin')
@section('content')
    <div class="card shadow border-light">
        <div class="card-header hstack gap-2">
            <h2>Cadastro de Cliente</h2>
            <span class="ms-auto">
                <a href="{{ route('customers.index') }}" class="btn btn-info btn-sm">Listar Clientes</a>
            </span>
        </div>
        <div class="card-body">

            <x-alert />
            
            <form action="{{ route('customers.store') }}" method="POST" class="row g-3">
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
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone do cliente" value="{{ old('telefone') }}">
                </div>
                <div class="col-md-6">
                    <label for="cep" class="form-label">CEP:</label>
                    <div class="input-group mb-3">                        
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP do cliente" value="{{ old('cep') }}" aria-label="CEP do cliente" value="{{ old('cep') }}" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="rua" class="form-label">Rua:</label>
                    <input type="text" class="form-control" id="rua" name="street" placeholder="Rua do cliente" value="{{ old('street') }}">
                </div>
                <div class="col-md-6">
                    <label for="number" class="form-label">Número:</label>
                    <input type="text" class="form-control" id="number" name="number" placeholder="Número do cliente" value="{{ old('number') }}">
                </div>
                <div class="col-md-6">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" name="neighborhood" placeholder="Bairro do cliente" value="{{ old('neighborhood') }}">
                </div>
                <div class="col-md-6">
                    <div class="col-md-6" style="float: left;">
                        <label for="cidade" class="form-label">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" name="city" placeholder="Cidade do cliente" value="{{ old('city') }}">
                    </div>
                    <div class="col-md-5" style="float: left; margin-left: 50px;">
                        <label for="uf" class="form-label">Estado:</label>
                        <input type="text" class="form-control" id="uf" name="state" placeholder="Estado do cliente" value="{{ old('state') }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success bt-sm" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
@endsection