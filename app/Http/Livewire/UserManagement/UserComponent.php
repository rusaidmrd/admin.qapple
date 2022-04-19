<?php

namespace App\Http\Livewire\UserManagement;

use App\Http\Livewire\DataTable\WithBulkAction;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserComponent extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkAction;

    public $search = "";
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $selectedRoles = [];
    public $dbRoles;

    public User $user;

    public function rules() {
        return [
            'user.name' => 'required',
            'user.email' => 'required',
            'user.password' => 'required',
            'selectedRoles' => 'required'
        ];
    }

    public function mount()
    {
        $this->user = $this->makeBlankUser();
        $this->dbRoles = $this->user->roles;
    }

    public function updated($email)
    {
        $this->validateOnly($email,[
            'user.email' => 'unique:users,email'
        ]);
    }

    public function create()
    {
        $this->resetErrorBag();
        $this->showEditModal = true;
    }


    public function save()
    {
        //dd($this->user->password);
        $this->validate();
        $this->user->save();
        $this->user->roles()->sync($this->selectedRoles);
        $this->showEditModal = false;
    }


    public function makeBlankUser()
    {
        return User::make();
    }

    public function deleteSelected()
    {

        $this->selectedRowsQuery->delete();

        $this->showDeleteModal = false;

    }

    public function getRowsQueryProperty()
    {
        $query = User::search('name',$this->search);
        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }

    public function render()
    {
        $roles = Role::all()->pluck('name','id');
        return view('livewire.user-management.user-component',[
            'users' => $this->rows,
            'roles' => $roles
        ]);
    }
}
