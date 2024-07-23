<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function viewForm(){

        Mail::to('emmanuellaanimwaa17@icloud.com')->send(new Email);
        return view('customers.contact');
    }


}
