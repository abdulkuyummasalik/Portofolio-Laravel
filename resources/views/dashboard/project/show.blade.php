@extends('dashboard.layouts.main')
@section('content')
    <div class="card" style="width: 28rem;">
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">

        <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text"><a href="{{ $project->link_project }}">{{ $project->link_project }}</a></p>
            <a href="/dashboard/projects" class="btn btn-info text-decoration-none btn-sm">Back</a>
            <a href="/dashboard/projects/{{ $project->id }}/edit"
                class="btn btn-warning text-decoration-none btn-sm">Edit</a>
            <form action="/dashboard/projects/{{ $project->id }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
