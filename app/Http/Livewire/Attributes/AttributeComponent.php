<?php

namespace App\Http\Livewire\Attributes;

use App\Http\Livewire\DataTable\WithBulkAction;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Attribute;
use Livewire\Component;


class AttributeComponent extends Component
{

    use WithPerPagePagination, WithSorting, WithBulkAction;

    public $search = "";
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $modalTitle;

    public Attribute $attribute;

    public function mount()
    {
        $this->attribute = $this->makeBlankAttribute();
    }

    public function makeBlankAttribute()
    {
        return Attribute::make();
    }

    public function getRowsQueryProperty()
    {
        $query = Attribute::search('name',$this->search);
        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }

    public function render()
    {
        return view('livewire.attributes.attribute-component',[
            'attributes' => $this->rows,
        ]);
    }
}
