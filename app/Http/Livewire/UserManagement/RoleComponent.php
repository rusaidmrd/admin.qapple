<?php

namespace App\Http\Livewire\UserManagement;

use App\Models\Role;
use Livewire\Component;
use App\Http\Livewire\DataTable\WithSorting;
use App\Http\Livewire\DataTable\WithBulkAction;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Models\Permission;

class RoleComponent extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkAction;

    public $search = "";
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $modalTitle;
    public $selectedPermissions = [];
    public $dbPermissions;

    public Role $role;

    protected $rules = [
        'role.name' => 'required',
        'selectedPermissions' => 'required'
    ];

    public function mount()
    {
        $this->role = $this->makeBlankRole();
        $this->dbPermissions = $this->role->permissions;
    }



    public function create()
    {
        if($this->role->getKey()) $this->role = $this->makeBlankRole();
        $this->modalTitle = "Add Role";
        $this->showEditModal = true;
    }

    public function edit(Role $role)
    {

        if($this->role->isNot($role)) {
            $this->role = $role;
            $this->dbPermissions = $this->role->permissions->pluck('id');
            $this->emit('loadPermissions', $this->dbPermissions);
        }
        $this->modalTitle = "Edit Role";
        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();
        $this->role->save();
        $this->role->permissions()->sync($this->selectedPermissions);
        $this->showEditModal = false;
    }

    public function makeBlankRole()
    {
        return Role::make();
    }

    public function deleteSelected()
    {

        $this->selectedRowsQuery->delete();

        $this->showDeleteModal = false;

    }

    public function getRowsQueryProperty()
    {
        $query = Role::search('name',$this->search);
        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }

    public function render()
    {
        $permissions = Permission::all()->pluck('name','id');
        return view('livewire.user-management.role-component',[
            'roles' => $this->rows,
            'permissions' => $permissions
        ]);
    }
}
