<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $activeCustomer = Customer::active()->get();
        $inactiveCustomer = Customer::inactive()->get();
        return view('customer', compact('activeCustomer','inactiveCustomer'));
    }
    public function store(){
        $data = request()->validate([
                    'name' => 'required| min:3| unique:customers',
                    'email' => 'required|email',
                    'active' => 'required'
                ]);
        Customer::create($data);
        // $customer = new Customer;
        // $customer->name = request('name');
        // $customer->email = request('email');
        // $customer->save();
        return back();
    }
}
