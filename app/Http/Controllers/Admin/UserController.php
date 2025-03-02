<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyUserRequest;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
    Gate::authorize('user_access');

    $users = User::all();
    return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        Gate::authorize('user_create');

        $roles = Role::all()->pluck('label', 'id');
        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
        ]);
        event(new Registered($user));
        return redirect()->route('admin.users.index')->with('message', __('panel.user.title_singular'). __('panel.creationSuccess'));
    }

    public function edit(User $user)
    {
        Gate::authorize('user_edit');

        $roles = Role::all()->pluck('label', 'id');
        $user->load('role');
        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
        ]);
        return redirect()->route('admin.users.index')->with('message', __('panel.user.title_singular'). __('panel.editionSuccess'));
    }

    public function show(User $user)
    {
        Gate::authorize('user_show');

        $user->load('role');
        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        Gate::authorize('user_delete');

        //UnRemovable Admin
        if ($user->id != 1)
            abort(403);
        else {
            $user->delete();
            return redirect()->route('admin.users.index')->with('message', __('panel.user.title_singular'). __('panel.single_delete_massage'));
        }
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        //UnRemovable Admin
        $ids = request('ids');
        $admin = array_search(1, $ids);
        if ($admin !== false) {
            unset($ids[$admin]);
            if (empty($ids))
                return true;
        }

        User::whereIn('id', $ids)->delete();
        return true;
    }
}
