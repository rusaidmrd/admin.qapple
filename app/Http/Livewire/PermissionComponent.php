<?php

namespace App\Http\Livewire;

use App\Http\Livewire\DataTable\WithBulkAction;
use App\Http\Livewire\DataTable\WithSorting;
use Livewire\Component;
use App\Models\Permission;
use Livewire\WithPagination;

class PermissionComponent extends Component
{
    use WithPagination, WithSorting, WithBulkAction;

    public $search = "";
    public $showEditModal = false;
    public $showDeleteModal = false;
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
        $this->showEditModal = true;
    }

    public function edit(Permission $permission)
    {
        if($this->editing->isNot($permission)) $this->editing = $permission;
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
        return $this->rowsQuery->paginate(7);
    }


    public function render()
    {
        return view('livewire.permission-component',[
            'permissions' => $this->rows
        ]);
    }
}
