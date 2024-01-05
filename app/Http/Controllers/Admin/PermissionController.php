<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index(Request $request){
        $query = $request->input('query');
        $permissions = Permission::where('name', 'LIKE', "%{$query}%")
            ->paginate(10);
        return view('pages.admin.permissions.index', compact('permissions'));
    }
    public function create(){
        return view('pages.admin.permissions.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            ['name'=>['required', 'string', 'min:3']
            ],
            [
                'name.required' => 'Tên quyền là bắt buộc.',
                'name.string' => 'Tên quyền phải là một chuỗi ký tự.',
                'name.min' => 'Tên quyền phải có ít nhất 3 ký tự.'
            ]);

        Permission::create($validated);
        return to_route('admin.permissions.index')->with('success', 'Thêm quyền truy cập thành công');
    }

    public function edit(Permission $permission) : View {
        $roles = Role::all();
        return view('pages.admin.permissions.edit', compact('permission','roles'));
    }

    public function update(Request $request,Permission $permission)  {
        $validated = $request->validate(
            ['name'=>['required', 'string']
            ],
            [
                'name.required' => 'Tên quyền là bắt buộc.',
                'name.string' => 'Tên quyền phải là một chuỗi ký tự.',
            ]);

        $permission->update($validated);
        return to_route('admin.permissions.index')->with('success', 'Sửa quyền truy cập thành công');
    }

    public function destroy(Permission $permission) {
        $permission->delete();
        return back()->with('success','Quyền truy cập được xoá thành công');
    }

    public function assignRole(Request $request,Permission $permission)  {
        $permission->roles()->detach();
        if ($request->has('roles')) {
            foreach ($request->input('roles', []) as $roleId) {
                $role = Role::findById($roleId);
                if ($role) {
                    $permission->assignRole($role);
                }
            }
        }
        return back()->with('success', 'Cập nhật vai trò cho quyền truy cập thành công');
    }
}
