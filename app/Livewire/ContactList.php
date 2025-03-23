<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class ContactList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    #[Url]
    public $search = '';

    public function render()
    {
        $users = User::where("name", "LIKE", "%{$this->search}%")
            ->orWhere("email", "LIKE", "%{$this->search}%")
            ->latest()
            ->paginate(10);

        return view('livewire.contact-list', compact('users'));
    }

    public function download($id){
        $user = User::findOrFail($id);
        if($user){
            return Storage::download($user->file);
        }
    }

    public function delete($id){
        User::findOrFail($id)->delete();
    }
}
