<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UploadTest extends Component
{
    use WithFileUploads;    
    public $photo;
    public $fileUrl;

    public $top_category = '';
    public $top_confidence = -999;

    public function save()
    {
        $this->top_category = '';
        $this->top_confidence = -999;

        $this->Log('Testing');
        // Store the file
        $this->fileUrl = $this->photo->store('uploads', 'public');
        $urls = Storage::url($this->fileUrl);
        $this->Log($urls);

        $imagePath = storage_path('app/public/' . $this->fileUrl); // Adjust the path if necessary
        if (file_exists($imagePath)) {
            $imageData = file_get_contents($imagePath);
            $base64 = base64_encode($imageData);
            
            $base64Image = 'data:image/jpeg;base64,' . $base64;
            $this->Log($base64Image); 
            $this->dispatch('start_inference', b64_image: $base64Image);
        } else {
            $this->Log('File does not exist.');
        }
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