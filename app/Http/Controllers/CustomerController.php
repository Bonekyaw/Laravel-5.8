<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;
use App\Events\NewCustomerEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewCustomerWelcome;
use Intervention\Image\Facades\Image;
use Storage;


class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth')->except(['index']);
    }
    public function index()
    {
        $customers = Customer::with('company')
                        ->orderBy('id', 'DESC')
                        ->paginate(15);      //This is called Eager Loading
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
        $id = request()->id;
        $this->authorize('create',Customer::class);
        $customer = Customer::create($this->setValidate($id));
        $this->storeToUploads($customer);

        event(new NewCustomerEvent($customer));

        // Mail::to($customer->email)->send(new NewCustomerWelcome());
        return redirect('customers');


        // $customer = new Customer;
        // $customer->name = request('name');
        // $customer->email = request('email');
        // $customer->save();

    }
    public function show(Customer $customer)
    {
        $this->authorize('view', $customer);
        return view('customer.show',compact('customer'));
    }
    public function edit(Customer $customer)
    {
        $company = Company::all();
        return view('customer.edit',compact('customer','company'));
    }
    public function update(Customer $customer)
    {
        $id = $customer->id;
        if (request()->has('image')) {
            Storage::delete('public/'.$customer->image);
        } 
        
        $customer->update($this->setValidate($id));
        $this->storeToUploads($customer);
        return redirect('customers');
    }
    public function destroy(Customer $customer)
    {
        Storage::delete('public/'.$customer->image);
        $customer->delete();
        return redirect('customers');
    }
    public function setValidate($id)
    {
        return request()->validate([
            'name' => 'required| min:3',
            'email' => 'required|email|unique:customers,email,'.$id,
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:5000'
        ]);

    }
    public function storeToUploads($customer)
    {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads','public')
            ]);

            $image = Image::make(public_path('storage/'.$customer->image))->fit(300,300);
            $image->save();
        }
    }
}
