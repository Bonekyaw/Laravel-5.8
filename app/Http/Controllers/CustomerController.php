<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();
        $customer = new Customer();
        return view('customer.create', compact('customer','company'));

    }

    public function store()
    {
        $data = request()->validate([
                    'name' => 'required| min:3| unique:customers',
                    'email' => 'required|email',
                    'active' => 'required',
                    'company_id' => 'required'
                ]);

        Customer::create($data);
        return redirect('customers');
        // $customer = new Customer;
        // $customer->name = request('name');
        // $customer->email = request('email');
        // $customer->save();

    }
    public function show(Customer $customer)
    {
        return view('customer.show',compact('customer'));
    }
    public function edit(Customer $customer)
    {
        $company = Company::all();
        return view('customer.edit',compact('customer','company'));
    }
    public function update(Customer $customer)
    {
        $data = request()->validate([
            'name' => 'required| min:3| unique:customers',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);

        $customer->update($data);
        return redirect('customers');
    }
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers');
    }
}
