<?php

namespace App\Http\Livewire\DataTable;

trait WithBulkAction {
    public $selectAll = false;
    public $selectPage = false;
    public $selected = [];


    public function renderingWithBulkActions()
    {
        if ($this->selectAll) $this->selectPageRows();
    }

    public function updatedSelected()
    {
        $this->selectAll = false;
        $this->selectPage = false;
    }

    public function updatedSelectPage($value)
    {
        if ($value) return $this->selectPageRows();

        $this->selectAll = false;
        $this->selected = [];
    }

    public function selectAll()
    {
        $this->selectAll = true;
    }


    public function selectPageRows()
    {
        $this->selected = $this->rows->pluck('id')->map(fn($id) => (string) $id);
    }


    public function getSelectedRowsQueryProperty()
    {
        return (clone $this->rowsQuery)
        ->unless($this->selectAll, fn($query) => $query->whereKey($this->selected));
    }

}
