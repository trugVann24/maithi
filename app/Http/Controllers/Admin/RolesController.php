<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('pages.admin.roles.index', compact('roles'));
    }
    public function create()
    {
        return view('pages.admin.roles.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'string', 'min:3']
            ],
            [
                'name.required' => 'Role là bắt buộc.',
                'name.string' => 'Role phải là một chuỗi ký tự.',
                'name.min' => 'Role phải có ít nhất 3 ký tự.'
            ]
        );

        Role::create($validated);

        return to_route('admin.roles.index')->with('success', 'Thêm vai trò thành công');
    }
    public function edit(Role $role): View
    {
        $permissions = Permission::all();
        return view('pages.admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'string']
            ],
            [
                'name.required' => 'Role là bắt buộc.',
                'name.string' => 'Role phải là một chuỗi ký tự.',
            ]
        );

        $role->update($validated);
        return to_route('admin.roles.index')->with('success', 'Sửa vai trò thành công');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('success', 'Vai trò được xoá thành công');
    }

    public function givePermission(Request $request, Role $role)
    {
        $role->permissions()->detach();
        $permissions = Permission::whereIn('id', $request->input('permissions', []))->pluck('name');
        $role->givePermissionTo($permissions);
        return back()->with('success', 'Cập nhật quyền truy cập cho vai trò thành công');
    }
}
