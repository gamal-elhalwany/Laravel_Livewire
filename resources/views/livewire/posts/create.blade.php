<div>
    <div class="container py-5 create-post">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="{{route('home')}}" style="text-decoration:none;position:relative;bottom:20px;" wire:navigate>⬅ Back</a>
                <div class="card shadow-lg border-0 rounded-lg glow-effect">
                    <div class="card-header bg-gradient-primary-to-secondary text-white">
                        <h3 class="text-center mb-0">Create New Post</h3>
                    </div>

                    <div class="card-body p-5">
                        <!-- Start Creation Form -->
                        <form wire:submit.prevent="store" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold text-primary">Post Title</label>
                                <input type="text"
                                    class="form-control form-control-lg border-2 @error('title') is-invalid @enderror"
                                    id="title"
                                    name="title"
                                    placeholder="Enter post title"
                                    value="{{ old('title') }}"
                                    wire:model="title"
                                    required>
                                @error('title')
                                <div class="invalid-feedback animated fadeIn">
                                    <i class="fas fa-exclamation-circle me-2"></i>{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="content" class="form-label fw-bold text-primary">Post Content</label>
                                <textarea class="form-control border-2 @error('content') is-invalid @enderror"
                                    id="content"
                                    name="content"
                                    rows="6"
                                    placeholder="Write your post content here..."
                                    wire:model="content"
                                    required>{{ old('content') }}</textarea>
                                @error('content')
                                <div class="invalid-feedback animated fadeIn">
                                    <i class="fas fa-exclamation-circle me-2"></i>{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="post image" class="form-label fw-bold text-primary">Post Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" wire:model="image">
                                @error('image')
                                <div class="invalid-feedback animated fadeIn">
                                    <i class="fas fa-exclamation-circle me-2"></i>{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="md-4">
                                <label for="category_id" class="form-label fw-bold text-primary">Category</label>
                                <select type="text"
                                    class="form-control form-control-lg border-2 @error('category_id') is-invalid @enderror"
                                    id="category_id"
                                    name="category_id"
                                    wire:model="category_id"
                                    required>
                                    <option value="">Choose Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback animated fadeIn">
                                    <i class="fas fa-exclamation-circle me-2"></i>{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-primary btn-lg btn-glow" wire:click="store" wire:navigate>
                                    <i class="fas fa-save me-2"></i> Publish Post
                                </button>
                            </div>
                        </form>
                        <!-- End Creation Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


	
<!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore labore error dicta, nam deserunt recusandae pariatur et laboriosam quidem! Eveniet culpa neque eaque et sint, reprehenderit nam deserunt veritatis nobis. -->