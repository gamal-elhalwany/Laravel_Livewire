<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Index extends Component
{
    use WithPagination;

    public function delete($id)
    {   $user = auth()->user();
        if ($user) {
            Post::find($id)?->delete();
            return $this->redirect('/', navigate:true);
        }
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.posts.index', [
            'posts' => Post::latest()->paginate(5),
        ]);
    }
}