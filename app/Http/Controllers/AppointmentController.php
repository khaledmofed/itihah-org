<?php

namespace App\Http\Controllers;

use App\Models\AppointmentRequest;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'appointment_date' => 'nullable|date',
            'appointment_time' => 'nullable|string|max:20',
            'message' => 'nullable|string',
        ]);

        AppointmentRequest::create($data);

        return back()->with('appointment_success', 'تم إرسال طلبك بنجاح، سنتواصل معك قريباً.');
    }
}
