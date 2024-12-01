<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UploadTest extends Component
{
    use WithFileUploads;    
    public $photo;
    public $file_image;

    public $top_category = '';
    public $top_confidence = -999;

    public function save()
    {
        $this->top_category = '';
        $this->top_confidence = -999;

        $this->Log('Testing');
        

        
        if ($this->photo != null) {
            $base64 = base64_encode(file_get_contents($this->photo->getRealPath()));
            $this->file_image = $base64;
            
            $base64Image = 'data:image/jpeg;base64,' . $base64;
            $this->Log($base64Image); 
            $this->dispatch('start_inference', b64_image: $base64Image);
        } else {
            $this->Log('File does not exist.');
        }
    }

    public function testing($message, $number)
    {
        $this->log("Message: $message, Number: $number");
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