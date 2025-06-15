@extends('../app-layout.app-layout')
@section('title', 'Laravel-Livewire | All-Posts')
@section('content')
@push('styles')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
@endpush

@include('navbar')

<!-- <div>
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Posts Management</h3>
                    <a href="{{ '/posts/create' }}"  class="btn btn-light" wire:navigate>
                        <i class="fas fa-plus"></i> Create New Post
                    </a>
                </div>
            </div>

            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="table-responsive">
                    <table  class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-nowrap">#</th>
                                <th class="text-nowrap">Title</th>
                                <th class="text-nowrap">Content</th>
                                <th class="text-nowrap">Auther</th>
                                <th class="text-nowrap">Image</th>
                                <th class="text-nowrap">Category</th>
                                <th colspan="2" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $key => $post)
                            <tr>
                                <td class="fw-bold">{{$key+1}}</td>
                                <td class="text-truncate" style="max-width: 200px;">
                                    <a href="javascript::void(0)" wire:click="show_post">
                                        {{$post->title}}
                                    </a>
                                </td>
                                <td class="text-truncate" style="max-width: 300px;">{{$post->content}}</td>
                                <td class="text-truncate" style="max-width: 150px;">{{$post->user->name}}</td>

                                <td class="text-center">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="height:70px;width:70px;border:1px solid; border-radius:5px;padding:2px;">
                                </td>

                                <td class="text-center">
                                    {{ $post->category->name }}
                                </td>

                                <td class="text-center">
                                    <a href="javascript::void(0)" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($posts->isEmpty())
                <div class="text-center py-4">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No posts found</h5>
                    <a href="{{route('post.create')}}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus"></i> Create Your First Post
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div> -->

<livewire:posts.index />

@endsection