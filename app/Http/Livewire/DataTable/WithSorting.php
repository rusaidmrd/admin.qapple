<?php

namespace App\Http\Livewire\DataTable;

trait WithSorting {
    public  $sortField='id';
    public $sortDirection = "asc";

    // protected $queryString = ['sortField','sortDirection'];

    public function sortBy($field)
    {
        if($this->sortField == $field) {
            if($this->sortDirection==='asc') {
                $this->sortDirection = 'desc';
            }else {
                $this->sortDirection = 'asc';
            }
        }else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function applySorting($query)
    {
        return $query->orderBy($this->sortField,$this->sortDirection);
    }
}
