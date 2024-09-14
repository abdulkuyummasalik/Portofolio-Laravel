@extends('dashboard.layouts.main')
@section('content')
    <div class="card" style="width: 28rem;">
        <img src="{{ asset('storage/' . $certificate->image) }}" alt="{{ $certificate->title }}">

        <div class="card-body">
            <h5 class="card-title">{{ $certificate->title }}</h5>
            <p class="card-text">{{ $certificate->body }}</p>
            <a href="/dashboard/certificates" class="btn btn-info text-decoration-none btn-sm">Back</a>
            <a href="/dashboard/certificates/{{ $certificate->id }}/edit"
                class="btn btn-warning text-decoration-none btn-sm">Edit</a>
            <form action="/dashboard/certificates/{{ $certificate->id }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
