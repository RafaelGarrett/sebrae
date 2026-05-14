<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'desc')->get();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(CustomerRequest $request)
    {
        $request->validated();
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cep' => $request->cep,
            'street' => $request->street,
            'number' => $request->number,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'state' => $request->state,
        ]);
        return redirect()->route('customers.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $request->validated();
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cep' => $request->cep,
            'street' => $request->street,
            'number' => $request->number,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'state' => $request->state,
        ]);
        return redirect()->route('customers.show', $customer->id)->with('success', 'Cliente atualizado com sucesso!');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Cliente deletado com sucesso!');
    }
}
