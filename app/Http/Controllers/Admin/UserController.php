<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('roles');
        if ($request->has('query')) {
            $search = $request->input('query');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }
        $users = $query->paginate(10);
        return view('pages.admin.users.index', compact('users'));
    }
    public function create()
    {
        return view('pages.admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Thêm nhân viên thành công');
    }
    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('pages.admin.users.show', compact('user', 'roles', 'permissions'));
    }

    public function givePermission(Request $request, User $user)
    {
        $user->permissions()->detach();
        $permissions = Permission::whereIn('id', $request->input('permissions', []))->pluck('name');
        $user->givePermissionTo($permissions);
        return back()->with('success', 'Cập nhật quyền cho nhân viên thành công');
    }

    public function assignRole(Request $request, User $user)
    {
        $user->roles()->detach();
        if ($request->has('roles')) {
            foreach ($request->input('roles', []) as $roleId) {
                $role = Role::findById($roleId);
                if ($role) {
                    $user->assignRole($role);
                }
            }
        }
        return back()->with('success', 'Cập nhật vai trò cho nhân viên thành công');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->permissions()->detach();
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'Xoá tài khoản và thông tin nhân viên thành công');
    }
}
