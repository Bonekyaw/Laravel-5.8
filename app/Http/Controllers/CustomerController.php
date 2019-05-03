<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

class CustomerController extends Controller
{
    public function index()
    {
        $activeCustomer = Customer::active()->get();
        $inactiveCustomer = Customer::inactive()->get();
        $company = Company::all();
        return view('customer', compact('activeCustomer','inactiveCustomer','company'));
    }
    public function store(){
        $data = request()->validate([
                    'name' => 'required| min:3| unique:customers',
                    'email' => 'required|email',
                    'active' => 'required',
                    'company_id' => 'required'
                ]);
        Customer::create($data);
        // $customer = new Customer;
        // $customer->name = request('name');
        // $customer->email = request('email');
        // $customer->save();
        return back();
    }
}
