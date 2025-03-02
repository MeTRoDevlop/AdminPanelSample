<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use App\Http\Requests\Admin\MassDestroyRoleRequest;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        Gate::authorize('role_access');

        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        Gate::authorize('role_create');

        $permissions = Permission::all()->pluck('label', 'id');
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('admin.roles.index')->with('message', __('panel.permission.title_singular'). __('panel.creationSuccess'));
    }

    public function edit(Role $role)
    {
        Gate::authorize('role_edit');

        $permissions = Permission::all()->pluck('label', 'id');
        $role->load('permissions');
        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('admin.roles.index')->with('message', __('panel.permission.title_singular'). __('panel.editionSuccess'));
    }

    public function show(Role $role)
    {
        Gate::authorize('role_show');

        $role->load('permissions');
        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        Gate::authorize('role_delete');

        //UnRemovable Admin
        if ($role->id != 1)
            abort(403);
        else {
            $role->delete();
            return redirect()->route('admin.roles.index')->with('message', __('panel.permission.title_singular') . __('panel.single_delete_massage'));
        }
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        //UnRemovable Admin
        $ids = request('ids');
        $admin = array_search(1, $ids);
        if ($admin !== false) {
            unset($ids[$admin]);
            if (empty($ids))
                return true;
        }

        Role::whereIn('id', $ids)->delete();
        return true;
    }
}
