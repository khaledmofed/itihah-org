<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppointmentRequest;

class AppointmentRequestController extends Controller
{
    public function index()
    {
        $requests = AppointmentRequest::latest()->paginate(20);

        return view('admin.appointment-requests.index', compact('requests'));
    }

    public function show(string $id)
    {
        $appointmentRequest = AppointmentRequest::findOrFail($id);
        $appointmentRequest->update(['status' => 'read']);

        return view('admin.appointment-requests.show', compact('appointmentRequest'));
    }

    public function destroy(string $id)
    {
        AppointmentRequest::findOrFail($id)->delete();

        return back()->with('success', 'تم حذف الطلب.');
    }
}
