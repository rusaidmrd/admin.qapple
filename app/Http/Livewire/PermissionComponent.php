<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\DataTable\WithSorting;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Livewire\DataTable\WithBulkAction;
use App\Http\Livewire\DataTable\WithPerPagePagination;

class PermissionComponent extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkAction;

    public $search = "";
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $modalTitle;

    public Permission $editing;


    protected $rules = [
        'editing.name' => 'required'
    ];



    public function mount()
    {
        $this->editing = $this->makeBlankPermission();
    }

    public function create()
    {
        if($this->editing->getKey()) $this->editing = $this->makeBlankPermission();
        $this->modalTitle = "Add Permission";
        $this->showEditModal = true;
    }

    public function edit(Permission $permission)
    {
        if($this->editing->isNot($permission)) $this->editing = $permission;
        $this->modalTitle = "Edit Permission";
        $this->showEditModal = true;
    }

    public function save() {
        $this->validate();
        $this->editing->save();
        $this->showEditModal = false;
    }


    public function exportSelected()
    {
        return response()->streamDownload(function(){
            echo $this->selectedRowsQuery->toCsv();
        },'permissions.csv');
    }

    public function deleteSelected()
    {

        $this->selectedRowsQuery->delete();

        $this->showDeleteModal = false;

    }

    public function makeBlankPermission()
    {
        return Permission::make();
    }


    public function getRowsQueryProperty()
    {
        $query = Permission::search('name',$this->search);
        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }


    public function render()
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        return view('livewire.permission-component',[
            'permissions' => $this->rows
        ]);
    }
}
