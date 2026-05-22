<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipRequest;
use Illuminate\Http\Request;

class MembershipRequestController extends Controller
{
    public function index()
    {
        $requests = MembershipRequest::latest()->paginate(20);
        return view('admin.membership-requests.index', compact('requests'));
    }

    public function show(string $id)
    {
        $membershipRequest = MembershipRequest::findOrFail($id);
        if ($membershipRequest->status === 'new') {
            $membershipRequest->update(['status' => 'read']);
        }
        return view('admin.membership-requests.show', compact('membershipRequest'));
    }

    public function update(Request $request, string $id)
    {
        $membershipRequest = MembershipRequest::findOrFail($id);
        $request->validate(['status' => 'required|in:new,read,approved,rejected']);
        $membershipRequest->update(['status' => $request->status]);
        return back()->with('success', 'تم تحديث الحالة.');
    }

    public function destroy(string $id)
    {
        MembershipRequest::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الطلب.');
    }
}
