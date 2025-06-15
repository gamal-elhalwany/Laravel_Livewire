<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
	{
		$posts = Post::with('user')->with('category')->orderBy('created_at', 'desc')->get();
		return view('home', compact('posts'));
	}

	public function create()
	{
		$categories = Category::all();
		return view('create', compact("categories"));
	}

	public function store(Request $request)
	{
		$data = $request->validate([
			'title' => 'required|min:5|max:255',
			'content' => 'required|min:50|max:2000',
			'image' => 'required|image|mimes:jpeg,png,gif,jpg,webp',
			'category_id' => 'required',
		]);

		$path = '';
		if ($request->hasFile('image')) {
			$file = $request->file('image');
            $path = $file->store('uploads', 'public');
		}

		$data['user_id'] = auth()->id();
		$data['image'] = $path;

		Post::create($data);
		return redirect()->back()->with('success', 'Post Stored Successfully.');
	}

	public function show(Request $request, Post $post)
	{
		return view('show', compact('post'));
	}

	public function update(Request $request, Post $post)
	{
		$request->validate([
			'title' => 'required|min:5|max:255|unique:posts,title',
			'content' => 'required|min:50|max:2000|unique:posts,content',
		]);
		$post->update($request->all());
		return redirect()->back()->with('success', 'Post updated!');
	}

	public function destroy(Post $post)
	{
		$post->delete();
		return redirect()->back()->with('success', 'Post has been deleted successfully!');
	}

	public function logout()
	{
		$user = auth()->user();

		if ($user) {
			auth()->logout();
			return redirect()->route('login');
		}
		return redirect()->route('login');
	}
}
