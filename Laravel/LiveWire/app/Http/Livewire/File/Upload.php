<?php

namespace App\Http\Livewire\File;

use Livewire\Component;
use Livewire\WithFileUploads; // componet per file uploads

class Upload extends Component
{
    // Se pari duhet ta perdorim 'WithFileUploads'
    use WithFileUploads;
    /*
    public $photo;

    protected $rules = [
        'photo' => 'required|image|max:1024', //1MB
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();
    }
    */
    use WithFileUploads;

    protected $rules = [
        'photo' => 'image|max:1024', // 1MB Max
        'photos.*' => 'image|max:2048', // 2MB Maxs
    ];
    // Uplado single file
    public $photo;
    public function save()
    {
        $this->validate();

        $this->photo->store('public');
    }

    //upload multiple files
    public $photos = [];

    public function multiFileUpload()
    {
        // $this->validate(['photos.*' => 'image|max:2048',]);
        $this->validate();

        foreach ($this->photos as $photo) {
            $photo->store('public');
        }
    }


    public function render()
    {
        return view('livewire.file.upload');
    }
}
