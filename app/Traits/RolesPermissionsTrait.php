<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;


trait RolesPermissionsTrait {


    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'admins_permissions');
    }

    public function givePermissionsTo($permissions)
    {
        $this->permissions()->attach($permissions);
    }

    public function noOfPermissions()
    {
        return $this->permissions()->count();
    }

    protected function getPermissions($permissions)
    {
        return Permission::whereIn('slug',$permissions)->get();
    }

    public function withdrawPermissionsTo( ... $permissions ) {
        $permissions = $this->getPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions( ... $permissions ) {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }

    public function hasPermissionTo($permission) {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission) {

        foreach ($permission->roles as $role){
          if($this->roles->contains($role)) {
            return true;
          }
        }
        return false;
    }

    protected function hasPermission($permission) {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'admins_roles');
    }

    public function hasRole( ... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
            return true;
            }
        }
        return false;
    }

    public function addRoles($roles)
    {
        $this->roles()->attach($roles);
    }

    public function noOfRoles()
    {
        return $this->roles()->count();
    }

}
