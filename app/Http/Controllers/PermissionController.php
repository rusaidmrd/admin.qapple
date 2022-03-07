<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::all();
        return view('pages.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('pages.permissions.create');
    }

    public function store(Request $request)
    {
            $validatedData = $request->validate([
                'name' => 'required|unique:permissions,name'
            ]);

            Permission::create($validatedData);
            return redirect()->route('permissions.index')->with('success','The new permission added successfully');
    }

    public function show(Permission $permission)
    {
        return view('pages.permissions.show',compact('permission'));
    }

    public function edit(Permission $permission)
    {
        return view('pages.permissions.edit',compact('permission'));
    }

    public function update(Permission $permission, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:permissions,name'
        ]);
        $permission->update($validatedData);
        return redirect()->route('permissions.index')->with('success','Permission details updated successfully');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success','Permission has been deleted successfully');
    }
}
