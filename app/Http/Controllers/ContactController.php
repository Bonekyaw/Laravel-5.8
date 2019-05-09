<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required| email',
            'message' => 'required'
        ]);
        Mail::to('test@gmail.com')->send(new ContactFormMail($data));

        return redirect('contact');
    }
    //Caution : You must restart server after changing env
}
