<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Added
use Alert;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    protected $page_title = 'Roles';

    public function __construct() {
        $this->middleware('permission:manage-role')->only('index');
        $this->middleware('permission:create-role')->only('create', 'store');
        $this->middleware('permission:edit-role')->only('edit', 'update');
        $this->middleware('permission:delete-role')->only('destroy');
        $this->middleware('permission:give-role-permission')->only('givePermission');
        $this->middleware('permission:revoke-role-permission')->only('revokePermission');
    }

    public function index()
    {
        return view('admin.role.index', [
            'page_title' => 'Manage ' . $this->page_title,
            'roles' => Role::all(),
        ]);
    }

    public function create()
    {
        return view('admin.role.create', [
            'page_title' => 'Create ' . $this->page_title,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'roleName' => ['required', 'string', 'max:125', 'unique:roles,name'],
            'roleGuard' => ['required', 'string', 'max:125', 'in:web,api'],
        ]);

        Role::create([
            'name' => $request->roleName,
            'guard_name' => $request->roleGuard,
        ]);

        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.role.index');
    }

    public function edit(Role $role)
    {
        return view('admin.role.edit', [
            'page_title' => 'Update ' . $this->page_title,
            'role' => $role,
            'permissions' => Permission::orderBy('id', 'asc')->pluck('name')->all(),
            'rolePermissions' => $role->permissions->pluck('name')->all(),
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'roleName' => ['required', 'string', 'max:125', 'unique:roles,name'],
            'roleGuard' => ['required', 'string', 'max:125', 'in:web,api'],
        ]);

        $role->update([
            'name' => $request->roleName,
            'guard_name' => $request->roleGuard,
        ]);

        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.role.edit', $role->id);
    }

    public function destroy(Role $role)
    {
        if ($role->id <= 8) {
            Alert::toast('Cannot delete this role', 'error');
        } else {
            $role->delete();
            app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

            Alert::toast('Successful', 'success');
        }

        return redirect()->route('admin.role.index');
    }

    public function syncPermissions(Request $request, Role $role)
    {
        $request->validate([
            'syncPermissions' => ['required', 'array'],
            'syncPermissions.*' => ['required', 'string', 'exists:permissions,name'],
        ]);

//        $role->givePermissionTo($request->givePermission);
        $role->syncPermissions($request->syncPermissions);
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        Alert::toast('Successful', 'success');
        return redirect()->route('admin.role.edit', $role->id);
    }
}
