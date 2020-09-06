<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
    	return view('contact.create');
    }
    public function store()
    {
    	$data = request()->validate
    	([
    		'nom' => 'required|min:3',
    		'mail' => 'required|email',
    		'msg' => 'required|min:5']);

    	Mail::to('test@test.com')->send(new ContactFormMail($data));

    	return redirect()->route('topics.index');

    }
}
