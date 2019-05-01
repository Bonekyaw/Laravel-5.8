<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('customer',['customers' => $customer]);
    }
    public function store(){
        request()->validate([
            'name' => 'required| min:3| unique:customers',
            'email' => 'required|email'
        ]);
        // Customer::create(request()->all());
        $customer = new Customer;
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->save();
        return back();
    }
}
