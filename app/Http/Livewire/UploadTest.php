<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UploadTest extends Component
{
    use WithFileUploads;
    public $count = 1;
    
    public $photo;
    public $fileUrl;

    public function save()
    {
        $this->Log('Testing');
        // Store the file
        $this->fileUrl = $this->photo->store('uploads', 'public');
        $urls = Storage::url($this->fileUrl);
        $this->Log($urls);

    }
 
    public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;
    }
    
    public function render()
    {
        return view('Upload')
            ->layout('layouts.app');
    }

    public function Log(string | \Stringable $message): void
    {
        $this->dispatch('ConsoleLog', $message);
    }
}