<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UpdatePost extends Component
{
    use WithFileUploads;

    public Post $post;
    public $title;
    public $content;
    public $image;
    public $category_id;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->image = $post->image;
        $this->category_id = $post->category_id;
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $validated = $this->validate([
            'title' => 'required|min:5|max:150',
            'content' => 'required|min:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($this->image) {
            if ($this->post->image) {
                Storage::disk('public/uploads')->delete($this->post->image);
            }
            $validated['image'] = $this->image->store('uploads', 'public');
        }

        if ($user->id == auth()->id()) {
            $this->post->update($validated);
        } else {
            session()->flash('message', 'You\'re Not Allowed For this Action!');
            return $this->redirect(route('login'), navigate: true);
        }

        session()->flash('message', 'Post updated successfully!');
        return $this->redirect(route('home'), navigate: true);
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.posts.update-post', [
            'categories' => $categories,
        ]);
    }
}
