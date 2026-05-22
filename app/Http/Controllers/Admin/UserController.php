<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = AdminUser::orderBy('name')->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.form', ['user' => new AdminUser]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:super_admin,editor',
        ]);
        $data['password'] = Hash::make($data['password']);
        $data['is_active'] = $request->boolean('is_active', true);
        AdminUser::create($data);

        return redirect()->route('admin.users.index')->with('success', 'تم إضافة المستخدم بنجاح.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.users.edit', $id);
    }

    public function edit(string $id)
    {
        $user = AdminUser::findOrFail($id);

        return view('admin.users.form', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = AdminUser::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_users,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:super_admin,editor',
        ]);
        if (! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $data['is_active'] = $request->boolean('is_active');
        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'تم تحديث المستخدم بنجاح.');
    }

    public function destroy(string $id)
    {
        AdminUser::findOrFail($id)->delete();

        return back()->with('success', 'تم حذف المستخدم.');
    }
}
