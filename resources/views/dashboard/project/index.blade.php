@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Project</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-10" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('deleted'))
        <div class="alert alert-danger col-lg-10" role="alert">
            {{ session('deleted') }}
        </div>
    @endif
    <div class="table-reponsive col-lg-10">
        <a href="/dashboard/projects/create" class="btn btn-primary float-end mb-3">Create New Project</a>
        <table class="table table-striped table-sm ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->body }}</td>
                        <td>
                            <a href="/dashboard/projects/{{ $project->id }}"
                                class="btn btn-info text-decoration-none btn-sm">Detail</a>
                            <a href="/dashboard/projects/{{ $project->id }}/edit"
                                class="btn btn-warning text-decoration-none btn-sm">Edit</a>
                            <form action="/dashboard/projects/{{ $project->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
