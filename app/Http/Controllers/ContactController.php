<?php

namespace App\Http\Controllers;

use App\Models\MembershipRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        return back()->with('success', 'تم إرسال رسالتك بنجاح. سنتواصل معك قريباً.');
    }

    public function join()
    {
        return view('frontend.join');
    }

    public function joinSubmit(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'nullable|string|max:50',
            'country'   => 'nullable|string|max:100',
            'specialty' => 'required|string|max:255',
            'experience'=> 'nullable|string|max:50',
            'notes'     => 'nullable|string|max:2000',
        ]);

        MembershipRequest::create($request->only(
            'name', 'email', 'phone', 'country', 'specialty', 'experience', 'notes'
        ));

        return back()->with('success', 'تم استلام طلب انضمامك بنجاح. سيتم التواصل معك قريباً.');
    }
}
