<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function submit(ContactRequest $request)
    {
        Mail::to('rorymalone@live.com')->send(new ContactMail($request->name, $request->email, $request->body));

        return back();
    }
}
