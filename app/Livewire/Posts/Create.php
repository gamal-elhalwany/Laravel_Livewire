<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title, $content, $image, $category_id, $user_id;

    public function mount()
    {
        $this->user_id = auth()->id();
    }

    public function store(Request $request)
    {   
        $data = $this->validate([
            'title' => 'required|min:5|max:150',
            'content' => 'required|min:100',
            'image' => 'required|image|mimes:jpeg,png,gif,jpg,webp',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $path = '';
		if ($this->image) {
			$file = $this->image;
            $path = $file->store('uploads', 'public');
		}

		$data['user_id'] = $this->user_id;
		$data['image'] = $path;

		Post::create($data);

        return $this->redirect(route('home'), navigate:true);
    }

    public function render()
    {
        $categoris = Category::all();
        return view('livewire.posts.create', [
            'categories' => $categoris,
        ]);
    }
}