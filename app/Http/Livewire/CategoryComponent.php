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
        'category.parent_id' => 'required',
        'category.featured' => 'sometimes',
        'category.menu' => 'sometimes',
    ];

    public function mount()
    {
        $this->category = $this->makeBlankCategory();
        $this->category->featured = 0;
        $this->category->menu = 0;
    }

    public function create()
    {
        if($this->category->getKey()) $this->category = $this->makeBlankCategory();
        $this->modalTitle = "Add Category";
        $this->showEditModal = true;
    }

    public function edit(Category $category)
    {
        $this->category = $category;
        $this->modalTitle = "Edit Category";
        $this->showEditModal = true;
        $this->emit('edit.enabled',$this->category);
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

    public function deleteSelected()
    {
        $this->selectedRowsQuery->delete();
        $this->showDeleteModal = false;

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

        return view('livewire.category-component',[
            'categories' => $this->rows,
        ]);
    }
}
