@extends('../app-layout.app-layout')
@section('title', 'Laravel Livewire | Edit-Post')
@section('content')
@push('styles')
    <link href="{{ asset('assets/css/post-edit.css') }}" rel="stylesheet">
@endpush

@include('navbar')

    <livewire:posts.update-post :post="$post" />
    
@endsection