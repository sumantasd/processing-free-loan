<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::withCount('assignedLeads');

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('status')) {
            $query->where('account_status', $request->status);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('employee_id', 'like', "%{$s}%")
                  ->orWhere('designation', 'like', "%{$s}%");
            });
        }

        $users = $query->orderBy('name')->paginate(12)->withQueryString();
        $roles = Role::all();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:150', 'unique:users,email'],
            'mobile' => ['nullable', 'string', 'max:20'],
            'employee_id' => ['nullable', 'string', 'max:30', 'unique:users,employee_id'],
            'designation' => ['nullable', 'string', 'max:100'],
            'department' => ['nullable', 'string', 'max:100'],
            'role' => ['required', 'string'],
            'joining_date' => ['nullable', 'date'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['account_status'] = 'active';

        $user = User::create($validated);

        AuditLog::log('user_created', 'users', 'users', $user->id, [
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
        ]);

        return redirect()->route('admin.users.show', $user)->with('success', "User {$user->name} created successfully!");
    }

    public function show($id)
    {
        $user = User::withCount([
            'assignedLeads',
            'assignedLeads as converted_leads_count' => fn($q) => $q->where('status', 'converted'),
            'assignedLeads as pending_leads_count' => fn($q) => $q->whereIn('status', ['allocated', 'contacted', 'followup_required']),
        ])
        ->with(['assignedLeads' => fn($q) => $q->latest()->take(10)])
        ->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:150', Rule::unique('users')->ignore($user->id)],
            'mobile' => ['nullable', 'string', 'max:20'],
            'employee_id' => ['nullable', 'string', 'max:30', Rule::unique('users')->ignore($user->id)],
            'designation' => ['nullable', 'string', 'max:100'],
            'department' => ['nullable', 'string', 'max:100'],
            'role' => ['required', 'string'],
            'account_status' => ['required', 'in:active,inactive,suspended'],
            'joining_date' => ['nullable', 'date'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        AuditLog::log('user_updated', 'users', 'users', $user->id, [
            'name' => $user->name,
            'status' => $user->account_status,
        ]);

        return redirect()->route('admin.users.show', $user)->with('success', 'User updated successfully.');
    }

    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot deactivate your own administrative account.');
        }

        $user->account_status = $user->account_status === 'active' ? 'inactive' : 'active';
        $user->save();

        AuditLog::log('user_status_toggled', 'users', 'users', $user->id, [
            'status' => $user->account_status,
        ]);

        return back()->with('success', "User account {$user->name} marked as {$user->account_status}.");
    }

    public function resetPassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate(['new_password' => ['required', 'string', 'min:8']]);

        $user->password = Hash::make($request->new_password);
        $user->save();

        AuditLog::log('user_password_reset', 'users', 'users', $user->id);

        return back()->with('success', "Password for {$user->name} reset successfully.");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        // Soft delete preserves all historical lead allocations and activity records
        $user->delete();

        AuditLog::log('user_deleted', 'users', 'users', $user->id, ['name' => $user->name]);

        return redirect()->route('admin.users.index')->with('success', "User {$user->name} archived/deleted safely. Historical lead ownership preserved.");
    }
}
