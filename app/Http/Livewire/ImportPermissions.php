<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImportPermissions extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $upload;
}
