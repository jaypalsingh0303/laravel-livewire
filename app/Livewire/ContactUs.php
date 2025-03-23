<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContactUs extends Component
{
    use WithFileUploads;

    public $name, $email, $file;

    public function render()
    {
        return view('livewire.contact-us');
    }

    public function save(){
        $this->validate([
            "name" => "required",
            "email" => "required|email",
            "file" => "required|mimetypes:application/pdf",
        ]);

        try{
            $file_path = $this->file->store("uploads");

            User::create([
                "name" => $this->name,
                "email" => $this->email,
                "password" => $this->email,
                "file" => $file_path,
            ]);
            session()->flash("success", "Inquiry submit successfully.");

            $this->reset(["name", "email", "file"]);

        }catch(\Exception $e){
            session()->flash("error", $e->getMessage());
        }
    }
}