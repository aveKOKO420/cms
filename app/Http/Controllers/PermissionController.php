<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index()
    {
//        return view('admin.permissions.index');
        return view('admin.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }

    public function store()
    {
//        dd(\request('name'));
        \request()->validate([
            'name' => ['required']
        ]);
        Permission::create([
            'name' => Str::ucfirst(\request('name')),
            'slug' => Str::of(Str::lower(\request('name')))->slug('-')
        ]);
        return back();
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', [
            'permission' => $permission,
            'roles' => Role::all()
        ]);
    }

    public function update(Permission $permission)
    {
//        dd(\request('name'));

        $permission->name = Str::ucfirst(\request('name'));

        $permission->slug = Str::of(Str::lower(\request('name')))->slug('-');

        if ($permission->isDirty('name')) {
            session()->flash('permission-updated', 'Updated permission - ' . $permission->name);
            $permission->save();
        } else {
            session()->flash('permission-updated', 'Nothing has been updated');


        }

        return back();
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        session()->flash('permission-deleted', 'Deleted permission ' . $permission->name);

        return back();
    }
}
