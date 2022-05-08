<?php

namespace App\Http\Livewire;

use App\Http\Livewire\DataTable\WithBulkAction;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{

    use WithPerPagePagination, WithSorting, WithBulkAction;

    public $search = "";
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $modalTitle;

    public Category $category;

    protected $rules = [
        'category.name' => 'required',
        'category.parent_id' => 'nullable',
    ];

    public function mount()
    {
        $this->category = $this->makeBlankCategory();
    }

    public function create()
    {
        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();
        $this->category->save();
        $this->showEditModal = false;
    }

    public function makeBlankCategory()
    {
        return Category::make();
    }

    public function getRowsQueryProperty()
    {
        $query = Category::search('name',$this->search);
        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }

    public function render()
    {
        $parentCategories = Category::whereNull('parent_id')->get();
        return view('livewire.category-component',[
            'categories' => $this->rows,
            'parentCategories' => $parentCategories
        ]);
    }
}
